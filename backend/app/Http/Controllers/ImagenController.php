<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use Illuminate\Support\Facades\Validator;

class ImagenController extends Controller
{

    public function list()
    {
        try {
            $imagenes = Imagen::all();
            return response(['msg' => 'Correcto', 'datos' => $imagenes], 201);
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
    public function add(Request $request)
    {
        try {
            $valid = Validator::make($request->all(), [
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
                'url' => 'required'
            ]);
            if ($valid->fails()) {
                $errores = $valid->errors();
                $msg = [];
                foreach ($errores->keys() as $donde) {
                    switch ($donde) {
                        case 'title':
                            $msg[] = 'El campo titulo es requerido';
                            break;
                        case 'description':
                            $msg[] = 'El campo descripcion es requerido';
                            break;
                        case 'category':
                            $msg[] = 'El campo categoria es requerido';
                            break;
                        case 'url':
                            $msg[] = 'El campo url es obligatorio';
                            break;
                    }
                }
                return response()->json($msg, 400);
            } else {
                $body = $request->all();
                $crear = Imagen::create($body);
                return response(['msg' => 'correcto', 'datos' => $crear], 201);
            }
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
    public function detail($id)
    {
        try {
            $image = Imagen::where('id', '=', $id)->get();
            return response(['msg' => 'Correcto', 'datos' => $image], 201);
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
            $valid = Validator::make($request->all(), [
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
                'url' => 'required'
            ]);
            if ($valid->fails()) {
                $errores = $valid->errors();
                $msg = [];
                foreach ($errores->keys() as $donde) {
                    switch ($donde) {
                        case 'title':
                            $msg[] = 'El campo titulo es requerido';
                            break;
                        case 'description':
                            $msg[] = 'El campo descripcion es requerido';
                            break;
                        case 'category':
                            $msg[] = 'El campo categoria es requerido';
                            break;
                        case 'url':
                            $msg[] = 'El campo url es obligatorio';
                            break;
                    }
                }
                return response()->json($msg, 400);
            } else {
                $imagen = Imagen::find($id);
                if ($imagen->title) {
                    $imagen->title = $request->title;
                }
                if ($imagen->category) {
                    $imagen->category = $request->category;
                }
                if ($imagen->description) {
                    $imagen->description = $request->description;
                }
                if ($imagen->url) {
                    $imagen->url = $request->url;
                }
                $imagen->save();
                return response(['msg' => 'Campos editados con exito', 'datos' => $imagen]);
            }
        } catch (\Exception $exception) {
            return response($exception, 500);
        }
    }
}
