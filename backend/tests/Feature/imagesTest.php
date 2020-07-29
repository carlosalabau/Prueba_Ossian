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
    public function testAddImage()
    {
        $response = $this->json('POST','api/image/add',
        [
            'title'=>'Prueba',
            'description'=>'Prueba 1',
            'category'=>'Informatica',
            'url'=>'prueba'
        ]);
        $response->assertStatus(201);    
    }
    public function testDetailImage(){
        $response = $this->get('api/image/detail/1');
        $response->assertSuccessful();
    }
    public function testDeleteImage(){
        $response = $this->delete('api/image/delete/1');
        $response->assertSuccessful();
    }
    public function testUpdateImage(){
        $response = $this->json('PUT', 'api/image/update/2',
        [
            'title'=>'Prueba tecnica',
            'description' => 'Esto es una prueba',
            'category' => 'Social',
            'url' => 'http://internal.ossian.tech/upload/sample/ave1.jpeg'
        ]);
        $response->assertSuccessful();
    }
}