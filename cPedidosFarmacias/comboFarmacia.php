<?php 
include "../conexion/conexion.php";

mysql_query("SET NAMES utf8");
$consulta = mysql_query("SELECT
						 id_farmacia,
						 numero_farmacia,
						 nombre_farmacia from farmacias",$conexion)or die(mysql_error());
 ?>
 	<option value="0">Seleccione...</option>
 <?php 

while ($row=mysql_fetch_row($consulta))
 {
	?>	
		<option value="<?php echo	$row[0]; ?>"><?php echo $row[2].' '.$row[1]; ?></option>
	<?php 
}

?> 
<script>
	$("#id_farmacia").select2();
</script>