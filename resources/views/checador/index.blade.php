@extends('layouts.app')
@section('title', 'Checador')

@section('content')
<h1>Checador de asistencia</h1>
<div>
    <form action="{{ route('checador.index') }}" method="GET">
        <div class="flex space-x-4">
            <input type="text" name="Matricula" placeholder="Buscar por Matrícula" value="{{ request('Matricula') }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Buscar</button>
        </div>
    </form>
</div>

<div class="flex items-center justify-end flex-1">
    <div class="ml-auto">
        <a class="inline-flex items-center px-7 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-slate-300 hover:bg-orange-400 active:bg-orange-400 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky mx-3 my-1" href="{{ route('checador.create') }}">Registro entrada</a>
    </div>
</div>
<div class="flex items-center justify-end flex-1">
    <div class="ml-auto">
        <a class="inline-flex items-center px-7 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-slate-300 hover:bg-orange-400 active:bg-orange-400 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky mx-3 my-1" href="{{ route('checador.create_salida') }}">Registro salida</a>
    </div>
</div>


<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Matricula</th>
            <th>Hora de Entrada</th>
            <th>Hora de Salida</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tiempos as $tiempo)
            <tr>
                <td>{{ $tiempo->personal->Nombre }}</td> <!-- Aquí corrige 'nombre' en lugar de 'Nombre' -->
                <td>{{ $tiempo->personal->Matricula }}</td>
                <td>{{ $tiempo->entrada }}</td>
                <td>{{ $tiempo->salida }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
