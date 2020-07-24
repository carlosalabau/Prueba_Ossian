<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class ImagenController extends Controller
{

    public function list()
    {
        return Imagen::all();
    }
    public function add(Request $request)
    {
        $body = $request->all();
        $crear = Imagen::create($body);
        return response(['msg'=>'correcto', 'datos' =>$crear]);
    }
    public function detail($id)
    {
        return Imagen::where('id', '=', $id)->get();
    }
    public function delete($id)
    {
        $imagen = Imagen::find($id);
        $eliminar = $imagen->delete();
        return response(['msg'=>'Eliminado con exito', 'datos'=>$eliminar]);
    }
    public function update(Request $request, $id)
    {
        $imagen = Imagen::find($id);
        if($imagen->title == null){
            $imagen->title = $imagen->title;
        }
        if($imagen->category == null){
            $imagen->category = $imagen->category;
        }
        if($imagen->description == null){
            $imagen->description = $imagen->description;
        }
        if($imagen->url == null){
            $imagen->url = $imagen->url;
        }
        $imagen->save();
        return response(['msg'=>'Campos editados con exito', 'datos'=>$imagen]);
    }
}
