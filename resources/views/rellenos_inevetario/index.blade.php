@extends('layouts.app')
@section('title', 'Invetario Rellenos')
@section('content')
<div class="section-content">
</div>

    <div class="container">
        <h1 id="title_name">Inventario de Rellenos</h1>

<a  href="{{ route('rellenos_inevetario.create') }}" class="success">Agregar entrada </a> <br>

        <table class="table mt-3">
            <thead>
                <tr>

                    <th>Relleno</th>

                    <th>Cantidad</th>
                    <th>Entran</th>
                    <th>Total</th>

                    <th>faltantes</th>
                    <th>Sobrantes</th>
                    <th>Pedidos</th>
                    <th>Matricula del Empleado</th>
                    <th>Nombre del Empleado</th>
                    <th>fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rellenosInventario as $inventario)
                    <tr>
                         <td><center>{{ $inventario->nombre }}</center></td>

                        <td><center>{{ $inventario->cantidad }}</center></td>
                        <td><center>{{ $inventario->entran }}</center></td>
                        <td><center>{{ $inventario->total }}</center></td>

                        <td><center>{{ $inventario->faltantes }}</center></td>
                        <td><center>{{ $inventario->sobrantes }}</center></td>
                        <td><center>{{ $inventario->pedidos }}</center></td>
                        <td><center>{{ $inventario->personal->Matricula }}</center></td>
                          <td><center>{{ $inventario->personal->Nombre }}</center></td>
                         <td><center>{{ $inventario->created_at }}</center></td>



                        <td>
                            <a href="{{ route('rellenos_inevetario.edit', $inventario->id) }}" class="btn btn-warning">agregar</a>
                            <form action="{{ route('rellenos_inevetario.destroy', $inventario->id) }}" method="POST" style="display:inline;">
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

