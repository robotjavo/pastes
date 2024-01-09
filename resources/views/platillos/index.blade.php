
   @extends('layouts.app')
@section('title', 'Inventario pastes')
@section('content')
<div class="section-content">
</div>

<div class="menu_pastes">


        <h2 id=title_name>Platillos pastes</h2><br>


            <label class="label"for="tiempoOcultar">Tiempo para ocultar mensajes (minutos): </label>
            <input type="text" id="tiempoOcultar" name="tiempoOcultar" value="5"><br>
            <button class="success" onclick="actualizarTiempo()">Actualizar Tiempo</button><br>
            <button class="danger" onclick="detenerTiempo()">Detener Tiempo</button><br><!-- Nuevo botón -->
        </div>

        <div class="menu_pastes"id="tiempoRestante">Tiempo restante: </div>
<div class="menu_pastes"> <button href="{{ route('platillos.create') }}" class="warning">Agregar pastes</button>
        <div>
        <!-- Mueve esta etiqueta script aquí -->
        <script src="{{ asset('js/temporizador.js') }}"></script>
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tabla de Platillos Preparados -->
    @if(count($platillosPreparados) > 0)
        <table>
            <thead>
                <tr>
                    <th>Nombre del Platillo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Agregar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($platillosPreparados as $platillo)
                    <tr>
                        <td>{{ $platillo->nombre }}</td>
                        <td>{{ $platillo->cantidad }}</td>
                        <td>{{ $platillo->precio }}</td>
                        <td>
                            <button href="{{ route('platillos.edit', $platillo->id) }}" class="warning">Agregar</button>
                            <!-- Agrega más enlaces de acciones si es necesario -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay platillos preparados aún.</p>
    @endif

    <!-- Enlace para crear nuevo platillo -->
</div>

@endsection


