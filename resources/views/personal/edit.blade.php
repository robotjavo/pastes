@extends('layouts.app')
@section('title', "Editar |" .$persona->Nombre)


@section('content')
	<h1 class="my-4 font-serif text-3xl text-center text-orange-500 dark:text-orange-500">Editar registro</h1>
	@include('partials.validation-errors')
	<form class="max-w-xl px-8 py-4 mx-auto bg-orange-500 rounded shadow dark:bg-orange-500"method="POST" action="{{route('personal.update', $persona)}}">
		@method('PAtCH')

		@include('personal._form',['btnText'=>'Actulizar'])
		<div class="flex items-center justify-between mt-4">
            <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('personal.index') }}">cancelar</a>


        </div>

	</form>
@endsection