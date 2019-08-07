<?php
	//se manda llamar la conexion
	include("../sesiones/verificar_sesion.php");
	$id_usuario =  $_SESSION["idUsuario"];
	$ide       = $_POST["idp"];
	$fecha=date("Y-m-d"); 
	$hora=date ("H:i:s");
 
	mysql_query("SET NAMES utf8");

	$consulta3=mysql_query("SELECT
						 SUM(cantidad_pedido ) As cantidadTotal,
                        SUM(diferencia) As dif,
                        sum(cantidad_entrante) AS entrante
                        FROM
                        detalle_surtido
                        WHERE id_pedido='$ide'",$conexion) or die (mysql_error());
$row=mysql_fetch_row($consulta3);
	
	$cantidadTotal  = $row[0];
    $diferencia  = $row[1];
    $cantidadEntrante  = $row[2];
    

    if ( $cantidadEntrante == $cantidadTotal) {
    	$insertar = mysql_query("UPDATE pedidos_farmacias 				
	                    		SET
								total_entregado ='$cantidadEntrante',
								diferencia ='$diferencia',
								status='Completo'
							WHERE id_pedido_farmacia='$ide'",$conexion)or die(mysql_error());
		echo "ok";
    }
    elseif ($cantidadEntrante < $cantidadTotal ) {
    	if ($cantidadEntrante >=1) {
    	$insertar = mysql_query("UPDATE pedidos_farmacias				
	                    		SET
								total_entregado ='$cantidadEntrante',
								diferencia ='$diferencia',
								status='Parcial'
							WHERE id_pedido_farmacia='$ide'",$conexion)or die(mysql_error());
		echo "ok";
    		}
    		else{
    			echo "error";
    		}
    	
    }
	
	
?>