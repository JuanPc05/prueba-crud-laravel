<?php

namespace App\Http\Modules\Productos\Services;

use App\Http\Modules\Productos\Model\Producto;

class ProductoService
{
    public function existeProducto($id)
    {
        return Producto::find($id);
    }
}
