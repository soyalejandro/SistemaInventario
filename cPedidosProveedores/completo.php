<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];
	$ide       = $_POST["idp"];
	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");

	mysql_query("SET NAMES utf8");

	$consulta3=mysql_query("SELECT
                        SUM(cantidad_pedido) AS totalcan,
                        SUM(diferencia) As dif
                        FROM
                        detalle_pedido
                        WHERE id_pedido='$ide'",$conexion) or die (mysql_error());
$row=mysql_fetch_row($consulta3);

    $cantidadtotal  = $row[0];
    $diferencia  = $row[1];
    
if ($cantidadtotal > 0 ) {
	$insertar = mysql_query("UPDATE pedidos_proveedores 						SET
								total_pedido='$cantidadtotal',
								diferencia ='$diferencia',
								status='solicitado'
							WHERE id_pedido_proveedor='$ide'",$conexion)or die(mysql_error());
		echo "ok";
}
	
	
?>