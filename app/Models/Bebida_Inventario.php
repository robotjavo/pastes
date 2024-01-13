<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida_Inventario extends Model
{
    use HasFactory;
protected $table = 'bebidas_inventarios';
protected $fillable = ['nombre', 'cantidad', 'entran', 'total', 'vendidas', 'sobrantes', 'pedidos', 'personal_id'];


public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id');
    }
}
