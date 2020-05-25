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
        $password = 123456;
        $password_hashed =Hash::make($password);
        $userRole = Role::find(1);
        $adminRole = Role::find(2);

        $admin = User::create(['name' => 'user','email'=>'admin@test.com','password'=>$password_hashed]);
        $user = User::create(['name' => 'user','email'=>'user@test.com','password'=>$password_hashed]);
        $userRole->users()->save($user);
        $adminRole->users()->save($admin);
    }
}
