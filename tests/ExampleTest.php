<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    public function testApplication(){
        $user = factory('App\User')->make();
        $id = $user->id;
        assert($id == $user->id);

    }

}
