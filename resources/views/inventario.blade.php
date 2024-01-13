@extends('layouts.app')
@section('title', 'personal')

@section('content')
<div class="section-content">
</div>
<h1>inventarios </h1>

<a href="javascript:history.back()" class="btn btn-secondary float-right">Regresar</a>
<div>
    <div class="flex space-x-4">
        <button type="button" onclick="window.location='{{ route('bebidas_inevetario.index') }}'" class="bg-blue-500 text-white px-4 py-2">inventario de bebidas</button>
    </div>
    <div class="flex space-x-4">
        <button type="button" onclick="window.location='{{ route('productos_inevetario.index') }}'" class="bg-blue-500 text-white px-4 py-2">inventario de producto</button>
    </div>


    <div class="flex space-x-4">
        <button type="button" onclick="window.location='{{ route('rellenos_inevetario.index') }}'" class="bg-blue-500 text-white px-4 py-2">inventario de Rellenos</button>
    </div>
    <div class="flex space-x-4">
        <button type="button" onclick="window.location='{{ route('masas_inevetario.index') }}'" class="bg-blue-500 text-white px-4 py-2">inventario de masas</button>
    </div>

</div>
@endsection
