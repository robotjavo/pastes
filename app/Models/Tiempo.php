<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiempo extends Model
{
    protected $fillable = ['entrada', 'salida', 'personal_id'];

   public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
}