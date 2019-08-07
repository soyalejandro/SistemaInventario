<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$nomMed    = $_POST["nomMed"];
	$codigo   = $_POST["codigo"];
	$tipo   = $_POST["tipo"];
	$aplicacion   = $_POST["aplicacion"];

	$nomMed    = trim($nomMed);
	$codigo   = trim($codigo);
	$tipo   = trim($tipo);
	$aplicacion   = trim($aplicacion);

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");

	$cadena_verificar = mysql_query("SELECT id_medicamento FROM medicamentos
	WHERE codigo = '$codigo'",$conexion);
	$existe = mysql_num_rows($cadena_verificar);
	if($existe == 0){
		$insertar = mysql_query("INSERT INTO medicamentos 
									(
									nombre_medicamento,
									codigo,
									tipo_medicamento,
									via_administracion,
									id_registro,
									fecha_registro,
									hora_registro,
									activo
									)
								VALUES
									(
									'$nomMed',
									'$codigo',
									'$tipo',
									'$aplicacion',
									'$id_usuario',
									'$fecha',
									'$hora',
									'1'
									)
								",$conexion)or die(mysql_error());
		echo "ok";
	}else{
		echo "duplicado";
	}
?>