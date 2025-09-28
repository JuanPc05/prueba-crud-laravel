<?php

namespace App\Http\Modules\Productos\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Modules\Productos\Model\Producto;

class ProductosController extends Model
{
    public function crearProducto(Request $request)
    {
        try {

            $datos = $request->all();
            /* $producto = new \App\Http\Modules\Productos\Model\Producto(); */
            $producto = Producto::create($datos);

            return response()->json(['data' => $producto, 'status' => '201']);
        } catch (Exception $e) {
            return response()->json(['Error' => 'Error al crear el producto', 'status' => '500']);
        }
    }
}