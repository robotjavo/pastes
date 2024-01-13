<?php

namespace App\Http\Controllers;



use App\Models\Bebida;

use App\Models\Bebida_Inventario;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
class Bebidas_IventarioController extends Controller
{
  // Mostrar la lista de bebidas en inventario
    public function index()
    {
        $bebidasInventario = Bebida_Inventario::with([ 'personal'])->get();
        return view('bebidas_inevetario.index', compact('bebidasInventario'));
    }

    // Mostrar el formulario para crear una nueva entrada en el inventario
    public function create()
    {

        return view('bebidas_inevetario.create');
    }

    // Almacenar una nueva entrada en el inventario
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> 'required',
            'cantidad' => 'required|numeric',
            'entran' => 'required|numeric',
            'vendidas' => 'nullable|numeric',
            'pedidos' => 'numeric',
        ]);

    // Obtener el ID del usuario asociado a la matrícula proporcionada
    $personal = Personal::where('Matricula', $request->input('Matricula'))->first();

    if (!$personal) {
        return redirect()->back()->with('error', 'Empleado no encontrado');
    }

    $personalId = $personal->id;
        // Calcula el valor para 'total'

        $total = $request->input('cantidad') + $request->input('entran');
       $vendidas = $request->input('vendidas');
        $sobrantes = $total - $vendidas;
    // Crea la entrada de inventario con el ID del usuario
        $bebidaInventario = new Bebida_Inventario([
    'nombre' => $request->input('nombre'),
    'cantidad' => $request->input('cantidad'),
    'entran' => $request->input('entran'),
    'total' => $total,
    'vendidas' => $request->input('vendidas'),
    'sobrantes' => $sobrantes,
    'pedidos' => $request->input('pedidos'),
    'personal_id' => $personalId,
]);

$bebidaInventario->save();

        return redirect()->route('bebidas_inevetario.index')->with('success', 'Entrada de inventario creada correctamente.');
    }

    // Mostrar el formulario para editar una entrada en el inventario
   public function edit($id)
{
    $inventario = Bebida_Inventario::findOrFail($id);


    return view('bebidas_inevetario.edit', compact('inventario'));
}

    // Actualizar una entrada en el inventario
public function update(Request $request, $id)
{
    $request->validate([
        'entran' => 'required|numeric',
        'vendidas' => 'numeric',
        'pedidos' => 'numeric',
    ]);
      // Obtener el ID del usuario asociado a la matrícula proporcionada
    $personal = Personal::where('Matricula', $request->input('Matricula'))->first();

    if (!$personal) {
        return redirect()->back()->with('error', 'Empleado no encontrado');
    }

    $personalId = $personal->id;

    // Recuperar el registro existente
    $bebidaInventario = Bebida_Inventario::findOrFail($id);

    // Calcular la nueva cantidad y total
    $nuevaCantidad = $bebidaInventario->sobrantes;
    $nuevoTotal = $nuevaCantidad + $request->input('entran');

    // Calcular los sobrantes
    $sobrantes1 = $nuevoTotal - $request->input('vendidas');

    // Actualizar los campos relevantes
    $bebidaInventario->update([
        'cantidad' => $nuevaCantidad,
        'total' => $nuevoTotal,
        'entran' => $request->input('entran'),
        'vendidas' => $request->input('vendidas'),
        'sobrantes' => $sobrantes1, // Corregido: usar $sobrantes en lugar de $sobrantes1
        'pedidos' => $request->input('pedidos'),
         'personal_id' => $personalId,
    ]);
     return redirect()->route('bebidas_inevetario.index')->with('success', 'Entrada de inventario creada correctamente.');
}

    // Eliminar una entrada en el inventario
    public function destroy($id)
    {
        $bebidaInventario = Bebida_Inventario::findOrFail($id);
        $bebidaInventario->delete();

        return redirect()->route('bebidas_inevetario.index')->with('success', 'Entrada de inventario eliminada correctamente.');
    }

}
