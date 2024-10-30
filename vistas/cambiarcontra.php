<?php

    include '../config/Conexion.php';
    

    sleep(1);
    
    $clave = $_POST['clave'];
    $idusuario = $_POST['idusuario'];

    $clavehash=hash("SHA256",$clave);

    $actualizcontrasena = mysqli_query($conexion, "UPDATE usuario SET
    clave = '$clavehash',
    verificar_clave = 'si'
    WHERE idusuario = '$idusuario'");
    if ($actualizcontrasena) {
        echo '<div class="alert alert-success" role="alert">Contraseña actualizada con exito</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al actualizada la Contraseña</div>';
    }

?>