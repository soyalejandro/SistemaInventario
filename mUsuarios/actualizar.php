<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$usuario = $_POST["usuario"];
	$ide     = $_POST["ide"];

	$usuario = trim($usuario);
	// $contra  = trim($contra);

	$fecha   = date("Y-m-d"); 
	$hora    = date ("H: i: s");
 
	mysql_query("SET NAMES utf8");
	$cadena_verificar = mysql_query("SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'",$conexion);
	$existe = mysql_num_rows($cadena_verificar);
	if($existe == 0){
		$insertar = mysql_query("UPDATE usuarios SET
								usuario='$usuario',
								fecha_registro='$fecha',
								hora_registro='$hora',
								id_registro='$id_usuario'
							WHERE id_usuario='$ide'",$conexion)or die(mysql_error());
		echo "ok";
	}else{
		echo "duplicado";
	}
?>