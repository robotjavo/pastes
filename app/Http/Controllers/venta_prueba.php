<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class venta_prueba extends Controller
{
    //
    public function index()
    {
      $contadorpastes =15;
        
        return view('venta.venta', compact('contadorpastes'));
    }

}
