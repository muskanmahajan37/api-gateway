<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        Skill::create(['name' => 'Java', 'user_id' =>1]);
        Skill::create(['name' => 'Html', 'user_id' =>1]);
        Skill::create(['name' => 'Laravel', 'user_id' =>1]);
    }
}