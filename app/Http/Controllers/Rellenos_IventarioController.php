<?php

namespace App\Http\Controllers;



use App\Models\Relleno_Inventario;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
class Rellenos_IventarioController extends Controller
{
  // Mostrar la lista de bebidas en inventario
     public function index()
    {
        $rellenosInventario = Relleno_Inventario::with('personal')->get();
        return view('rellenos_inevetario.index', compact('rellenosInventario'));
    }

    // Mostrar el formulario para crear una nueva entrada en el inventario
    public function create()
    {

        return view('rellenos_inevetario.create');
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

        $rellenoInventario = new Relleno_Inventario([
    'nombre' => $request->input('nombre'), // Corregido: usar 'productos_id' en lugar de 'producto_id'
    'cantidad' => $request->input('cantidad'),
    'entran' => $request->input('entran'),
    'total' => $total,
    'faltantes' => $request->input('faltantes'),
    'sobrantes' => $sobrantes,
    'pedidos' => $request->input('pedidos'),
    'personal_id' => $personalId,
]);

$rellenoInventario->save();

        return redirect()->route('rellenos_inevetario.index')->with('success', 'Entrada de inventario creada correctamente.');
    }

    // Mostrar el formulario para editar una entrada en el inventario
public function edit($id)
{
    $inventario = Relleno_Inventario::findOrFail($id);
    // Corregido: cambiar "$producto" a "$productos"

    return view('rellenos_inevetario.edit', compact('inventario'));
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
    $rellenoInventario = Relleno_Inventario::findOrFail($id);

    // Calcular la nueva cantidad y total
    $nuevaCantidad = $rellenoInventario->sobrantes;
    $nuevoTotal = $nuevaCantidad + $request->input('entran');

    // Calcular los sobrantes
    $sobrantes1 = $nuevoTotal - $request->input('faltantes');

    // Actualizar los campos relevantes
    $rellenoInventario->update([
        'cantidad' => $nuevaCantidad,
        'total' => $nuevoTotal,
        'entran' => $request->input('entran'),
        'faltantes' => $request->input('faltantes'),
        'sobrantes' => $sobrantes1, // Corregido: usar $sobrantes en lugar de $sobrantes1
        'pedidos' => $request->input('pedidos'),
        'personal_id' => $personalId,
    ]);
     return redirect()->route('rellenos_inevetario.index')->with('success', 'Entrada de inventario creada correctamente.');
    }

    // Eliminar una entrada en el inventario
    public function destroy($id)
    {
        $rellenoInventario = Relleno_Inventario::findOrFail($id);
        $rellenoInventario->delete();

        return redirect()->route('relleno_inevetario.index')->with('success', 'Entrada de inventario eliminada correctamente.');
    }
}
