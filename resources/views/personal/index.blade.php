@extends('layouts.app')
@section('title', 'personal')

@section('content')

<header class="px-6 space-y-2 text-center">
    <h1 class="font-serif text-3xl text-center text-orange-500 dark:text-orange-500">Personal</h1>
</header>

<div class="flex items-center">
    <form action="{{ route('personal.index') }}" method="GET" class="mb-4 flex-1">
        <div class="flex items-center">
            <label for="search" class="mr-2"></label>
            <input type="text" name="search" id="search" class="rounded border-gray-300 mr-2 py-2 px-3" value="{{ request()->input('search') }}" placeholder="Ingrese término de búsqueda...">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buscar</button>
        </div>
    </form>

    <div class="flex items-center justify-end flex-1">
        <div class="ml-auto">
            <a class="inline-flex items-center px-7 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md dark:text-sky-200 bg-slate-300 hover:bg-orange-400 active:bg-orange-400 focus:outline-none focus:border-sky-900 focus:shadow-outline-sky mx-3 my-1" href="{{ route('personal.create') }}">Crear</a>
        </div>
    </div>
</div>

<div class="flex flex-col">
    <div class="sm:-mx-3 lg:-mx-5">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <table class="min-w-full text-center text-sm font-center">
                <thead class="border-b font-medium bg-orange-400">
                    <tr>
                        <th scope="col" class="px-6 py-4">Id</th>
                        <th scope="col" class="px-6 py-4">Nombre</th>
                        <th scope="col" class="px-6 py-4">Matricula</th>
                        <th scope="col" class="px-6 py-4">Nip</th>
                        <th scope="col" class="px-6 py-4">Fecha</th>
                        <th scope="col" class="px-6 py-4">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($personal as $persona)
                        <tr class="bg-slate-300 dark:bg-slate-300">
                            <td class="whitespace-nowrap px-6 py-4">||{{ $persona->id }}||</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <a class="text-stone-600 underline hover:text-stone-800" href="{{ route('personal.show', $persona) }}">
                                    {{ $persona->Nombre }}||
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $persona->Matricula }}||</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $persona->Nip }}|</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $persona->created_at }}||</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <form method="POST" action="{{ route('personal.destroy', $persona) }}">
                                   ||@csrf
                                    @method('DELETE')
                                    <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-red-500 uppercase transition duration-150 ease-in-out dark:text-red-500/80 hover:text-red-600 focus:outline-none">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay empleados para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{ $personal->links() }}

@endsection
