<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals';
    protected $fillable = ['Nombre', 'Matricula', 'Nip'];

public function tiempos()
    {
        return $this->hasMany(Tiempo::class);
    }
public function bebidaInventarios()
    {
        return $this->hasMany(Bebida_Inventario::class, 'personal_id');
    }
public function productoInventarios()
    {
        return $this->hasMany(Bebida_Inventario::class, 'personal_id');
    }
    public function rellenosInventarios()
    {
        return $this->hasMany(Relleno_Inventario::class, 'personal_id');
    }
    public function masasInventarios()
    {
        return $this->hasMany(Masa_Inventario::class, 'personal_id');
    }

}
