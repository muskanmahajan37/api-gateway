<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
class ApiTest extends TestCase
{
    public function testSomethingIsTrue()
    {
        $this->assertTrue(true);
    }
//    public function testBasicExample(){
//        $this->json('POST', '/register', ['name' => 'Tuli','email'=>'tulidema@mail.com','username'=>'tuli','password'=>'123456','password_confirmation'=>'123456'])
//            ->seeJsonEquals([
//                'created' => true,
//            ]);
//    }
    public function test_add_new_skill()
    {
      $response = $this->call('POST', '/skills', ['name' => 'te','user_id'=>1]);
      $this->assertEquals(200, $response->status());
    }
     public function test_delete_skill(){
        $response = $this->call('DELETE', '/skills/7');
        $this->assertEquals(200, $response->status());
    }
    public function test_add_new_education(){
        $response = $this->call('POST', '/educations',['name'=>'der','user_id'=>1]);
        $this->assertEquals(201, $response->status());
    }
}
