<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model {
    use HasFactory;

<<<<<<< HEAD
   // protected $fillable = ['bebida_inventario_id', 'platillos_id', 'bebidas_inventarios_id', 'productos_inventarios_id', 'totalpagar', 'pago', 'factura', 'cambio'];
    protected $fillable = ['bebidas_inventarios_id', 'platillos_id', 'productos_inventarios_id', 'totalpagar', 'pago', 'factura', 'cambio'];


    public function platillo()
{
    return $this->belongsTo(Platillo::class, 'platillo_id');
}

public function bebidaInventario()
{
    return $this->belongsTo(Bebida_Inventario::class, 'bebidas_inventarios_id');
}
    public function productoInventarios() {
        return $this->belongsTo(productoInventarios::class);
    }

=======
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
>>>>>>> dee61fcc842fd365d308971cca2dd6450b868a18
}
