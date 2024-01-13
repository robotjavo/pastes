@extends('layouts.app')
@section('title', 'Crear Registro de horas')
@section('content')

<div class="section-content">
</div>
<h1 class="my-4 font-serif text-3xl text-center text-orange-500 dark:text-orange-500">Registrar horas</h1>

    @include('partials.validation-errors')
<form action="{{ route('checador.store') }}" method="post">
    @csrf

    <div class="space-y-4">
        <div<label class="flex flex-col">
            <span class="font-serif text-slate-600 dark:text-slate-400">Matricula</span>
            <input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="Matricula" value="{{ old('Matricula') }}">
            <small class="font-white text-red-/800"></small>
        </label>

        <label class="flex flex-col">
            <span class="font-serif text-slate-600 dark:text-slate-400">NIP</span>
            <input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="password" name="Nip" value="{{ old('Nip') }}">
            <small class="font-white text-red-/800"></small>
        </label>

        @if(session('error'))
            <p class="text-red-600">{{ session('error') }}</p>
        @endif

        <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active-bg-sky-700 focus:outline-none focus-border-sky-500" type="submit">Verificar Matrícula y NIP</button>
    </div>
</form>
<div class="flex items-center justify-between mt-4">
            <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('checador.index') }}">cancelar</a>
@endsection
