<?php 
	$idPedidoProveedor = $_POST["ide"];
	// Conexion a la base de datos
	include'../conexion/conexion.php';

	// Codificacion de lenguaje
	mysql_query("SET NAMES utf8");

	// Consulta a la base de datos
	$consulta=mysql_query("SELECT 
								id_detalle_pedido,
								id_pedido,
								id_medicamento,
							 	cantidad_pedido,
							 	cantidad_entrante,
								diferencia,
								(SELECT nombre_medicamento FROM medicamentos WHERE medicamentos.id_medicamento = detalle_pedido.id_medicamento)
							FROM
							detalle_pedido WHERE id_pedido = '$idPedidoProveedor'",$conexion) or die (mysql_error());
	// $row=mysql_fetch_row($consulta)
 ?>
	<div class="table-responsive">
		<table id="example2" class="table table-responsive table-condensed table-bordered table-striped">
		  <thead align="center">
				<tr class="info" >
					<th>#</th>
					<th>id Pedido</th>
					<th>Medicamento</th>
					<th>Cantidad Pedida</th>
				</tr>
			</thead>
			<tbody align="center">
				<?php 
					$n=1;
					while ($row=mysql_fetch_row($consulta)) {
						$idDetallePedido   = $row[0];
						$idPediProvee   = $row[1];
						$id_medicamento  = $row[2];
						$cantidPe  = $row[3];
						$cantidadEnt      = $row[4];
						$difenecia      = $row[5];
						$NomMedica      = $row[6];
				
				?>
				<tr>
					<td >
						<p id="<?php echo "tConsecutivo".$n; ?>" >
							<?php echo $n; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tNumeroControl".$n; ?>" >
							<?php echo $idPediProvee; ?>
						</p>	
					</td>
					
					<td>
						<p id="<?php echo "tCatidad".$n; ?>" >
							<?php echo $NomMedica; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tCatidad".$n; ?>" >
							<?php echo $cantidPe; ?>
						</p>
					</td>
					
				</tr>
				<?php
					$n++;
					}
				?>
			</tbody>
			<tfoot align="center">
				<tr class="info">
					<th>#</th>
					<th>id Pedido</th>
					<th>Medicamento</th>
					<th>Cantidad Pedida</th>

				</tr>
			</tfoot>
		</table>
		<div align="center" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<button id=""  type="button" class="btn btn-login" 
							onclick=" Completo(
								'<?php echo $idPediProvee ?>'
							);">
							Completar Pedido
					<i class="fas fa-save"></i>
			</button>
		</div>



		<div align="center" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<button id=""  type="button" class="btn btn-login" 
							onclick="Cancelar(
							'<?php echo $idPediProvee ?>'
							);">
							Cancelar Pedido
					<i class=" 	fas fa-ban"></i>
			</button>
		</div>
	</div>	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example2').DataTable( {
				"language": {
					"url": "../plugins/datatables/langauge/Spanish.json"
				},
				"order": [[ 0, "asc" ]],
				"paging":   true,
				"ordering": true,
				"info":     true,
				"responsive": true,
				"searching": true,
				stateSave: false,
				dom: 'Bfrtip',
				
				columnDefs: [ {
						// targets: 0,
						// visible: false
				}],
				buttons: [
					{
						extend: 'excel',
						text: 'Exportar a Excel',
						className: 'btn btn-default',
						title:'Bajas-Estaditicas',
						exportOptions: {
							columns: ':visible'
						}
					},
				]

			});
		});
	</script>
	<script>
		$(".interruptor").bootstrapToggle('destroy');
		$(".interruptor").bootstrapToggle();
	</script>
    
    
