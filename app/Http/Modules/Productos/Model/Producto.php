<?php

namespace App\Http\Modules\Productos\Model;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'precio', 'cantidad',];
}
