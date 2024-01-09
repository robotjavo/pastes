    @extends('layouts.app')
    @section('title', 'editar pastes')
    @section('content')
       <div class="container">
        <h2>Editar pastes</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="post" action="{{ route('platillos.update', $platillo->id) }}">
            @csrf
            @method('PUT')

            <p>Nombre del Platillo: {{ $platillo->nombre }}</p>

            <div class="form-group">
                <label for="cantidad">Cantidad de Platillos:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $platillo->cantidad }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Cantidad</button>
        </form>
    </div>
@endsection

