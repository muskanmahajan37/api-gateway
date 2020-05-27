<?php

namespace App\Http\Controllers;

use App\Role;
use Validator;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
use function foo\func;

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
        }
        $userResponse = new User();
        $userResponse->email = $user->email;
        $userResponse->id = $user->id;
        $userResponse->name = $user->name;

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
            'password' => 'required|confirmed',
        ];
        $fields = $this->validate($request, $rules);
        $fields['password'] = Hash::make($request->password);

        $user = new User($fields);
        $role = Role::find(1);
        $user->save();
        $role->users()->save($user);
        $userResponse = new User();
        $userResponse->email = $user->email;
        $userResponse->id = $user->id;
        $userResponse->name = $user->name;

        return response()->json([
            'access_token' => $this->jwt($user),
            'user' => $userResponse
        ], 201);
    }

}



