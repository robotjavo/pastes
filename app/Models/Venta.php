<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model {
    use HasFactory;

    protected $fillable = ['bebida_inventario_id', 'platillos_id', 'bebidas_inventarios_id', 'productos_inventarios_id', 'venta', 'importe', 'cambio'];

    public function bebidaInventario() {
        return $this->belongsTo(Bebida_Inventario::class);
    }
  public function platillo() {
        return $this->belongsTo(Platillo::class);
    }
    public function productoInventarios() {
        return $this->belongsTo(productoInventarios::class);
    }
}
