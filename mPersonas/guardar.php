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
	$id_sede   = $_POST["id_sede"];

	$nombre    = trim($nombre);
	$paterno   = trim($paterno);
	$materno   = trim($materno);
	$direccion = trim($direccion);
	$fecha_nac = trim($fecha_nac);
	$telefono  = trim($telefono);
	$correo    = trim($correo);
	$tipo      = trim($tipo);
	$sexo      = trim($sexo);
	$id_sede   = trim($id_sede);

	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");

	$cadena_verificar = mysql_query("SELECT id_persona FROM personas
	WHERE nombre = '$nombre' AND ap_paterno = '$paterno' AND ap_materno = '$materno'",$conexion);
	$existe = mysql_num_rows($cadena_verificar);
	if($existe == 0){
		$insertar = mysql_query("INSERT INTO personas 
									(
									nombre,
									ap_paterno,
									ap_materno,
									sexo,
									direccion,
									telefono,
									fecha_nacimiento,
									correo,
									tipo_persona,
									id_registro,
									fecha_registro,
									hora_registro,
									activo,
									id_sede
									)
								VALUES
									(
									'$nombre',
									'$paterno',
									'$materno',
									'$sexo',
									'$direccion',
									'$telefono',
									'$fecha_nac',
									'$correo',
									'$tipo',
									'$id_usuario',
									'$fecha',
									'$hora',
									'1',
									'$id_sede'
									)
								",$conexion)or die(mysql_error());
		echo "ok";
	}else{
		echo "duplicado";
	}
?>