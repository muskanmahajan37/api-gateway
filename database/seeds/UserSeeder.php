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

        $userPassword = env("FIRST_USER_PASSWORD");
        $userEmail = env("FIRST_USER_EMAIL");


        $password_hashed =Hash::make($password);
        $user_password_hashed =Hash::make($userPassword);

        $userRole = Role::find(1);
        $adminRole = Role::find(2);

        $admin = User::create(['name' => 'user','email'=>$email,'password'=>$password_hashed,'image'=>'noimage.jpg']);
        $user = User::create(['name' => 'user','email'=>$userEmail,'password'=>$user_password_hashed,'image'=>'noimage.jpg']);
        $user3 = User::create(['name' => 'Taulant','email'=>'taulant@gmail.com','password'=>$user_password_hashed,'image'=>'noimage.jpg']);
        $user4 = User::create(['name' => 'Valon','email'=>'valon@gmail.com','password'=>$user_password_hashed,'image'=>'noimage.jpg']);
        $user5 = User::create(['name' => 'Rron','email'=>'rron@gmail.com','password'=>$user_password_hashed,'image'=>'noimage.jpg']);

        $userRole->users()->save($user);
        $userRole->users()->save($user3);
        $userRole->users()->save($user4);
        $userRole->users()->save($user5);
        $adminRole->users()->save($admin);
    }


}
