@extends('layouts.app')
@section('title', 'venta')

@section('content')
<h1 id="title_n">VENTAS</h1>
<h2 id="title" >El sabor de los pastes tradicionales llega a ti</h2>
    <div class="galeria">
        <div class="foto">
            <img src="img/paste.png" alt="shit">
        </div>

        <div>
             @foreach( (array) $contadorpastes as $contadorpastes2)

            <p>{{$contadorpastes2}}</p>
            <input type="text" id="c1">
            <input type="text" id="c2">

            @endforeach
            <button onclick="prueva_carrito()" type="submit">prueba</button>
            <!--<button class="bg-gray-500 hover-bg-gray-700 text-white font-bold py-2 px-4 rounded">Editar</button>-->
            <script>
                var carrito=0;
                function prueva_carrito(){
                    var contador= {{$contadorpastes2}}; 
                    carrito=carrito+1; 

                    contador=contador-carrito;

                    document.getElementById('c1').value=contador;
                    document.getElementById('c2').value=carrito;

                }
            </script>

        </div>

        <div>
            <p>PASTES</p>
            <p>$22</p>
           

        </div>
        <div>
            
                <label for="favoriteOnly">Sabor:</label>
                <select name="favoriteOnly" id="favoriteOnly">
                    <option>Papa con carne</option>
                    <option>Frijol con Chorizo</option>
                    <option>Crema de Pollo</option>
                </select>
            
        </div>
    </div>
    <div class="galeria">
        <div class="foto">
            <img src="" alt="que">
        </div>
        <div>
            <p>EMPANADAS</p>
            <p>$22</p>
        </div>
        <div>
                <label for="favoriteOnly">Sabor:</label>
                <select name="favoriteOnly" id="favoriteOnly">
                    <option>Mole Rojo</option>
                    <option>Mole Verde</option>
                    <option>Tinga</option>
                    <option> Minero</option>
                    <option>Picadillo</option>
                </select>
        </div>
    </div>
    <div class="galeria">
        <div class="foto">
            <img src="" alt="lol">
        </div>
        <div>
            <p>ESPECIALES</p>
            <p>$22</p>
        </div>
            <div>
                <label for="favoriteOnly">Sabor:</label>
                <select name="favoriteOnly" id="favoriteOnly">
                    <option>Salchicha con Queso</option>
                    <option>Jamon con Queso</option>
                    <option>ChoriQueso</option>
                    <option>Rajas con Queso</option>
                </select>
            </div>
    </div>
    <div class="galeria">
        <div class="foto">
            <img src="" alt="mierda">
        </div>
        <div>
            <p>DULCES</p>
            <p>$22</p>
        </div>
        <div>
                <label for="favoriteOnly">Sabor:</label>
                <select name="favoriteOnly" id="favoriteOnly">
                    <option>Arroz con Leche</option>
                    <option>Piña</option>
                    <option>Manzana</option>
                    <option>Zarzamora</option>
                    <option>Cajeta</option>
                    <option>Fresa</option>
                    <option>Budin</option>
                </select>
        </div>
    </div>
    <div class="galeria">
        <div class="foto">
            <img src="" alt="joder">
        </div>
        <div>
            <p>Aguas</p>
            <p>$22</p>
        </div>
        <div>
                <label for="favoriteOnly">Tamaño:</label>
                <select name="favoriteOnly" id="favoriteOnly">
                            <option>CH</option>
                            <option>1LT</option>
                            <option>1.5LT</option>
                </select>
        </div>
    </div>
    <div class="galeria">
        <div class="foto">
            <img src="" alt="joder">
        </div>
        <div>
            <p>Refrescos</p>
            <p>$22</p>
        </div>
        <div>
                <label for="favoriteOnly">Sabor:</label>
                <select name="favoriteOnly" id="favoriteOnly">

                            <option>Coca Cola</option>
                            <option>Sidral Mundet</option>
                            <option>Sprite</option>
                            <option>Delaware Punch</option>
                            <option>Fanta</option>
                            <option>Fresca</option>
                            <option>Naranjada</option>
                            <option>Limonada</option>
                            <option>Generosa</option>
                            <option>Valle Fruit</option>
                </select>
        </div>
    </div>
    <div class="galeria">
        <div class="foto">
            <img src="" alt="ya que">
        </div>
        <div>
            <p>EXTRAS</p>
            <p>$22</p>
        </div>
        <div>
                <label for="favoriteOnly">Tipo:</label>
                <select name="favoriteOnly" id="favoriteOnly">

                            <option>Bolsa</option>
                            <option>Caja</option>
                </select>
        </div>
    </div>
</div>
@endsection
