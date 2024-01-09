<?php

namespace App\Http\Controllers;


use App\Models\Producto;
use App\Models\Personal;
use App\Models\Producto_Inventario;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Productos_IventarioController extends Controller
{
   public function index()
    {
        $productosInventario = Producto_Inventario::with('personal')->get();
        return view('productos_inevetario.index', compact('productosInventario'));
    }

    // Mostrar el formulario para crear una nueva entrada en el inventario
    public function create()
    {

        return view('productos_inevetario.create');
    }

    // Almacenar una nueva entrada en el inventario
    public function store(Request $request)
    {
        $request->validate([
    'nombre'=>'required', // Corregido: cambiar "productods" a "productos"
    'cantidad' => 'required|numeric',
    'entran' => 'required|numeric',
    'faltantes' => 'nullable|numeric',
    'pedidos' => 'numeric',
]);
$personal = Personal::where('Matricula', $request->input('Matricula'))->first();

    if (!$personal) {
        return redirect()->back()->with('error', 'Empleado no encontrado');
    }

    $personalId = $personal->id;
        // Calcula el valor para 'total'

        $total = $request->input('cantidad') + $request->input('entran');
        $faltantes = $request->input('faltantes');
        $sobrantes = $total - $faltantes;

        $productoInventario = new Producto_Inventario([
    'nombre' => $request->input('nombre'), // Corregido: usar 'productos_id' en lugar de 'producto_id'
    'cantidad' => $request->input('cantidad'),
    'entran' => $request->input('entran'),
    'total' => $total,
    'faltantes' => $request->input('faltantes'),
    'sobrantes' => $sobrantes,
    'pedidos' => $request->input('pedidos'),
    'personal_id' => $personalId,
]);

$productoInventario->save();

        return redirect()->route('productos_inevetario.index')->with('success', 'Entrada de inventario creada correctamente.');
    }

    // Mostrar el formulario para editar una entrada en el inventario
public function edit($id)
{
     $inventario = Producto_Inventario::findOrFail($id);
    $productosInventario = Producto_Inventario::with('personal')->get(); // Add this line to fetch the data

    return view('productos_inevetario.edit', compact('inventario', 'productosInventario'));
}

    // Actualizar una entrada en el inventario
    public function update(Request $request, $id)
{
    $request->validate([
        'entran' => 'required|numeric',
        'faltantes' => 'numeric',
        'pedidos' => 'numeric',
    ]);
       // Obtener el ID del usuario asociado a la matrícula proporcionada
    $personal = Personal::where('Matricula', $request->input('Matricula'))->first();

    if (!$personal) {
        return redirect()->back()->with('error', 'Empleado no encontrado');
    }

    $personalId = $personal->id;


    // Recuperar el registro existente
    $productoInventario = Producto_Inventario::findOrFail($id);

    // Calcular la nueva cantidad y total
    $nuevaCantidad = $productoInventario->sobrantes;
    $nuevoTotal = $nuevaCantidad + $request->input('entran');

    // Calcular los sobrantes
    $sobrantes1 = $nuevoTotal - $request->input('faltantes');

    // Actualizar los campos relevantes
    $productoInventario->update([
        'cantidad' => $nuevaCantidad,
        'total' => $nuevoTotal,
        'entran' => $request->input('entran'),
        'faltantes' => $request->input('faltantes'),
        'sobrantes' => $sobrantes1, // Corregido: usar $sobrantes en lugar de $sobrantes1
        'pedidos' => $request->input('pedidos'),
        'personal_id' => $personalId,
    ]);
     return redirect()->route('productos_inevetario.index')->with('success', 'Entrada de inventario creada correctamente.');
    }

    // Eliminar una entrada en el inventario
    public function destroy($id)
    {
        $productoInventario = Producto_Inventario::findOrFail($id);
        $productoInventario->delete();

        return redirect()->route('productos_inevetario.index')->with('success', 'Entrada de inventario eliminada correctamente.');
    }
}
