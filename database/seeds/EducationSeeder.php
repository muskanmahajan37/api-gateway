<?php

use Illuminate\Database\Seeder;
use App\Education;
class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create(['name' => 'UBT', 'user_id' =>1]);
        Education::create(['name' => 'FIEK', 'user_id' =>1]);

    }
}
