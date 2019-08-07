<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$id_farmacia = $_POST["id_farmacia"];

	$id_farmacia = trim($id_farmacia);

	$fecha=date("Y-m-d"); 

	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");

if ($id_farmacia>0) {
	$insertar = mysql_query("INSERT INTO pedidos_farmacias
									(
									id_farmacia,
									fecha_registro,
									hora_registro,
									id_registro,
									activo,
									status
									)
								VALUES
									(
									'$id_farmacia',
									'$fecha',
									'$hora',
									'$id_usuario',			
									'1',
									'En proceso')",$conexion)or die(mysql_error());
		echo "ok";
}
	
?>