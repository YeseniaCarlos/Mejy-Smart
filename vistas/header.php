<?php


include '../config/Conexion.php';

if (strlen(session_id()) < 1)
  session_start();

$sql = "SELECT * FROM usuario WHERE idusuario = {$_SESSION['idusuario']}";
$resultado = $conexion->query($sql);
$admin = $resultado->fetch_assoc();

if ($admin['verificar_clave'] == 'si') {
?>
  <?php //echo $_SESSION['idusuario']; 
  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> MEJY | Inventario CAEV</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <style>
      /* Borrar los márgenes y el relleno por defecto del cuerpo */
      body {
        margin: 0;
        padding: 0;
      }

      /* Estilo básico para el botón del menú desplegable */
      .dropbtn {
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
      }

      /* Estilo para la posición del contenedor del menú desplegable */
      .dropdown {
        position: relative;
        display: inline-block;
      }

      /* Estilo para el contenido del menú desplegable (inicialmente oculto) */
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 190px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        white-space: nowrap;
        /* Evita que los elementos se dividan en varias líneas */

        /* Ajustes para posicionar a la izquierda */
        right: auto;
      }


      /* Estilo para los enlaces dentro del menú desplegable */
      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: inline-block;
        /* Muestra los elementos en línea */
        margin-right: 10px;
        /* Ajusta el espacio entre los elementos según sea necesario */
      }

      /* Cambiar el color del enlace al pasar el ratón sobre él */
      .dropdown-content a:hover {
        background-color: #3498db;
        color: white;
      }

      /* Mostrar el contenido del menú desplegable al pasar el ratón sobre el botón */
      .dropdown:hover .dropdown-content {
        display: block;
      }
    </style>

  </head>

  <body>
    <div class="wrapper">


      <header class="main-header">

        <!-- Logo -->
        <a href="escritorio.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <div> <img src="../files/LOGO-ICONOS/CAEV-BLANCO.png" alt="" width="90" height="50"></div>
          <!-- logo for regular state and mobile devices -->
        </a>





        <!-- <head>
        <link rel="stylesheet" href="css/font-awesome.min.css">
      </head>-->
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top colorbody" role="navigation">
          <!-- Sidebar toggle button-->

          <div class="btn-group">
            <li class="dropdown btn btn-danger" style="color: white; margin-top:0.5rem;">
              <div id="contador-inactividad"></div>
            </li>

          </div>
          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li>
                <!-- Navbar Right Menu -->
                <div class="dropdown">
                  <a class="dropbtn" id="dropbtn">
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill: white;" width="40" height="40" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                      <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg>
                  </a>
                  <div class="dropdown-content box">
                    <a onclick="cambiarColor()" id="colorButton1" class="btn text1 colorletra" style="cursor: pointer;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="fill: black;" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                      </svg>
                    </a>
                    <a id="zoomInButton" class="btn colorletra text1" onclick="zoomText(true)">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-zoom-in" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z" />
                        <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z" />
                      </svg>
                    </a>
                    <a id="zoomOutButton" class="btn colorletra text1" onclick="zoomText(false)">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-zoom-out" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z" />
                        <path fill-rule="evenodd" d="M3 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                      </svg>
                    </a>
                  </div>
                </div>
              </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs colorletra text1"><?php echo $_SESSION['nombre']; ?></span>
                </a>

                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                    <p class="colorletra text1">
                      www.caev.com - MEYI
                      <small>www.meyi.com</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">

                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="header"></li>
            <?php
            if ($_SESSION['escritorio'] == 1) {
              echo '<li id="mEscritorio">
              <a class="colorletra text1" href="escritorio.php">
                <i class="fa fa-tasks"></i> <span>Escritorio</span>
              </a>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['almacen'] == 1) {
              echo '<li id="mAlmacen" class="treeview">
              <a class="colorletra text1" href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lArticulos"><a class="colorletra text1" href="articulo.php"><i class="fa fa"></i> Artículos</a></li>
                <li id="lCategorias"><a class="colorletra text1" href="categoria.php"><i class="fa fa"></i> Categorías</a></li>
              </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['compras'] == 1) {
              echo '<li id="mCompras" class="treeview">
              <a class="colorletra text1" href="#">
                <i class="fa fa-th"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lIngresos"><a class="colorletra text1" href="ingreso.php"><i class="fa fa"></i> Ingresos</a></li>
                <li id="lProveedores"><a class="colorletra text1" href="proveedor.php"><i class="fa fa"></i> Proveedores</a></li>
                <li id="lConsulasC"><a class="colorletra text1" href="comprasfecha.php"><i class="fa fa"></i> Consulta Compras</a></li>                
              </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['ventas'] == 1) {
              echo '<li id="mVentas" class="treeview">
              <a class="colorletra text1" href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Prestamos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lVentas"><a class="colorletra text1" href="venta.php"><i class="fa fa"></i> Prestamos</a></li>
                <li id="lClientes"><a class="colorletra text1" href="cliente.php"><i class="fa fa"></i> Clientes</a></li>
                <li id="lConsulasV"><a class="colorletra text1" href="ventasfechacliente.php"><i class="fa fa"></i> Consulta Prestamos</a></li>                
              </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['acceso'] == 1) {
              echo '<li id="mAcceso" class="treeview">
              <a class="colorletra text1" href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lUsuarios"><a class="colorletra text1" href="usuario.php"><i class="fa fa"></i> Usuarios</a></li>
                <li id="lPermisos"><a class="colorletra text1" href="permiso.php"><i class="fa fa"></i> Permisos</a></li>
                
              </ul>
            </li>';
            }
            ?>

            <li>
              <a class="colorletra text1" href="ayuda.php">
                <i class="fa fa-plus-square"></i> <span>Creditos</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a class="colorletra text1" href="acerca.php">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

    <?php } ?>