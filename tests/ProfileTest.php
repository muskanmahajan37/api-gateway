<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

//    public function test_add_new_skill()
//    {
//        $response = $this->call('POST', '/skills', ['name' => 'Spring Boot', 'user_id' => 1]);
//        $this->assertEquals(200, $response->status());
//    }
//
//    public function test_delete_skill()
//    {
//        $response = $this->call('DELETE', '/skills/4');
//        $this->assertEquals(200, $response->status());
//    }
//
//    public function testApplication()
//    {
//        $response = $this->call('GET', '/skills');
//        $this->assertEquals(200, $response->status());
//    }
//
////    public function test_get_skill_by_id()
////    {
////        $response = $this->json('POST', '/skills');
////        $response
////            ->assertStatus(201)
////            ->assertJson([
////                'created' => true
////            ]);
////    }
//    public function test_add_new_education()
//    {
//        $response = $this->call('POST', '/educations', ['name' => 'der', 'user_id' => 1]);
//        $this->assertEquals(201, $response->status());
//    }
//
//    public function test_delete_education()
//    {
//        $response = $this->call('DELETE', '/educations/4');
//        $this->assertEquals(200, $response->status());
//    }
//
//    public function test_get_education_by_id()
//    {
//        $response = $this->call('GET', '/educations/1');
//        $this->assertEquals(200, $response->status());
//    }
//
//    public function test_add_new_language()
//    {
//        $response = $this->call('POST', '/languages', ['name' => 'German', 'user_id' => 1]);
//        $this->assertEquals(200, $response->status());
//    }
}
