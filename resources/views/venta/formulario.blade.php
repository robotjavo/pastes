
@extends('layouts.app')
@section('title', 'home')



@section('content')
    <h1>Formulario de Venta</h1>

    <form method="post" action="{{ url('/ventas/procesar') }}">
        @csrf

        <label for="platillos_id">Platillo:</label>
        <select name="platillos_id" required>
            @foreach($platillos as $platillo)
                <option value="{{ $platillo->id }}">{{ $platillo->nombre }} - ${{ $platillo->precio }}</option>
            @endforeach
        </select>

        <label for="bebidas_inventarios_id">Bebida:</label>
        <select name="bebidas_inventarios_id" required>
            @foreach($bebidas as $bebida)
                <option value="{{ $bebida->id }}">{{ $bebida->nombre }} - ${{ $bebida->precio }}</option>
            @endforeach
        </select>

        <label for="platillos_cantidad">Cantidad de Platillos:</label>
        <input type="number" name="platillos_cantidad" required>

        <label for="bebidas_cantidad">Cantidad de Bebidas:</label>
        <input type="number" name="bebidas_cantidad" required>

        <!-- Agrega campos del formulario según tus necesidades -->
        <label for="venta">Tipo de Venta:</label>
        <input type="text" name="venta" required>

        <label for="factura">Número de Factura:</label>
        <input type="text" name="factura" required>

        <label for="cambio">Cambio:</label>
        <input type="text" name="cambio" required>

        <button type="submit">Procesar Venta</button>
    </form>
@endsection
