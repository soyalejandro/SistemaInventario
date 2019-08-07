<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$nomProv    = $_POST["nomProv"];
	$nomAge   = $_POST["nomAge"];
	$telefono  = $_POST["telefono"];
	$correo    = $_POST["correo"];
	$direccion = $_POST["direccion"];
	$ide       = $_POST["ide"];

	$nomProv    = trim($nomProv);
	$nomAge   = trim($nomAge);
	$telefono  = trim($telefono);
	$correo    = trim($correo);
	$direccion = trim($direccion);
	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");
	// $cadena_verificar = mysql_query("SELECT id_proveedor FROM proveedor
	// WHERE nombre_proveedor = '$nomProv'",$conexion);
	// $existe = mysql_num_rows($cadena_verificar);

	// if($existe == "1"){
		$insertar = mysql_query("UPDATE proveedor SET
								nombre_proveedor='$nomProv',
								nombre_agencia='$nomAge',
								telefono='$telefono',
								correo='$correo',
								direccion='$direccion',
								fecha_registro='$fecha',
								hora_registro='$hora',
								id_registro='$id_usuario'
							WHERE id_proveedor='$ide'",$conexion)or die(mysql_error());
		echo "ok";
	// }else{
	// 	echo "duplicado";
	// }
?>