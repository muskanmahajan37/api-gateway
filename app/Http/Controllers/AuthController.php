<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Role;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Lumen\Routing\Controller as BaseController;
use Validator;
use App\Notifications\SignupActivate;

class AuthController extends BaseController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    protected function jwt(User $user)
    {
        $payload = [
            'iss' => "lumen-jwt",
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + 60 * 60
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }


    public function authenticate(User $user)
    {
        $this->validate($this->request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $this->request->input('email'))->first();
        if (!$user) {
            return response()->json([
                'message' => 'User does not exist.'
            ], 400);
        }else if ($user->active===0) { //qitu e bon !=1(to be done)
            return response()->json([
                'message' => 'Please confirm your account'
            ], 400);
        }
        $userResponse = new User();
        $userResponse->email = $user->email;
        $userResponse->id = $user->id;
        $userResponse->name = $user->name;
        $userResponse->image = $user->image;
        $userResponse->username = $user->username;
        if (Hash::check($this->request->input('password'), $user->password)) {
            return response()->json([
                'user' => $userResponse,
                'access_token' => $this->jwt($user)

            ], 200);
        } else {
            return response()->json([
                'message' => 'Credentials not correct'], 400);
        }
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed',
            'image' => 'image|max:1024'
        ];
        $fields = $this->validate($request, $rules);
        $fields['password'] = Hash::make($request->password);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileToStore =$image->getClientOriginalName();
            $image->move(base_path('public/user'), $fileToStore);
        } else {
            $fileToStore = 'noimage.jpg';
        }
        $activation_token= str_random(60);
        $user = new User($fields);
        $user['image']=$fileToStore;
        $user['activation_token']=$activation_token;
        $role = Role::find(1);
        $user->username = $request['username'];
        $user->save();
        $role->users()->save($user);
        $userResponse = new User();
        $userResponse->email = $user->email;
        $userResponse->id = $user->id;
        $userResponse->name = $user->name;
        $userResponse->image = $fileToStore;
        $userResponse->username = $user->username;
        $userResponse->activation_token=$user->activation_token;
        $user->notify(new SignupActivate($userResponse));

        //ketu val duhet me bo masi ta bon activate me i ardh ai emaili welcome to flex ose mrenda ni emaili
        Mail::to($user->email)->send(new Welcome($fields));
        return response()->json([
            'created' => true,
            'access_token' => $this->jwt($user),
            'user' => $userResponse
        ], 201);
    }
    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return $user;
    }


    public function test(){
        return Auth::user();
    }

}



