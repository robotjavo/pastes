<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'masa_id', 'relleno_id', 'cantidad'];

    public function masa() {
        return $this->belongsTo(Masa_Inventario::class);
    }

    public function relleno() {
        return $this->belongsTo(Relleno_Inventario::class);
    }
}
