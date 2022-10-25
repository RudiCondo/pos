<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class librosController extends Controller
{
    public function obtenerLibros()
    {
        $datos = [
            ['id' => 1,'nombre' =>'El cuervo'],
            ['id' => 2,'nombre' => 'El gato negro'],
            ['id' => 3,'nombre' => 'El corazón delator']
        ];
        return $datos;
    }
    public function obtenerLibro($id)
    {
        $datos = [
            ['id' => 1,'nombre' =>'El cuervo'],
            ['id' => 2,'nombre' => 'El gato negro'],
            ['id' => 3,'nombre' => 'El corazón delator']
        ];
        $res = array_filter($datos, function($item) use ($id){
            return $item['id'] == $id;
        });
        return $res;
    }
    public function obtenerLibrosv2(Request $request)
    {
        $datos = [
            ['id' => 1,'nombre' =>'El cuervo'],
            ['id' => 2,'nombre' => 'El gato negro'],
            ['id' => 3,'nombre' => 'El corazón delator']
        ];
        $nombre = $request->query('nombre');
        $res = array_filter($datos, fn ($item) => str_contains($item['nombre'], $nombre));
        return $res;
    }
}
