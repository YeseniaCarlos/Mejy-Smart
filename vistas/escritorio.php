<?php
include '../config/Conexion.php';
ob_start();
session_start();
$sql = "SELECT * FROM usuario WHERE idusuario = {$_SESSION['idusuario']}";
$resultado = $conexion->query($sql);
$admin = $resultado->fetch_assoc();

if ($admin['verificar_clave'] == 'si') {
  //Activamos el almacenamiento en el buffer


  if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
  } else {
    require 'header.php';

    if ($_SESSION['escritorio'] == 1) {
      require_once "../modelos/Consultas.php";
      $consulta = new Consultas();
      $rsptac = $consulta->totalcomprahoy();
      $regc = $rsptac->fetch_object();
      $totalc = $regc->total_compra;

      $rsptav = $consulta->totalventahoy();
      $regv = $rsptav->fetch_object();
      $totalv = $regv->total_venta;

      //Datos para mostrar el gráfico de barras de las compras
      $compras10 = $consulta->comprasultimos_10dias();
      $fechasc = '';
      $totalesc = '';
      while ($regfechac = $compras10->fetch_object()) {
        $fechasc = $fechasc . '"' . $regfechac->fecha . '",';
        $totalesc = $totalesc . $regfechac->total . ',';
      }

      //Quitamos la última coma
      $fechasc = substr($fechasc, 0, -1);
      $totalesc = substr($totalesc, 0, -1);

      //Datos para mostrar el gráfico de barras de las ventas
      $ventas12 = $consulta->ventasultimos_12meses();
      $fechasv = '';
      $totalesv = '';
      while ($regfechav = $ventas12->fetch_object()) {
        $fechasv = $fechasv . '"' . $regfechav->fecha . '",';
        $totalesv = $totalesv . $regfechav->total . ',';
      }

      //Quitamos la última coma
      $fechasv = substr($fechasv, 0, -1);
      $totalesv = substr($totalesv, 0, -1);



?>
      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h1 class="box-title colorletra text1">Escritorio </h1>
                  <div class="box-tools pull-right">
                  </div>
                </div>
                <!-- /.box-header -->
                <!-- centro -->
                <div class="panel-body">
                </div>
                <div class="panel-body">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="box box-primary">
                      <div class="box-header with-border colorletra text1">
                        Compras de los últimos 10 días
                      </div>
                      <div class="box-body">
                        <canvas id="compras" width="400" height="300"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="box box-primary">
                      <div class="box-header with-border colorletra text1">
                        Prestamos de los últimos 12 meses
                      </div>
                      <div class="box-body">
                        <canvas id="ventas" width="400" height="300"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Fin centro -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
    <?php
    } else {
      require 'noacceso.php';
    }

    require 'footer.php';
    ?>

    <script src="../public/js/chart.min.js"></script>
    <script src="../public/js/Chart.bundle.min.js"></script>
    <script type="text/javascript">
      var ctx = document.getElementById("compras").getContext('2d');
      var compras = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [<?php echo $fechasc; ?>],
          datasets: [{
            label: 'Compras en S/ de los últimos 10 días',
            data: [<?php echo $totalesc; ?>],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                color: 'black'
              }
            }]
          }
        }
      });

      var ctx = document.getElementById("ventas").getContext('2d');
      var ventas = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [<?php echo $fechasv; ?>],
          datasets: [{
            label: 'Prestamos en S/ de los últimos 12 Meses',
            data: [<?php echo $totalesv; ?>],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                color: 'black'
              }
            }]
          }
        }
      });
    </script>


    </script>


  <?php
  }
  ob_end_flush();
} else {
  ?>
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../public/css/blue.css">
  <script src="../public/js/jquery-3.6.0.js"></script>
  <script>
    $(document).ready(function() {
      $('#formcambiarcontrasena').submit(function(e) {
        e.preventDefault();
        document.getElementById("mensajecambiarcontrasena").innerHTML = "";
        var Btncontrasenacambiar = $("#Btncontrasenacambiar");
        $.ajax({
          data: $('#formcambiarcontrasena').serialize(),
          url: 'cambiarcontra.php',
          type: 'post',

          beforeSend: function() {
            $("#Btncontrasenacambiar").text(" Procesando los datos...");
          },
          complete: function(data) {
            var resp = data.responseText;
            // Btncontrasenacambiar.addClass("bi bi-box-arrow-in-right");
            Btncontrasenacambiar.text("Cambiar contraseña");
          },
          success: function(respuesta) {
            document.getElementById('resultadocambiarcontrasena').style.display = 'block';
            document.getElementById('Btncontrasenacambiar').style.display = 'none';
            $('#mensajecambiarcontrasena').html(respuesta);
          },
        });
      });
    });
  </script>
  <script>
  function mostrarContrasena() {
      var x = document.getElementById("clave");
      if (x.type === "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
  }

  </script>
  <div class="login-box">
    <div class="login-box-body" style="border-radius: 30px;">
      <div class="login-logo">
        <div class="btn-group">
          <a class="dropdown-toggle-split" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
            <a onclick="cambiarColor()" id="colorButton" style="cursor: pointer;"><i class="bi bi-brightness-high-fill"></i></a>
          </a>
        </div>
        <a href="login.html" style="color: #444444;" class="text1"><b>MEJY</b></a>
        <div> <img src="../files/usuarios/logo.png" alt="" width="150" height="150"></div>
      </div><!-- /.login-logo -->
      <p class="login-box-msg text1" style="color: #444444;">Actualiza tu contraseña</p>
      <form id="formcambiarcontrasena">
        <div class="form-group has-feedback" style="margin-top: 1rem;">
          <label class="text1" for="contraseña">Ingresa nueva contraseña</label>
          <input type="password" id="clave" name="clave" class="form-control" required placeholder="Password" pattern="^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s])\S{12,}$" title="Contraseña Incompleta haz coincidir el Formato Ejemplo: SistemaInv9$ con 12 caracteres" maxlength="12">
          <input type="checkbox" onclick="mostrarContrasena()"> Mostrar Contraseña<br><br>
          <label>Utiliza Mayuscula, Minuscula , Numero y Caracter Especial</label>
          <input type="hidden" id="idusuario" name="idusuario" class="form-control" value="<?php echo $_SESSION['idusuario'] ?>">
          <span class="fa fa-key form-control-feedback" style="font-size: 20px;"></span>
        </div>
        <center>
          <button type="submit" class="btn btn-primary" id="Btncontrasenacambiar" style="border-radius: 30px;">Cambiar contraseña</button><br>
          <a style="margin-top: 1rem;" href="login.html" class="btn btn-danger">Cerrar Sesión</a>

        </center>
        <!-- ALERTA -->
        <div id="resultadocambiarcontrasena" style="display:none; margin-top:2rem;">
          <div id="mensajecambiarcontrasena"></div>
        </div>
      </form>


    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- Bootstrap 3.3.5 -->
  <script src="../public/js/bootstrap.min.js"></script>
  <!-- Bootbox -->
  <script src="../public/js/bootbox.min.js"></script>

  <script type="text/javascript" src="scripts/login.js"></script>
  <!-- <script src="../public/js/bootstrap.bundle.min.js"></script> -->
  <script src="../public/js/script.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/modooscuro.js"></script>

<?php
}
?>