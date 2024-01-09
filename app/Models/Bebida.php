<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    protected $table = 'bebidas';
    protected $fillable = ['bebida', 'tipo', 'cantidad', 'Precio'];
    use HasFactory;
     public function inventarios()
    {
        return $this->hasMany(Bebida_Inventario::class, 'bebida_id');
    }

}
