@extends('layouts.app')
@section('title', 'Venta')

@section('content')
    <h1 id="title_n">VENTAS</h1>
    <h2 id="title">El sabor de los pastes tradicionales llega a ti</h2>

    <!-- Información del producto -->
    <div class="galeria">
        <div class="foto">
            <img src="img/paste.png" alt="Pastes">
        </div>
        <div>
            <p>PASTES</p>
            <p>$22</p>
        </div>
        <div>
            <label for="sabor_paste">Sabor:</label>
            <select name="platillo_id" id="sabor_paste">
                @foreach($platillos as $platillo)
                    <option value="{{ $platillo->id }}">{{ $platillo->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="galeria">
        <div class="foto">
            <img src="img/bebida.png" alt="Bebidas">
        </div>
        <div>
            <p>BEBIDAS</p>
            <p>$22</p>
        </div>
        <div>
            <label for="sabor_bebida">Sabor:</label>
            <select name="bebidas_inventarios_id" id="sabor_bebida">
                @foreach($bebidas as $bebida)
                    <option value="{{ $bebida->id }}">{{ $bebida->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div>
        <label for="productos_inventarios_id">Producto:</label>
        <select name="productos_inventarios_id" id="producto_seleccionado">
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>
    </div>
<button type="button" onclick="agregarProductoAVenta('sabor_paste')">Agregar a la venta (PASTE)</button>
    <button type="button" onclick="agregarProductoAVenta('sabor_bebida')">Agregar a la venta (BEBIDA)</button>

    <!-- Sección para mostrar productos elegidos y total a pagar -->
    <div>
        <h2>Productos elegidos</h2>
        <ul id="listaProductosElegidos"></ul>

        <!-- Total a pagar -->
        <p>Total a pagar: $<span id="totalpagar">0</span></p>
    </div>

    <!-- Botón para continuar la transacción -->


    <!-- Script de JavaScript -->

    <button type="submit" onclick="abrirVentanaEmergente()">Realizar Pago</button>

    <!-- Campo oculto para el pago -->
    <input type="hidden" name="pago" id="pago" readonly>



    <!-- Script de JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    var totalpagar = 0;
    var productosElegidos = [];

    function agregarProductoAVenta(idSelect) {
        var productoSeleccionado = $("#" + idSelect + " option:selected").text();
        productosElegidos.push(productoSeleccionado);
        mostrarProductosElegidos();
        calcularYMostrarTotalPagar();
        $("#pago").val(totalpagar);
    }

    function mostrarProductosElegidos() {
        $("#listaProductosElegidos").empty();
        for (var i = 0; i < productosElegidos.length; i++) {
            $("#listaProductosElegidos").append("<li>" + productosElegidos[i] + "</li>");
        }
    }

    function calcularYMostrarTotalPagar() {
        var totalpagar = productosElegidos.length * 22;
        $("#totalpagar").text(totalpagar);
    }

    function abrirVentanaEmergente() {
        var metodoPago = prompt("Método de pago: ¿Efectivo o Tarjeta?");
        if (metodoPago) {
            if (metodoPago.toLowerCase() === 'efectivo') {
                var pago = parseFloat(prompt("Ingrese el pago en efectivo:"));
                if (!isNaN(pago)) {
                    $("#pago").val(pago);
                    mostrarVentanaEmergente();
                } else {
                    alert("Ingrese un valor válido para el pago.");
                }
            } else if (metodoPago.toLowerCase() === 'tarjeta') {
                // Puedes manejar el pago con tarjeta aquí si es necesario
            } else {
                alert("Método de pago no reconocido.");
            }
        } else {
            alert("Operación cancelada.");
        }
    }

   function mostrarVentanaEmergente() {
    var cambio = calcularCambio();
    Swal.fire({
        title: 'Transacción completada',
        text: 'Cambio: $' + cambio.toFixed(2),
        icon: 'success',
        confirmButtonText: 'Aceptar'
    });
}

function calcularCambio() {
    var pago = parseFloat($("#pago").val());
    var totalpagar = parseFloat($("#totalpagar").text());

    if (isNaN(pago) || isNaN(totalpagar)) {
        return 0;
    }

    return pago - totalpagar;
}
</script>
@endsection
