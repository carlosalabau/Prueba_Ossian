<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class ImagenController extends Controller
{

    public function listar()
    {
        return Imagen::all();
    }
    public function crear(Request $request)
    {
        $body = $request->all();
        $crear = Imagen::create($body);
        return response(['msg'=>'correcto', 'datos' =>$crear]);
    }
    public function detalle($id)
    {
        return Imagen::where('id', '=', $id)->get();
    }
    public function eliminar($id)
    {
        $imagen = Imagen::find($id);
        $eliminar = $imagen->delete();
        return response(['msg'=>'Eliminado con exito', 'datos'=>$eliminar]);
    }
    public function editar(Request $request, $id)
    {
        $imagen = Imagen::find($id);
        $editar = $imagen->update($request->all());
        return response(['msg'=>'Campos editados con exito', 'datos'=>$editar]);
    }
}
