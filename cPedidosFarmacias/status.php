<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];

	$valor = $_POST["valor"];
	$id    = $_POST["id"];
	$total    = $_POST["total"];

	$valor =($valor==1)?0:1;

	mysql_query("SET NAMES utf8");

	if ($valor==1 & $total > 0) {
		$insertar = mysql_query("UPDATE pedidos_farmacias SET
								activo='$valor',
								status= 'Solicitado'
							WHERE id_pedido_farmacia='$id'",$conexion)or die(mysql_error());
	}elseif ($valor==1 & $total == 0) {
		$insertar = mysql_query("UPDATE pedidos_farmacias SET
								activo='$valor',
								status= 'En Proceso'
							WHERE id_pedido_farmacia='$id'",$conexion)or die(mysql_error());
	}

	else{

		$insertar = mysql_query("UPDATE pedidos_farmacias SET
								activo='$valor',
								status= 'Cancelado'
							WHERE id_pedido_farmacia='$id'",$conexion)or die(mysql_error());
	}
	
?>