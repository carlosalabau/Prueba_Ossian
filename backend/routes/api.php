<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Crud 
Route::group([
    'prefix' => 'image'
], function () {
    Route::get('/', 'ImagenController@list');
    Route::post('/add', 'ImagenController@add');
    Route::get('/detail/{id}', 'ImagenController@detail');
    Route::put('/update/{id}', 'ImagenController@update');
    Route::delete('/delete/{id}', 'ImagenController@delete');
});
