@extends('layouts.app')
@section('title', 'Invetario bebidas')
@section('content')
<div class="section-content">
</div>
    <div class="container">
        <h1 id="title_name">Inventario de Bebidas</h1>

<a href="{{ route('bebidas_inevetario.create') }}" class="success">Agregar entrada</a>



        <table class="table mt-3">
            <thead>
                <tr>

                    <th>Bebida</th>
                    <th>Cantidad</th>
                    <th>Entran</th>
                    <th>Total</th>
                    <th>Precio</th>
                    <th>Vendidas</th>
                    <th>Sobrantes</th>
                    <th>Pedidos</th>
                    <th>Matricula del Empleado</th>
                    <th>Nombre del Empleado</th>
                    <th>fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bebidasInventario as $inventario)
                    <tr>
                         <td><center>{{ $inventario->nombre }}</center></td>

                        <td><center>{{ $inventario->cantidad }}</center></td>
                        <td><center>{{ $inventario->entran }}</center></td>
                        <td><center>{{ $inventario->total }}</center></td>
                        <td><center> $ {{ $inventario->precio }}</center></td>
                        <td><center>{{ $inventario->vendidas }}</center></td>
                        <td><center>{{ $inventario->sobrantes }}</center></td>
                        <td><center>{{ $inventario->pedidos }}</center></td>
                        <td><center>{{ $inventario->personal->Matricula }}</center></td>
                        <td><center>{{ $inventario->personal->Nombre }}</center></td>
                         <td><center>{{ $inventario->created_at }}</center></td>



                        <td>
                            <a href="{{ route('bebidas_inevetario.edit', $inventario->id) }}" class="btn btn-warning">agregar</a>
                            <form action="{{ route('bebidas_inevetario.destroy', $inventario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
