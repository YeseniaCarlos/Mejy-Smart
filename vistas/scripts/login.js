// Variables globales para el conteo de intentos y el temporizador
var intentos = 0;
var espera = false;
var tiempoRestante = 30; // Tiempo de espera en segundos

$("#frmAcceso").on('submit',function(e) {
    e.preventDefault();
    
    // Si aún estamos en tiempo de espera, no hacemos nada
    if (espera) {
        bootbox.alert("Demasiados intentos (" + intentos + "). Por favor, espere unos segundos antes de intentarlo de nuevo. Tiempo restante: " + tiempoRestante + " segundos");
        return;
    }
    
    logina = $("#logina").val();
    clavea = $("#clavea").val();

    $.post("../ajax/usuario.php?op=verificar", {"logina": logina, "clavea": clavea}, function(data) {
        if (data != "null") {
            $(location).attr("href", "escritorio.php");            
        } else {
            intentos++; // Incrementamos el conteo de intentos fallidos
            bootbox.alert('<h5 style="color: black;">Usuario y/o Password incorrectos. Intentos: ' + intentos + '</h5>');
            
            // Si alcanzamos 5 intentos, activamos la espera
            if (intentos >= 2) {
                espera = true;
                bootbox.alert("Demasiados intentos (" + intentos + "). Por favor, espere unos segundos antes de intentarlo de nuevo. Tiempo restante: " + tiempoRestante + " segundos");
                
                // Iniciamos un temporizador para reestablecer los intentos después de 5 segundos
                var interval = setInterval(function() {
                    tiempoRestante--;
                    if (tiempoRestante <= 0) {
                        clearInterval(interval); // Detenemos el contador de tiempo
                        espera = false;
                        intentos = 0; // Reseteamos el contador de intentos
                        bootbox.alert("Puede intentarlo de nuevo.");
                    }
                }, 1000); // 1000 milisegundos = 1 segundo
            }
        }
    });
});
