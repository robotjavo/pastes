<?php
namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Platillo;
use App\Models\BebidaInventario;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function mostrarFormularioVenta()
    {
        // Obtener la lista de platillos y bebidas para mostrar en el formulario
        $platillos = Platillo::all();
        $bebidas = BebidaInventario::all();

        return view('ventas.formulario', compact('platillos', 'bebidas'));
    }

    public function procesarVenta(Request $request)
    {
        // Lógica para procesar la venta y almacenarla en la base de datos
        $venta = new Venta();
        $venta->platillos_id = $request->input('platillos_id');
        $venta->bebidas_inventarios_id = $request->input('bebidas_inventarios_id');
        $venta->productos_inventarios_id = $request->input('productos_inventarios_id');
        $venta->venta = $request->input('venta');
        $venta->factura = $request->input('factura');

        // Obtener los detalles del platillo seleccionado
        $platillo = Platillo::find($request->input('platillos_id'));
        $precioPlatillo = $platillo->precio;

        // Obtener los detalles de la bebida seleccionada
        $bebida = BebidaInventario::find($request->input('bebidas_inventarios_id'));
        $precioBebida = $bebida->precio;

        // Calcular el importe total
        $cantidadPlatillos = $request->input('platillos_cantidad');
        $cantidadBebidas = $request->input('bebidas_cantidad');
        $importeTotal = ($cantidadPlatillos * $precioPlatillo) + ($cantidadBebidas * $precioBebida);

        $venta->importe = $importeTotal;

        // Asumiendo que el cambio es ingresado por el usuario en el formulario
        $venta->cambio = $request->input('cambio');
        $venta->save();

        // Actualizar la cantidad de platillos y bebidas en inventario
        $platillo->cantidad -= $cantidadPlatillos;
        $bebida->cantidad -= $cantidadBebidas;

        // Guardar los cambios en las cantidades
        $platillo->save();
        $bebida->save();

        // Obtener la lista de ventas para mostrarla en la vista
        $ventas = Venta::all();

        // Otras acciones que puedas necesitar

        return view('ventas.lista', ['ventas' => $ventas])->with('success', 'Venta procesada con éxito');
    }
}
