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


}
