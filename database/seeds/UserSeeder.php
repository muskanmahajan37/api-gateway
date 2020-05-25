<?php

use App\Role;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = env("FIRST_ADMIN_PASSWORD");
        $email = env("FIRST_ADMIN_EMAIL");

        $userPassword = env("FIRST_USER_PASSWORD");
        $userEmail = env("FIRST_USER_EMAIL");


        $password_hashed =Hash::make($password);
        $user_password_hashed =Hash::make($userPassword);

        $userRole = Role::find(1);
        $adminRole = Role::find(2);

        $admin = User::create(['name' => 'user','email'=>$email,'password'=>$password_hashed]);
        $user = User::create(['name' => 'user','email'=>$userEmail,'password'=>$user_password_hashed]);
        $userRole->users()->save($user);
        $adminRole->users()->save($admin);
    }
}
