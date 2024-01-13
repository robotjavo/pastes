function continuarTransaccion() {
    var metodoPago = window.prompt("Método de pago: ¿Efectivo o Tarjeta?");

    if (metodoPago) {
        if (metodoPago.toLowerCase() === 'efectivo') {
            var pago = parseFloat(window.prompt("Ingrese el pago en efectivo:"));
            if (!isNaN(pago)) {
                if (pago >= totalPagar) {
                    // Realiza la petición AJAX al controlador para guardar la venta
                    $.ajax({
                        type: 'POST',
                        url: ventaStoreUrl, // Utilizando la variable definida en la vista de Blade
                        data: {
                            '_token': csrfToken, // Utilizando la variable definida en la vista de Blade
                            'platillo_id': $("#sabor_paste").val(),
                            'bebidas_inventarios_id': $("#sabor_bebida").val(),
                            'totalPagar': totalPagar,
                            'pago': pago,
                            'cambio': pago - totalPagar,
                        },
                        success: function(data) {
                            // Handle the success response, if needed
                            alert("Transacción completada. Cambio: $" + (pago - totalPagar).toFixed(2));
                        },
                        error: function(error) {
                            // Handle the error response, if needed
                            alert("Error al guardar la venta.");
                        }
                    });
                } else {
                    alert("Pago insuficiente. La transacción no se ha completado.");
                }
            } else {
                alert("Ingrese un valor válido para el pago.");
            }
        } else if (metodoPago.toLowerCase() === 'tarjeta') {
            alert("Transacción completada con tarjeta.");
            // Puedes agregar lógica adicional aquí si es necesario
        } else {
            alert("Método de pago no reconocido.");
        }
    } else {
        alert("Operación cancelada.");
    }
}
