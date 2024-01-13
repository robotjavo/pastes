@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Entrada de Inventario bedidas </h1>
        <h2>Registro de  {{$inventario->nombre }}</h2>

        <form action="{{ route('bebidas_inevetario.update', $inventario->id) }}" method="POST">
            @csrf
            @method('PUT')



            <div class="form-group">
                <label for="entran">Entran:</label>
                <input type="text" name="entran" class="form-control" value="{{ $inventario->entran }}" required>
            </div>

            <div class="form-group">
                <label for="vendidas">Vendidas:</label>
                <input type="text" name="vendidas" class="form-control" value="{{ $inventario->vendidas }}">
            </div>

            <div class="form-group">
                <label for="pedidos">Pedidos:</label>
                <input type="text" name="pedidos" class="form-control" value="{{ $inventario->pedidos }}">
            </div>
             <div class="form-group">
                <label for="Matricula">Matrícula:</label>
                <input type="text" name="Matricula" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
             <div class="flex items-center justify-between mt-4">
            <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('bebidas_inevetario.index') }}">cancelar</a>
        </form>
    </div>
@endsection
