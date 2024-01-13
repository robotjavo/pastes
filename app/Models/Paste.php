<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    protected $table = 'pastes';
    protected $fillable = ['comida', 'precio'];
    use HasFactory;
}
