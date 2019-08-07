<?php 
	// Conexion a la base de datos
	include'../conexion/conexion.php';

	// Codificacion de lenguaje
	mysql_query("SET NAMES utf8");

	// Consulta a la base de datos
	$consulta=mysql_query("SELECT
								id_pedido_farmacia,
								fecha_registro,
								hora_registro,
							 	id_farmacia,
								activo,
								status,
								(SELECT CONCAT(nombre_farmacia,' ',numero_farmacia) FROM farmacias WHERE farmacias.id_farmacia = pedidos_farmacias.id_farmacia),
								total_pedido,
								total_entregado,
								diferencia
							FROM
								pedidos_farmacias ",$conexion) or die (mysql_error());
	// $row=mysql_fetch_row($consulta)
 ?>
	<div class="table-responsive">
		<table id="example1" class="table table-responsive table-condensed table-bordered table-striped">
		  <thead align="center">
				<tr class="info" >
					<th>#</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Farmacia</th>
					<th>Status</th>
					<th>Total Pedido</th>
					<th>Total Entregado</th>
					<th>Diferencias</th>
					<th>Activo</th>
					<th>Detalle Pedido</th>
					<th>Visualizador de pedido</th>
				</tr>
			</thead>
			<tbody align="center">
				<?php 
					$n=1;
					while ($row=mysql_fetch_row($consulta)) {
						$idPediFarma   = $row[0];
						$fecha  = $row[1];
						$hora  = $row[2];
						$id_farmacia     = $row[3];
						$activo        = $row[4];
						$status   = $row[5];
						$nFarm   = $row[6];
						$total  = $row[7];
						$totalEntre  = $row[8];
						$Diferencia  = $row[9];

						
						$Desa=($total>0)?'disabled':'';

						$DesaEntrega=($totalEntre>0)?'disabled':'';


						$checado=($activo==1)?'checked':'';		
						$desabilitar=($activo==0)?'disabled':'';
						$claseDesabilita=($activo==0)?'desabilita':'';



				?>
				<tr>
					<td >
						<p id="<?php echo "tConsecutivo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $n; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tFecha".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $fecha; ?>
						</p>	
					</td>
					
					<td>
						<p id="<?php echo "tHora".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $hora; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tNFar".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $nFarm; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tstatus".$n; ?>"  class="<?php echo $claseDesabilita; ?>">
							<?php echo $status; ?>
						</p>
					</td>			
					<td>
						<p id="<?php echo "tTotal".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $total; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tTotal".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $totalEntre; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tTotal".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $Diferencia; ?>
						</p>
					</td>
					<td>
						<input <?php echo $DesaEntrega?>   data-size="small" data-style="android" value="<?php echo "$valor"; ?>" type="checkbox" <?php echo "$checado"; ?>  id="<?php echo "interruptor".$n; ?>"  data-toggle="toggle" data-on="Cancelar" data-off="Habilitar" data-onstyle="danger" data-offstyle="success" class="interruptor" data-width="100" onchange="status(<?php echo $n; ?>,<?php echo $idPediFarma; ?>, <?php echo $total; ?>);">
					</td>
					<td>
					<button id="<?php echo "boton".$n; ?>" <?php echo $desabilitar?> <?php echo $Desa?> type="button" class="btn btn-login btn-sm" 
							onclick="abrirModalEditar(
												'<?php echo $idPediFarma?>'
												);">
							<i class="far fa-edit"></i>
					</button>
					</td>
					<td>
					<button id="<?php echo "boton".$n; ?>" type="button" class="btn btn-login btn-sm" 
							onclick="ver_DetalleVisiali(
												'<?php echo $idPediFarma ?>'
												);">
							<i class="far fa-edit"></i>
					</button>
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
					<th>Fecha</th>
					<th>Hora</th>
					<th>Farmacia</th>
					<th>Status</th>
					<th>Total Pedido</th>
					<th>Total Entregado</th>
					<th>Diferencias</th>
					<th>Activo</th>
					<th>Detalle Pedido</th>
					<th>Visualizador de pedido</th>
				</tr>
			</tfoot>
		</table>
		
	</div>	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example1').DataTable( {
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
    
    
