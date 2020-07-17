<?php

use Illuminate\Database\Seeder;
use App\Language;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create(['name' => 'English', 'user_id' =>2]);
        Language::create(['name' => 'French', 'user_id' =>2]);
        Language::create(['name' => 'Italian', 'user_id' =>2]);
    }
}
