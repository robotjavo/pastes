<?php

namespace App\Http\Controllers;


use App\Models\Tiempo;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SaveTiempoRequest;

class TiemposController extends Controller
{
   public function index(Request $request)
{
    $query = Tiempo::query();

    // Verifica si se proporciona un valor de Matricula en la URL
    if ($request->has('Matricula')) {
        $query->whereHas('personal', function ($subQuery) use ($request) {
            $subQuery->where('Matricula', $request->input('Matricula'));
        });
    }

    $tiempos = $query->get();

    return view('checador.index', compact('tiempos'));
}

  public function create()
    {
        return view('checador.create');
    }

public function store(Request $request)
{
    $Matricula = $request->input('Matricula');
    $Nip = $request->input('Nip');

    // Realiza una búsqueda en la base de datos para verificar si el empleado existe
    $empleado = Personal::where('Matricula', $Matricula)
                         ->where('Nip', $Nip)
                         ->first();

    if ($empleado) {
        // El empleado existe, puedes continuar
        $horaSalida = $request->input('hora_salida');

        Tiempo::create([
            'personal_id' => $empleado->id, // Asigna el ID del empleado
            'entrada' => now(), // Hora de entrada
            'salida' => $horaSalida, // Inicialmente, la hora de salida es nula
            // Otros campos de tiempo si es necesario
        ]);

        return redirect()->route('checador.index')->with('status', 'Registro creado con éxito');
    } else {
        return redirect()->back()->with('error', 'Empleado no encontrado');
    }
}
public function createSalida()
{
      $empleado = null; // Definir $empleado como nulo aquí o recuperar el empleado según tu lógica
    return view('checador.create_salida', compact('empleado'));

}
public function storeSalida(Request $request)
{
    $Matricula = $request->input('Matrícula');
    $Nip = $request->input('Nip');

    // Realiza una búsqueda en la base de datos para verificar si el empleado existe
    $empleado = Personal::where('Matricula', $Matricula)
                         ->where('Nip', $Nip)
                         ->first();

    if ($empleado) {
        // El empleado existe, puedes continuar
        // Ahora verifica si hay una hora de entrada registrada
        $tiempo = Tiempo::where('personal_id', $empleado->id)
                        ->whereNotNull('entrada') // Asegúrate de que haya una hora de entrada registrada
                        ->whereNull('salida') // Asegúrate de que no haya una hora de salida registrada
                        ->first();

        if ($tiempo) {
            // Marca la hora de salida
            $tiempo->salida = now();
            $tiempo->save();
            return redirect()->route('checador.index')->with('status', 'Registro creado con éxito');
        } else {
             return redirect()->route('checador.index')->with('status', 'Registro creado con éxito');
        }
    } else {
        return redirect()->back()->with('error', 'Empleado no encontrado');
    }
}











/*
public function store(Request $request)
    {

        $Matricula = $request->input('Matricula');
        $Nip = $request->input('Nip');

        // Realiza una búsqueda en la base de datos para verificar si el empleado existe
        $empleado = Personal::where('Matricula', $Matricula)
                             ->where('Nip', $Nip)
                             ->first();

        if ($empleado) {
            // El empleado existe, puedes crear el registro de tiempo relacionado
            $tiempo = new Tiempo([
                'entrada' => now(), // O la hora de entrada deseada
                // Otros campos de tiempo si es necesario
            ]);

            // Asigna el empleado relacionado
            $tiempo->personal()->associate($empleado);
            $tiempo->save();

            return redirect()->route('checador.index')->with('status', 'Registro creado con éxito');
        } else {
            return redirect()->back()->with('error', 'Empleado no encontrado');
        }
    }*/
}
