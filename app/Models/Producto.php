<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos'; // Corregí el nombre de la tabla
    protected $fillable = ['productos', 'tipo', 'Precio']; // Corregí el nombre de la columna
    use HasFactory;

    public function inventarios()
    {
        return $this->hasMany(Producto_Inventario::class, 'producto_id');
    }
}
