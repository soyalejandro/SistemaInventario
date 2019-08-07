<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];
	
	$nomMed    = $_POST["nomMed"];
	$codigo   = $_POST["codigo"];
	$tipo   = $_POST["tipo"];
	$aplicacion   = $_POST["aplicacion"];
	$ide       = $_POST["ide"];

	$nomMed    = trim($nomMed);
	$codigo   = trim($codigo);
	$tipo   = trim($tipo);
	$aplicacion   = trim($aplicacion);
	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");

		$insertar = mysql_query("UPDATE medicamentos SET
								nombre_medicamento='$nomMed',
								codigo='$codigo',
								tipo_medicamento='$tipo',
								via_administracion='$aplicacion',
								fecha_registro='$fecha',
								hora_registro='$hora',
								id_registro='$id_usuario'
							WHERE id_medicamento='$ide'",$conexion)or die(mysql_error());
		echo "ok";
?>