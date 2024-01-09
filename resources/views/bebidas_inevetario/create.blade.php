        @extends('layouts.app')
@section('title', 'registrar pedido')
@section('content')
    <div class="section-content">
</div>
<div class="menu_pastes">
        <h1 id="title_name">Agregar Entrada de Bebidas</h1>

        <form action="{{ route('bebidas_inevetario.store') }}" method="POST">
            @csrf



<div class="form-group">
                <label for="nombre">nombre:</label>
                <input class="option_value" type="text" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input class="option_value" type="text" name="cantidad" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="entran">Entran:</label>
                <input class="option_value"  type="text" name="entran" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="vendidas">Vendidas:</label>
                <input class="option_value"  type="text" name="vendidas" class="form-control">
            </div>

            <div class="form-group">
                <label for="pedidos">Pedidos:</label>
                <input  class="option_value" type="text" name="pedidos" class="form-control">
            </div>
             <div class="form-group">
                <label for="Matricula">Matrícula:</label>
                <input  class="option_value" type="text" name="Matricula" class="form-control" required>
            </div>
            <button type="submit" class="success">Guardar</button><br>
           <br> <button class="danger" href="{{ route('bebidas_inevetario.index') }}">Cancelar</button>
        </form>
            
        
    </div>
@endsection
