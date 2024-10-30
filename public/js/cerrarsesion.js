  // Función para redireccionar a la página de cierre de sesión después de un minuto de inactividad
  function iniciarTemporizador() {
    var tiempoInactivo = 0;
    var tiempoMaximoInactivo = 60; // 300 segundos = 5 minuto
    var contadorElemento = document.getElementById('contador-inactividad');

    // Función para actualizar el contador mostrado al usuario
    function actualizarContador() {
      var segundosRestantes = tiempoMaximoInactivo - tiempoInactivo;
      
      if(segundosRestantes<=5){
        contadorElemento.textContent = 'Ultimos 5 segundos para cerrar sesión';

      }else{
        contadorElemento.textContent = 'Tiempo para cerrar Sesión: ' + segundosRestantes + ' segundos';
      }
    }

    // Reiniciar el temporizador cada vez que se detecte actividad del usuario
    document.addEventListener('mousemove', reiniciarTemporizador);

    function reiniciarTemporizador() {
      tiempoInactivo = 0;
      actualizarContador();
    }

    // Verificar el tiempo de inactividad cada segundo
    var temporizador = setInterval(function() {
      tiempoInactivo++;
      actualizarContador();
      if (tiempoInactivo >= tiempoMaximoInactivo) {
        // Si el usuario está inactivo por más de 1 minuto, redireccionar a la página de cierre de sesión
        clearInterval(temporizador);
        window.location.href = '../../sistemaInventario4/index.php';
      }
    }, 1000);
  }

  // Iniciar el temporizador cuando la página se cargue
  window.onload = iniciarTemporizador;