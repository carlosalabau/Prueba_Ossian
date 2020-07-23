<?php

use Illuminate\Database\Seeder;
use App\Imagen;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Imagen::truncate();
        // $this->call(UserSeeder::class);
        $api_url = 'http://internal.ossian.tech/api/Sample';
        $res = file_get_contents($api_url);
        $res = json_decode($res);
        $images = $res->result;
        foreach ($images as $image) {
           DB::table('imagens')->insert([
                'title' =>   $image->title,
                'description' =>    $image->description,
                'category' =>    $image->category,
                'url' => $image->url
            ]); 
        }
    }
}
