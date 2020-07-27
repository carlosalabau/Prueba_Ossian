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
    public function testExample()
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
}