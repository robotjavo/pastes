@csrf
<div class="space-y-4">
<label class="flex flex-col">
			<span class="font-serif text-slate-600 dark:text-slate-400">Nombre</span>
			<input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="Nombre" value="{{old('Nombre', $persona->Nombre)}}">
        <small class="font-white text-red-/800"></small>
		</label>

<label class="flex flex-col">
	<span class="font-serif text-slate-600 dark:text-slate-400">Matricula</span>

			<input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400"  type="text" name="Matricula" value="{{old('Matricula', $persona->Matricula)}}">

			<small class="font-white text-red-/800"></small>
		</label>

		<label class="flex flex-col">
			<span class="font-serif text-slate-600 dark:text-slate-400">Nip</span>
			<input class="rounded-md shadow-sm border-slate-300 dark:bg-slate-900/80 text-slate-600 dark:text-slate-400 focus:ring focus:ring-slate-300 dark:focus:ring-slate-800 focus:ring-opacity-50 dark:focus:border-slate-700 focus:border-slate-300 dark:bg-slate-800 dark:border-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" type="text" name="Nip" value="{{old('Nip', $persona->Nip)}}">

			<small class="font-white text-red-/800"></small>
		</label>


			<small class="font-white text-red-/800"></small>
		</label>





		<button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit" href="{{route('personal.index')}}">{{$btnText}}</button>
		<br>