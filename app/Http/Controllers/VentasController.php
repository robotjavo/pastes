<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Platillo;
use App\Models\Bebida_Inventario;
use App\Models\Producto_Inventario;
use Illuminate\Http\Request;



class VentasController extends Controller
{


  public function index()
    {
        $platillos = Platillo::all();
        $bebidas = Bebida_Inventario::all();
        $productos = Producto_Inventario::all();
        $ventas = Venta::all();

        return view('venta.index', compact('platillos', 'bebidas', 'ventas', 'productos'));
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $platillo = Platillo::find($request->platillo_id);
        $bebida = BebidaInventario::find($request->bebidas_inventarios_id);

        $totalpagar = $platillo->precio + $bebida->precio;
        $cambio = $request->pago - $totalpagar;

        $venta = new Venta([
            'platillos_id' => $request->platillo_id,
            'bebidas_inventarios_id' => $request->bebidas_inventarios_id,
            'productos_inventarios_id' => $request->productos_inventarios_id,
            'totalpagar' => $totalpagar,
            'factura' => 'si', // Adjust according to your logic
            'pago' => $request->pago,
            'cambio' => $cambio,
        ]);

        $venta->save();

        return redirect()->route('venta.index')->with('success', 'La transacción se ha completado exitosamente.');
    }

    protected function validateForm(Request $request)
    {
        return $request->validate([
            'platillo_id' => 'required|exists:platillos,id',
            'bebidas_inventarios_id' => 'required|exists:bebidas_inventarios,id',
            'productos_inventarios_id' => 'required|exists:productos_inventarios,id',
            'pago' => 'required|numeric|min:' . $request->totalpagar,
        ]);
    }
}

