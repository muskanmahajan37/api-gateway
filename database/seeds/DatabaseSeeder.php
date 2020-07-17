<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CertificationSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SkillSeeder::class);


    }
}