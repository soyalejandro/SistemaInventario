<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

include("../sesiones/verificar_sesion.php");
$id_persona =$_SESSION["idPersona"];
$id_usurio=$_SESSION["idUsuario"];

$nombre    = $_POST['nombre'];
$paterno   = $_POST['paterno'];
$materno   = $_POST['materno'];
$direccion = $_POST['direccion'];
$telefono  = $_POST['telefono'];
$correo    = $_POST['correo'];
$sexo      = $_POST['sexo'];
$fecha_nac = $_POST['fecha_nac'];
$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");
// echo "$nombre
// $paterno
// $materno
// $direccion
// $telefono
// $correo
// $sexo
// $fecha_nac
// $fecha
// $hora
// $id_persona
// $id_usurio";
mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE personas SET
							nombre='$nombre',
							ap_paterno='$paterno',
							ap_materno='$materno',
							sexo='$sexo',
							direccion='$direccion',
							telefono='$telefono',
							fecha_nacimiento='$fecha_nac',
							correo='$correo',
							fecha_registro='$fecha',
							hora_registro='$hora',
							id_registro='$idUsuario'
						WHERE id_persona='$id_persona'
							 ",$conexion)or die(mysql_error());

?>