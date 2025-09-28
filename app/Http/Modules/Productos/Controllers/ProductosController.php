<?php

namespace App\Http\Modules\Productos\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Modules\Productos\Model\Producto;
use App\Http\Modules\Productos\Services\ProductoService;

class ProductosController extends Model
{
    protected $productoService;

    public function __construct()
    {
        $this->productoService = new ProductoService();
    }
    public function crearProducto(Request $request)
    {
        try {
            $datos = $request->all();
            $producto = Producto::create($datos);
            return response()->json(['data' => $producto, 'status' => '201']);
        } catch (\Exception $e) {
            return response()->json(['Error' => 'Error al crear el producto', 'status' => '500']);
        }
    }

    public function listarProductos()
    {
        $productos = Producto::all();
        return response()->json(['data' => $productos]);
    }

    public function mostrarProducto($id)
    {
        $producto = $this->productoService->existeProducto($id);
        if ($producto) {
            return response()->json(['data' => $producto]);
        } else {
            return response()->json(['Error' => 'Producto no encontrado', 'status' => '404'], 404);
        }
    }

    public function actualizarProducto(Request $request, $id)
    {
        $producto = $this->productoService->existeProducto($id);
        if ($producto) {
            $producto->update($request->all());
            return response()->json(['data' => $producto, 'status' => '200']);
        } else {
            return response()->json(['Error' => 'Producto no encontrado', 'status' => '404'], 404);
        }
    }

    public function eliminarProducto($id)
    {
        $producto = $this->productoService->existeProducto($id);
        if ($producto) {
            $producto->delete();
            return response()->json(['message' => 'Producto eliminado', 'status' => '200']);
        } else {
            return response()->json(['Error' => 'Producto no encontrado', 'status' => '404'], 404);
        }
    }
}