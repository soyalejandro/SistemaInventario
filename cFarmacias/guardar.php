<?php
//se manda llamar la conexion.
include("../conexion/conexion.php");

$nsucursal    = $_POST["nsucursal"];
$encargado= $_POST["encargado"];
$ubicacion  = $_POST["ubicacion"];


$nsucursal    =trim($nsucursal);
$encargado   =trim($encargado);
$ubicacion    =trim($ubicacion);


$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");


$cadena_verificar = mysql_query("SELECT id_farmacia FROM farmacias
	WHERE numero_farmacia = '$nsucursal'",$conexion);
	$existe = mysql_num_rows($cadena_verificar);

	
if($existe == 0){
	$insertar = mysql_query("INSERT INTO farmacias 
 								(
 								nombre_farmacia,
 								numero_farmacia,
 								ubicacion,
								encargado,
 								id_registro,
 								fecha_registro,
 								hora_registro,
 								activo
 								)
							VALUES
								(
								'Farmacia',
 								'$nsucursal',
								'$ubicacion',
 								'$encargado',
 								'1',
 								'$fecha',
 								'$hora',
 								'1'
								)
							",$conexion)or die(mysql_error());

echo "ok";
}else{
	echo "error";
}
 

?>