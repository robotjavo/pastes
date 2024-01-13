@extends('layouts.app')
@section('title', 'registrar pastes')
@section('content')
<div class="section-content">
</div>
    <div class="menu_pastes">
        <h1 id=title_name>Crear Nuevo Platillo</h1>

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

        <!-- Formulario para crear nuevo platillo -->
<<<<<<< HEAD
        <form action="{{ route('platillos.store') }}" method="post">
=======
        <form action="{{ route('platillos.create') }}" method="post">
>>>>>>> dee61fcc842fd365d308971cca2dd6450b868a18
    @csrf
<div class="space-y-4">
            <label for="nombre">Nombre del Platillo:</label>
            <input class="option_value" type="text" name="nombre" required>
        </div><br>
<div class="space-y-4">
            <label for="masa_id">Selecciona una Masa:</label>
            <select  class="option_value" name="masa_id" required>
                @foreach($masas as $masa)
                    <option value="{{ $masa->id }}">{{ $masa->nombre }}</option>
                @endforeach
            </select>
           </div><br>
<div class="space-y-4">
            <label for="relleno_id">Selecciona un Relleno:</label>
            <select class="option_value" name="relleno_id" required>
                @foreach($rellenos as $relleno)
                    <option value="{{ $relleno->id }}">{{ $relleno->nombre }}</option>
                @endforeach
            </select>
        </div><br>
<div class="space-y-4">
            <label for="cantidad">Número de Platillos a Preparar:</label>
            <input class="option_value" type="number" name="cantidad" min="1" required>
</div><br>
             <button  class="success" type="submit">Crear Platillo</button>
</form>
    </div>
@endsection
