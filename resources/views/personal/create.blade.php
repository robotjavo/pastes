@extends('layouts.app')
@section('title', 'Agregar Empleado')


@section('content')
<div class="section-content">
</div>
	<h1 class="my-4 font-serif text-3xl text-center text-orange-500 dark:text-orange-500">Agregar empleado</h1>

	@include('partials.validation-errors')


	<form class="max-w-xl px-8 py-4 mx-auto bg-orange-400 rounded shadow bg-orange-400"method="POST" action="{{route('personal.store')}}">

		@include('personal._form',['btnText'=>'Guardar'])
<div class="flex items-center justify-between mt-4">
            <a class="text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('personal.index') }}">cancelar</a>


        </div>

	</form>
@endsection
