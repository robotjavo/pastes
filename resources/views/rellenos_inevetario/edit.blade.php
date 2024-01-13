@extends('layouts.app')

@section('content')
<div class="section-content">
</div>
    <div class="container">
        <h1>Editar Entrada de Inventario</h1>
         <h2>Registro de {{$inventario->nombre }}</h2>

        <form action="{{ route('rellenos_inevetario.update', $inventario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="entran">Entran:</label>
                <input type="text" name="entran" class="form-control" value="{{ $inventario->entran }}" required>
            </div>

            <div class="form-group">
                <label for="faltantes">faltantes:</label>
                <input type="text" name="faltantes" class="form-control" value="{{ $inventario->faltantes }}">
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

        </form>
    </div>
@endsection
