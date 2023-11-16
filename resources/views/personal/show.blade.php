
@extends('layouts.app')

@section('title', "persona| $persona->Nombre")

@section('content')
<div class="container mx-auto mt-4">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-semibold text-orange-500 mb-4">{{ $persona->Nombre }}</h1>
{<div class="mb-4">
    <strong>Nombre:</strong> {{ $persona->Nombre }}
</div>
<div class="mb-4">
    <strong>Matricula:</strong> {{ $persona->Matricula }}
</div>
<div class="mb-4">
    <strong>Nip:</strong> {{ $persona->Nip }}
</div>
<div class="mb-4">
    <strong>Fecha de Creación:</strong> {{ $persona->created_at }}
</div>



        <div class="flex">
                <a href="{{route('personal.edit', $persona)}}"><button class="bg-gray-500 hover-bg-gray-700 text-white font-bold py-2 px-4 rounded">Editar</button></a>
                <form method="POST" action="{{route('personal.destroy', $persona)}}">
                @csrf @method('DELETE')
    <button class="bg-gray-500 hover-bg-gray-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
            <a href="{{ route('personal.index') }}" class="ml-auto">
                <button class="bg-gray-500 hover-bg-gray-700 text-white font-bold py-2 px-4 rounded">Regresar</button>
            </a>
        </div>
    </div>
</div>
@endsection
