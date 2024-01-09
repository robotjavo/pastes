@extends('layouts.app')
@section('title', 'registrar pedido')
@section('content')
<div class="section-content">
</div>
    <div class="container">
        <h1>Agregar Entrada de Inventario</h1>

        <form action="{{ route('masas_inevetario.store') }}" method="POST">
            @csrf



<div class="form-group">
                <label for="nombre">masa:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="text" name="cantidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="entran">Entran:</label>
                <input type="text" name="entran" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="faltantes">faltantes:</label>
                <input type="text" name="faltantes" class="form-control">
            </div>

            <div class="form-group">
                <label for="pedidos">Pedidos:</label>
                <input type="text" name="pedidos" class="form-control">
            </div>
             <div class="form-group">
                <label for="Matricula">Matrícula:</label>
                <input type="text" name="Matricula" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <div class="flex items-center justify-between mt-4">
            <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('masas_inevetario.index') }}">cancelar</a>
        </div>
    </div>
@endsection
