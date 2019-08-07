<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$idee    = $_POST["idee"];
	$cantidad    = $_POST["cantidad"];
	$cantidadSurtida   = $_POST["cantidadSurtida"];
	$id_medicamento   = $_POST["id_medicamento"];

	$cantidad    = trim($cantidad);
	$cantidadSurtida   = trim($cantidadSurtida);
	$id_medicamento   = trim($id_medicamento);

	$fecha=date("Y-m-d"); 

	$hora=date ("H:i:s");
	mysql_query("SET NAMES utf8");

	
	$consulta1=mysql_query("SELECT
								id_medicamento,
								cantidad

							FROM
								inventario
								WHERE id_medicamento='$id_medicamento'",$conexion) or die (mysql_error());
	$row=mysql_fetch_row($consulta1);
	$idMedInven   = $row[0];
	$cantidadInven   = $row[1];

	if ($cantidadSurtida <= $cantidadInven)
	{


$consulta=mysql_query("SELECT
                        cantidad_pedido
                        FROM
                        detalle_surtido
                        WHERE id_detalle_pedido='$idee'",$conexion) or die (mysql_error());
$row=mysql_fetch_row($consulta);

    $cantidadPedido  = $row[0];


    $consulta1=mysql_query("SELECT
                        cantidad_entrante
                        FROM
                        detalle_surtido
                        WHERE id_detalle_pedido='$idee'",$conexion) or die (mysql_error());
$row=mysql_fetch_row($consulta1);

    $cantidadEntrante  = $row[0];

$cantidadEntarnteTotal = $cantidadEntrante + $cantidadSurtida;



$diferencia = $cantidad - $cantidadEntarnteTotal;

if ($cantidadEntarnteTotal <= $cantidadPedido) {




	//consulta Para Traer Los datos del inventario
	$consulta1=mysql_query("SELECT
								id_medicamento,
								cantidad

							FROM
								inventario
								WHERE id_medicamento='$id_medicamento'",$conexion) or die (mysql_error());
	$row=mysql_fetch_row($consulta1);
	$idMedInven   = $row[0];
	$cantidadInven   = $row[1];


	//validacion de datos de inventario para actualizar con un if 
	 	if ($idMedInven == $id_medicamento) {


	 		//resta de cantidades para actualizar 
	 		$cantidadAlInventario = $cantidadInven - $cantidadSurtida;
	 		
	 			$actualiza1 = mysql_query("UPDATE inventario SET
								cantidad='$cantidadAlInventario'
							WHERE id_medicamento='$id_medicamento'",$conexion)or die(mysql_error());

	 	}else{
	 		//se inserta si no ahy id que consida
		$insertar1 = mysql_query("INSERT INTO inventario
									(
									id_medicamento,
									cantidad,
									fecha_registro,
									hora_registro,
									id_registro
									)
								VALUES
									(
									'$id_medicamento',
									'$cantidadSurtida', 
									'$fecha',
									'$hora',
									'$id_usuario'
									)
								",$conexion)or die(mysql_error());

	 	}



	$insertar = mysql_query("UPDATE detalle_surtido	
								SET

									id_medicamento ='$id_medicamento',
									cantidad_entrante = '$cantidadEntarnteTotal',
									diferencia = '$diferencia'

								where id_detalle_pedido = '$idee' ",$conexion)or die(mysql_error());
		echo "ok";

}else{
	echo "error";
}


}

		


?>