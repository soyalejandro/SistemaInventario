<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$valor = $_POST["valor"];
	$id    = $_POST["id"]; 

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	$valor =($valor==1)?0:1;

	mysql_query("SET NAMES utf8");
	$insertar = mysql_query("UPDATE proveedor SET
								activo='$valor',
								fecha_registro='$fecha',
								hora_registro='$hora',
								id_registro='$id_usuario'
							WHERE id_proveedor='$id'",$conexion)or die(mysql_error());
?>