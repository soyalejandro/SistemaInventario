<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];
	
	$cantidad   = $_POST["cantidad"];
	$id_medicamento   = $_POST["id_medicamento"];
	$ide       = $_POST["ide"];

	$id_medicamento    = trim($id_medicamento);
	$cantidad   = trim($cantidad);

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");


		if ($id_medicamento>0 & $cantidad >0) {

			$insertar = mysql_query("INSERT INTO detalle_surtido
											(
											id_pedido, 
											id_medicamento,
											cantidad_pedido,
											diferencia,
											fecha_registro,
											hora_registro,
											id_registro
											)
										VALUES
											(
											'$ide',
											'$id_medicamento',
											'$cantidad',
											'$cantidad',
											'$fecha',
											'$hora',
											'$id_usuario')",$conexion)or die(mysql_error());
				echo "ok";
		}
		else
		{
			echo "error";
		}


?>