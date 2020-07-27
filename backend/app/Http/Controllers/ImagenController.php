<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class ImagenController extends Controller
{

    public function list()
    {
        try {
            $imagenes = Imagen::all();
            return response(['msg'=>'Correcto', 'datos'=>$imagenes], 201);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
    public function add(Request $request)
    {
        try {
            $body = $request->all();
            $crear = Imagen::create($body);
            return response(['msg' => 'correcto', 'datos' => $crear], 201);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
    public function detail($id)
    {
        try {
            $image = Imagen::where('id', '=', $id)->get();
            return response(['msg'=>'Correcto', 'datos'=>$image], 201);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
    public function delete($id)
    {
        try {
            $imagen = Imagen::find($id);
            $eliminar = $imagen->delete();
            return response(['msg' => 'Eliminado con exito', 'datos' => $eliminar], 201);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $imagen = Imagen::find($id);
            if ($imagen->title == null) {
                $imagen->title = $imagen->title;
            } else {
                $imagen->title = $request->title;
            }
            if ($imagen->category == null) {
                $imagen->category = $imagen->category;
            } else {
                $imagen->category = $request->category;
            }
            if ($imagen->description == null) {
                $imagen->description = $imagen->description;
            } else {
                $imagen->description = $request->description;
            }
            if ($imagen->url == null) {
                $imagen->url = $imagen->url;
            } else {
                $imagen->url = $request->url;
            }
            $imagen->save();
            return response(['msg' => 'Campos editados con exito', 'datos' => $imagen]);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
}
