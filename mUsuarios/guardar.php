<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$idPersona = $_POST["idPersona"];
	$usuario   = $_POST["usuario"];
	$contra    = $_POST["contra"];

	$idPersona = trim($idPersona);
	$usuario   = trim($usuario);
	$contra    = trim($contra);
	$contra    = md5($contra);

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");
	$cadena_verificar = mysql_query("SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'",$conexion);
	$existe = mysql_num_rows($cadena_verificar);
	if($existe == 0){
		$insertar = mysql_query("INSERT INTO usuarios 
									(
									usuario,
									contra,
									id_persona,
									id_registro,
									fecha_registro,
									hora_registro,
									activo,
									pvez
									)
								VALUES
									(
									'$usuario',
									'$contra',
									'$idPersona',
									'$id_usuario',
									'$fecha',
									'$hora',
									'1',
									'1'
									)",$conexion)or die(mysql_error());
		echo "ok";
	}else{
		echo "duplicado";
	}
?>