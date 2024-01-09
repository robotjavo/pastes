<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Inventario extends Model
{
    use HasFactory;

protected $table = 'productos_inventarios';
protected $fillable = ['nombre', 'cantidad', 'entran', 'total', 'faltantes', 'sobrantes', 'pedidos', 'personal_id'];


public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id');
    }
}

