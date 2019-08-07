<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$id_proveedor = $_POST["id_proveedor"];

	$id_proveedor = trim($id_proveedor);

	$fecha=date("Y-m-d"); 

	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");

if ($id_proveedor>0) {
	$insertar = mysql_query("INSERT INTO pedidos_proveedores 
									(
									id_proveedor,
									fecha_registro,
									hora_registro,
									id_registro,
									activo,
									status
									)
								VALUES
									(
									'$id_proveedor',
									'$fecha',
									'$hora',
									'$id_usuario',			
									'1',
									'En proceso')",$conexion)or die(mysql_error());
		echo "ok";
}
	
?>