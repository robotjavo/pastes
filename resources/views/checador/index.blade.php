@extends('layouts.app')
@section('title', 'Checador')

@section('content')

<div class="section-content">
</div>
<h1 id="title_name">Checador de asistencia</h1>


<div class="menu_pastes">
    <form action="{{ route('checador.index') }}" method="GET">
        <div class="flex space-x-4">
            <input type="text" name="Matricula" placeholder="Buscar por Matrícula" value="{{ request('Matricula') }}">
            <button type="submit" class="warning">Buscar</button>
        </div>
    </form>
</div>

<div class="flex items-center justify-end flex-1">
    <div class="ml-auto">
        <button class="success" href="{{ route('checador.create') }}">Registro entrada</button>
    </div>
</div>
<div class="flex items-center justify-end flex-1">
    <div class="ml-auto">
        <button class="danger" href="{{ route('checador.create_salida') }}">Registro salida</button>
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
