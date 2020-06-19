<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Role;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $role = Role::find(1);
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'username'=>$faker->name,
        'role_id'=>$role,
        'password' => password_hash('123456', PASSWORD_BCRYPT)
    ];
});
