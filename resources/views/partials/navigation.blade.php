<nav class="bg-white border-gray-200 dark:bg-gray-900">
<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

    <header class="header">
		<div class="container">
		<div class="btn-menu">
        <img src="https://i0.wp.com/pastesrealdeplateros.mx/wp-content/uploads/2021/06/logoRDP.jpg?resize=80%2C73&ssl=1"  alt="Flowbite Logo" /></label>
		</div>
			<div class="logo">
				<h1>Real de Plateros</h1>
			</div>

			<nav class="menu">
				<li><a href="{{ route('home') }}">Inicio</a></li>
				<li><a href="{{route('venta.index')}}">Venta</a></li>
				<li><a href="{{ route('platillos.index') }}">Pastes</a></li>
				<li><a href="#">Inventario</a>
					<ul class="menu-vertical">
						<li onclick="window.location='{{ route('bebidas_inevetario.index') }}'">Inventario De Bebidas</li>
						<li onclick="window.location='{{ route('productos_inevetario.index') }}'">Inventario De Producto</li>
						<li onclick="window.location='{{ route('rellenos_inevetario.index') }}'">Inventario De Rellenos</li>
						<li onclick="window.location='{{ route('masas_inevetario.index') }}'" >Inventario De Masas</li>
					</ul>
				</li>
				<li><a href="{{ route('checador.index') }}">Checador</a></li>
        		<li><a href="{{ route('personal.index') }}">Personal</a></li>
      			<li><a href="{{ route('Historial') }}">Historial</a></li>
			</nav>
		</div>
	</header>
	<div class="capa"></div>
  </div>
</nav>
