<?php 
include "../conexion/conexion.php";

mysql_query("SET NAMES utf8");
$consulta = mysql_query("SELECT
						 id_sede,
						 nombre from sedes",$conexion)or die(mysql_error());
 ?>
 	<option value="0">Seleccione...</option>
 <?php 

while ($row=mysql_fetch_row($consulta))
 {
	?>	
		<option value="<?php echo	$row[0]; ?>"><?php echo $row[1]; ?></option>
	<?php 
}

?> 
<script>
	$("#id_sede").select2();
</script>