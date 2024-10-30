<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
if (!isset($_SESSION["nombre"]))
{
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}
else
{
//Validamos el acceso solo al usuario logueado y autorizado.
if ($_SESSION['almacen']==1)
{
require_once "../modelos/Categoria.php";

$categoria=new Categoria();

$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcategoria)){
			$rspta=$categoria->insertar($nombre,$descripcion);
			echo $rspta ? "<h5 style='color: black;'>Categoría registrada</h5>" : "<h5 style='color: black;'>Categoría no se pudo registrar</h5>";
		}
		else {
			$rspta=$categoria->editar($idcategoria,$nombre,$descripcion);
			echo $rspta ? "<h5 style='color: black;'>Categoría actualizada</h5>" : "<h5 style='color: black;'>Categoría no se pudo actualizar</h5>";
		}
	break;

	case 'desactivar':
		$rspta=$categoria->desactivar($idcategoria);
 		echo $rspta ? "<h5 style='color: black;'>Categoría Desactivada</h5>" : "<h5 style='color: black;'>Categoría no se puede desactivar</h5>";
	break;

	case 'activar':
		$rspta=$categoria->activar($idcategoria);
 		echo $rspta ? "<h5 style='color: black;'>Categoría activada</h5>" : "<h5 style='color: black;'>Categoría no se puede activar</h5>";
	break;

	case 'mostrar':
		$rspta=$categoria->mostrar($idcategoria);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$categoria->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" onclick="mostrar('.$reg->idcategoria.')"></i>'.
 					' <i class="fa fa-trash-o fa-2x" aria-hidden="true" onclick="desactivar('.$reg->idcategoria.')"></i>':
 					'<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" onclick="mostrar('.$reg->idcategoria.')"></i> '.
 					' <i class="fa fa-check fa-2x" onclick="activar('.$reg->idcategoria.')"></i>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->descripcion,
 				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
//Fin de las validaciones de acceso
}
else
{
  require 'noacceso.php';
}
}
ob_end_flush();
?>