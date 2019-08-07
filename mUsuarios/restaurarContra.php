<?php
//se manda llamar la conexion
include("../sesiones/verificar_sesion.php");
$id_usuario =  $_SESSION["idUsuario"];


$idUser    = $_POST["idUsuario"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

$contraMD5=md5('12345');

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("UPDATE usuarios SET
 							pvez = '1',
							contra='$contraMD5',
							fecha_registro='$fecha',
							hora_registro='$hora',
							id_registro='$id_usuario'
						WHERE id_usuario='$idUser'
							 ",$conexion)or die(mysql_error());
?>