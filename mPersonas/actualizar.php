<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$nombre    = $_POST["nombre"];
	$paterno   = $_POST["paterno"];
	$materno   = $_POST["materno"];
	$direccion = $_POST["direccion"];
	$fecha_nac = $_POST["fecha_nac"];
	$telefono  = $_POST["telefono"];
	$correo    = $_POST["correo"];
	$tipo      = $_POST["tipo"];
	$sexo      = $_POST["sexo"];
	$ide       = $_POST["ide"];
	$id_sede   = $_POST["id_sede"];

	$nombre    = trim($nombre);
	$paterno   = trim($paterno);
	$materno   = trim($materno);
	$direccion = trim($direccion);
	$telefono  = trim($telefono);
	$correo    = trim($correo);
	$tipo      = trim($tipo);
	$sexo      = trim($sexo);
	$id_sede   = trim($id_sede);

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");
	$cadena_verificar = mysql_query("SELECT id_persona FROM personas
	WHERE nombre = '$nombre' AND ap_paterno = '$paterno' AND ap_materno = '$materno' AND id_persona != '$ide'",$conexion);
	$existe = mysql_num_rows($cadena_verificar);

	if($existe == "0"){
		$insertar = mysql_query("UPDATE personas SET
								nombre='$nombre',
								ap_paterno='$paterno',
								ap_materno='$materno',
								sexo='$sexo',
								direccion='$direccion',
								telefono='$telefono',
								fecha_nacimiento='$fecha_nac',
								correo='$correo',
								tipo_persona='$tipo',
								id_sede = '$id_sede',
								fecha_registro='$fecha',
								hora_registro='$hora',
								id_registro='$id_usuario'
							WHERE id_persona='$ide'",$conexion)or die(mysql_error());
		echo "ok";
	}else{
		echo "duplicado";
	}
?>