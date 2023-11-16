<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Tiempo;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SavePersonalRequest;


class PersonalController extends Controller
{

  public function index(Request $request)
{
    $searchTerm = $request->input('search');

    $personal = Personal::query()
    ->when($searchTerm, function ($query, $searchTerm) {
        return $query->where('Nombre', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('Matricula', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('Nip', 'LIKE', '%' . $searchTerm . '%');
    })
    ->orderBy('Nombre')
    ->paginate(10);

return view('personal.index', compact('personal'));

}


public function show(Personal $persona)
{
   return view('personal.show',
        ['persona' => $persona
    ]);
}

public function create(){
    return view('personal.create',[
    'persona' => new Personal
        ]);
}

public function store(SavePersonalRequest $request)
{
    Personal::create($request->validated() );
    return redirect()->route('personal.index')->with('status','El empleado fue ingresado correcto');
}

public function edit(Personal $persona)
{
    return view('personal.edit', [
        'persona' => $persona
    ]);
}
public function update(Personal $persona, SavePersonalRequest $request)
{
    $persona->update($request->validated());

    return redirect()->route('personal.show', $persona)->with('status', 'La información del empleado fue actualizada con éxito.');
}


public function destroy(Personal $persona)
{
    $persona->delete();

    return redirect()->route('personal.index');
}
}
