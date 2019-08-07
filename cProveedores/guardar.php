<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$nomProv    = $_POST["nomProv"];
	$nomAge   = $_POST["nomAge"];
	$direccion = $_POST["direccion"];
	$telefono  = $_POST["telefono"];
	$correo    = $_POST["correo"];

	$nomProv    = trim($nomProv);
	$nomAge   = trim($nomAge);
	$direccion = trim($direccion);
	$telefono  = trim($telefono);
	$correo    = trim($correo);


	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");

	$cadena_verificar = mysql_query("SELECT id_proveedor FROM proveedor
	WHERE nombre_proveedor = '$nomProv'",$conexion);
	$existe = mysql_num_rows($cadena_verificar);
	if($existe == 0){
		$insertar = mysql_query("INSERT INTO proveedor 
									(
									nombre_proveedor,
									nombre_agencia,
									telefono,
									correo,
									direccion,
									id_registro,
									fecha_registro,
									hora_registro,
									activo
									)
								VALUES
									(
									'$nomProv',
									'$nomAge',
									'$telefono',
									'$correo',
									'$direccion',
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