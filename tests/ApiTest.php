<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use App\Skill;
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
//    public function test_add_new_skill()
//    {
//        $response = $this->call('POST', '/skills', ['name' => 'taulant','user_id'=>1]);
//        $this->assertEquals(200, $response->status());
//    }
//    public function test_delete_skill(){
//        $response = $this->call('DELETE', '/skills/4');
//        $this->assertEquals(200, $response->status());
//    }
//    public function test_add_new_education(){
//        $response = $this->call('POST', '/educations',['name'=>'der','user_id'=>1]);
//        $this->assertEquals(201, $response->status());
//    }
//    public function testApplication()
//    {
//        $response = $this->call('GET', '/skills');
////        $response = $this->call('POST', '/user', ['name' => 'Taylor']);
//        $this->assertEquals(200, $response->status());
//    }
//    public function test_get_skill_by_id()
//    {
////        $skill = $this->call('GET', '/skills/1');
////
////        $this->assertTrue($skill->has('Java'));
//        $response = $this->json('POST','/skills');
//        $response
//            ->assertStatus(201)
//            ->assertJson([
//                'created'=>true
//            ]);
//    }
}
