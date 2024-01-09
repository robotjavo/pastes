<?php

namespace App\Http\Controllers;

use App\Models\Masa_Inventario;
use App\Models\Relleno_Inventario;
use App\Models\Platillo;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class PlatilloController extends Controller {
    public function index() {
        $masas = Masa_Inventario::all();
        $rellenos = Relleno_Inventario::all();
        $platillosPreparados = Platillo::all();

        return view('platillos.index', compact('masas', 'rellenos', 'platillosPreparados'));
    }



    public function create(Request $request) {
    $masas = Masa_Inventario::all();
    $rellenos = Relleno_Inventario::all();

    return view('platillos.create', compact('masas', 'rellenos'));
}

public function store(Request $request) {
    // Validación de datos
    $request->validate([
        'nombre' => 'required|string',
        'masa_id' => 'required|exists:masas_inventarios,id',
        'relleno_id' => 'required|exists:rellenos_inventarios,id',
        'cantidad' => 'required|integer|min:1',
    ]);

    // Lógica para almacenar un nuevo platillo
    try {
        DB::beginTransaction();

        $masa = Masa_Inventario::find($request->masa_id);
        $relleno = Relleno_Inventario::find($request->relleno_id);

        if ($masa->total >= $request->cantidad && $relleno->total >= $request->cantidad) {
            Platillo::create([
    'nombre' => $request->nombre,
    'masa_id' => $request->masa_id,
    'relleno_id' => $request->relleno_id,
    'cantidad' => $request->cantidad, // Agrega la cantidad aquí
]);


            $masa->faltantes += $request->cantidad;
$masa->sobrantes = $masa->total - $masa->faltantes;
$masa->save();

$relleno->faltantes += $request->cantidad;
$relleno->sobrantes =$relleno->total - $relleno->faltantes;
$relleno->save();



            DB::commit();

            return redirect()->route('platillos.index')->with('success', 'Platillo creado exitosamente');
        } else {
            return redirect()->route('platillos.index')->with('error', 'No hay suficientes porciones disponibles');
        }
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->route('platillos.index')->with('error', 'Error al crear el platillo');
    }
}
      public function show($id) {
        $platillo = Platillo::findOrFail($id);

        return view('platillos.show', compact('platillo'));
    }

    public function edit($id) {
        $platillo = Platillo::findOrFail($id);
        $masas = Masa_Inventario::all();
        $rellenos = Relleno_Inventario::all();

        return view('platillos.edit', compact('platillo', 'masas', 'rellenos'));
    }


public function update(Request $request, $id) {
    // Validación de datos
    $request->validate([
        'cantidad' => 'required|integer|min:1',
    ]);

    try {
        // Inicia una transacción de base de datos
        DB::beginTransaction();

        // Obtén el platillo existente
        $platillo = Platillo::findOrFail($id);

        // Obtén las masas y rellenos
        $masa = Masa_Inventario::find($platillo->masa_id);
        $relleno = Relleno_Inventario::find($platillo->relleno_id);

        // Calcular la diferencia de cantidad
        $diferenciaCantidad = $request->cantidad - $platillo->cantidad;

        // Verifica si hay suficientes porciones disponibles de masa y relleno para realizar la actualización
        if ($masa->faltantes + $diferenciaCantidad >= 0 && $relleno->faltantes + $diferenciaCantidad >= 0) {
            // Actualiza la cantidad de platillos directamente con la nueva cantidad
            $platillo->update([
                'cantidad' => $platillo->cantidad + $request->cantidad, // Sumar la nueva cantidad
            ]);

            // Actualiza las cantidades en masa y relleno
            $masa->faltantes += $request->cantidad;
            $masa->sobrantes = $masa->total - $masa->faltantes;
            $masa->save();

            $relleno->faltantes += $request->cantidad;
            $relleno->sobrantes = $relleno->total - $relleno->faltantes;
            $relleno->save();

            // Confirma la transacción de base de datos
            DB::commit();

            return redirect()->route('platillos.index')->with('success', 'Cantidad de platillos actualizada exitosamente');
        } else {
            // Si no hay suficientes porciones disponibles, deshace la transacción
            DB::rollBack();

            return redirect()->route('platillos.index')->with('error', 'No hay suficientes porciones disponibles para realizar la actualización');
        }
    } catch (\Exception $e) {
        // Si ocurre algún error, deshace la transacción
        DB::rollBack();

        return redirect()->route('platillos.index')->with('error', 'Error al actualizar la cantidad de platillos');
    }
}




    public function destroy($id) {
        // Lógica para eliminar un platillo existente
        $platillo = Platillo::findOrFail($id);
        $platillo->delete();

        return redirect()->route('platillos.index')->with('success', 'Platillo eliminado exitosamente');
    }

}

