<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        $password = env("FIRST_ADMIN_PASSWORD");
        $email = env("FIRST_ADMIN_EMAIL");
        $username = env("FIRST_ADMIN_USERNAME");

        $userPassword = env("FIRST_USER_PASSWORD");
        $userEmail = env("FIRST_USER_EMAIL");
        $userUsername = env("FIRST_USER_USERNAME");

        $password_hashed = Hash::make($password);
        $user_password_hashed = Hash::make($userPassword);

        $userRole = Role::find(1);
        $adminRole = Role::find(2);

        $admin = User::create(['name' => 'user', 'username' => $username, 'email' => $email, 'password' => $password_hashed, 'image' => 'noimage.jpg']);
        $user = User::create(['name' => 'user', 'username' => $userUsername, 'email' => $userEmail, 'password' => $user_password_hashed, 'image' => 'noimage.jpg']);

        $userRole->users()->save($user);
        $adminRole->users()->save($admin);
    }


}
