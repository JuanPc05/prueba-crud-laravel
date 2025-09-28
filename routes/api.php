<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Modules\Productos\Model\Producto;
use App\Http\Modules\Productos\Controllers\ProductosController;


// CRUD Productos
Route::post('/productos', [ProductosController::class, 'crearProducto']);
Route::get('/productos', [ProductosController::class, 'listarProductos']);
Route::get('/productos/{id}', [ProductosController::class, 'mostrarProducto']);
Route::put('/productos/{id}', [ProductosController::class, 'actualizarProducto']);
Route::delete('/productos/{id}', [ProductosController::class, 'eliminarProducto']);


Route::post('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('/saludo', function () {
    return ['mensaje' => 'Hola desde API 🚀'];
});