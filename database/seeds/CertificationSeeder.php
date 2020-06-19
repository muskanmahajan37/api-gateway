<?php

use Illuminate\Database\Seeder;
use App\Certification;
class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certification::create(['name' => 'Cactus Education', 'user_id' =>2]);
        Certification::create(['name' => 'Auk training', 'user_id' =>2]);

    }
}
