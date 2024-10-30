<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
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
                          <h1 class="box-title colorletra">Creditos</h1>
	                        <div class="box-tools pull-right">
	                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body">
                    	<h4 class="text1">Manual: </h4> <p class="text1"> El manual de ayuda viene adjunto en la carpeta Ayuda del paquete del proyecto.</p>
		                <h4 class="text1">Desarrollado por: </h4> <p class="text1">Equipo MEJY Smart Inventory Modulo I </p>
		                <h4 class="text1">Integrantes Del Modulo I </h4> <p class="text1">Lizbeth Ambrosio Gopar <br> Yesenia Carlos Perez <br> Vania Johana Licona Santiago</p> 

                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<?php 
}
ob_end_flush();
?>