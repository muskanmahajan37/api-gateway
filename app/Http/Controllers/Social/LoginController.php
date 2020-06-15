<?php


namespace App\Http\Controllers\Social;

use App\Role;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class LoginController
{

    public function github()
    {
        return Socialite::driver('github')->stateless()->redirect();

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

    public function githubRedirect()
    {
        $git = Socialite::driver('github')->stateless()->user();

        $user = User::query()->firstOrNew(['email' => $git->getEmail()]);
        if (!$user->exists) {
            $user->name = $git->name;
            $user_password = Hash::make(Str::random(24));
            $user->username = $git->getNickname();
            $user->email = $git->email;
            $user->password = $user_password;
            $user->image = "noimage.jpg";

            # Assing role
            $role = Role::find(1);
            $role->users()->save($user);
            $user->save();
        }
        return response()->json([
            'access_token' => $this->jwt($user),
            'user' => $user
        ], 201);


    }

}