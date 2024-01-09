<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masa_Inventario extends Model
{

    use HasFactory;
    protected $table = 'masas_inventarios';
protected $fillable = ['nombre', 'cantidad', 'entran', 'total', 'faltantes', 'sobrantes', 'pedidos', 'personal_id'];


    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id');
    }
    public function platillos() {
        return $this->hasMany(Platillo::class);
    }
}
