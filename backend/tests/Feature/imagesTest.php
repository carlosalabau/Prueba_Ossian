<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class imagesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testaddImageTest()
    {

        $response = $this->json('POST','api/image/add',
        [
            'id'=>9,
            'title'=>'Prueba',
            'description'=>'Prueba 1',
            'category'=>'Informatica',
            'url'=>'prueba'
        ]);
        $response->assertStatus(201);    
    }
    public function testdetailImageTest(){
        $response = $this->get('api/image/detail/9');
        $response->assertSuccessful();
    }
    public function testdeleteImageTest(){
        $response = $this->delete('api/image/delete/9');
        $response->assertSuccessful();
    }
    public function testupdateImageTest(){
        $response = $this->json('PUT', 'api/image/update/9',
        [
            'title'=>'Prueba tecnica'
        ]);
        $response->assertSuccessful();
    }
}