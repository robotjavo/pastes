var intervalo;
var tiempoRestante;

function actualizarTiempo() {
    console.log('Función actualizarTiempo llamada');

    var tiempoMinutos = document.getElementById('tiempoOcultar').value;
    console.log('Tiempo en minutos:', tiempoMinutos);

    var tiempoSegundos = tiempoMinutos * 60;

    // Recuperar el tiempo restante del localStorage si existe
    tiempoRestante = tiempoRestante || tiempoSegundos;

    intervalo = setInterval(function() {
        var minutos = Math.floor(tiempoRestante / 60);
        var segundos = tiempoRestante % 60;

        document.getElementById('tiempoRestante').innerText = minutos + 'm ' + segundos + 's';

        if (tiempoRestante <= 0) {
            clearInterval(intervalo);
            // Aquí puedes ejecutar alguna acción después de que el tiempo expire
        }

        tiempoRestante--;
    }, 1000);

    // Manejar el cambio de visibilidad de la página
    document.addEventListener('visibilitychange', function() {
        if (document.visibilityState === 'hidden') {
            // Almacenar el tiempo restante en localStorage cuando la página esté inactiva
            localStorage.setItem('tiempoRestante', tiempoRestante);
            clearInterval(intervalo);
        } else {
            // Reanudar el temporizador cuando la página vuelva a estar activa
            intervalo = setInterval(actualizarTiempo, 1000);
        }
    });
}

function detenerTiempo() {
    clearInterval(intervalo);
    console.log('Temporizador detenido');
}

document.addEventListener('DOMContentLoaded', function () {
    // Cargar el tiempo restante almacenado en localStorage
    tiempoRestante = parseInt(localStorage.getItem('tiempoRestante')) || 0;

    // Si hay tiempo restante, iniciar el temporizador
    if (tiempoRestante > 0) {
        actualizarTiempo();
    }
});
