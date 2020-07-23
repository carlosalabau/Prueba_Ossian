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

// Listar todas las imagenes
Route::get('/', 'ImagenController@listar');

// Crud 
Route::group([
    'prefix' => 'imagen'
], function () {
    Route::post('/crear', 'ImagenController@crear');
    Route::get('/detalle/{id}', 'ImagenController@detalle');
    Route::put('/editar/{id}', 'ImagenController@editar');
    Route::delete('/eliminar/{id}', 'ImagenController@eliminar');
});
