<?php 
	$idPedidoFarmacia = $_POST["ide"];
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
								(SELECT nombre_medicamento FROM medicamentos WHERE medicamentos.id_medicamento = detalle_surtido.id_medicamento)
							FROM
							detalle_surtido WHERE id_pedido = '$idPedidoFarmacia'",$conexion) or die (mysql_error());
	// $row=mysql_fetch_row($consulta)
	$consulta1=mysql_query("SELECT 
							 	cantidad_entrante
							FROM
							detalle_surtido WHERE id_pedido = '$idPedidoFarmacia'",$conexion) or die (mysql_error());

				 $row=mysql_fetch_row($consulta1);
				 $cantidadEntrante = $row[0];

				 $Desavi = ($cantidadEntrante > 0)?'disabled':'';
 ?>
	<div class="table-responsive">
		<table id="example2" class="table table-responsive table-condensed table-bordered table-striped">
		  <thead align="center">
				<tr class="info" >
					<th>#</th>
					<th>id Pedido</th>
					<th>Medicamento</th>
					<th>Cantidad Pedida</th>
					<th>Cantidad Surtida</th>
					<th>Diferencia</th>
					<th>Surtir</th>
				</tr>
			</thead> 
			<tbody align="center">
				<?php 
					$n=1;
					while ($row=mysql_fetch_row($consulta)) {
						$idDetallePedido   = $row[0];
						$idPediFarma   = $row[1];
						$id_medicamento  = $row[2];
						$cantidPe  = $row[3];
						$cantidadEnt      = $row[4];
						$diferencia      = $row[5];
						$NomMedica      = $row[6];
 
						$Desa=($diferencia == 0)?'disabled':'';
				
				?>
				<tr>
					<td >
						<p id="<?php echo "tConsecutivo".$n; ?>" >
							<?php echo $n; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tNumeroControl".$n; ?>" >
							<?php echo $idPediFarma; ?>
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
					<td>
						<p id="<?php echo "tCatidad".$n; ?>" >
							<?php echo $cantidadEnt; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tCatidad".$n; ?>" >
							<?php echo $diferencia; ?>
						</p>
					</td>
					<td>
					<button id="<?php echo "boton".$n; ?>" <?php echo $Desa?> type="button" class="btn btn-login btn-sm" 
							onclick="Surtir(
												'<?php echo $idDetallePedido ?>',
												'<?php echo $id_medicamento ?>',
												'<?php echo $cantidPe ?>',
												'<?php echo $idPedidoFarmacia ?>',
												'<?php echo $cantidadEnt ?>'
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
					<th>id Pedido</th>
					<th>Medicamento</th>
					<th>Cantidad Pedida</th>
					<th>Cantidad Surtida</th>
					<th>Diferencia</th>
					<th>Surtir</th>

				</tr>
			</tfoot>
		</table>	
		<div align="center" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<button id=""  type="button" class="btn btn-login" 
							onclick=" Completo(
								'<?php echo $idPedidoFarmacia ?>'
							);">
							Completar Proceso
					<i class="fas fa-save"></i>
			</button>
		</div>
		<div align="center" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<button <?php echo $Desavi ?>  type="button" class="btn btn-login" 
							onclick=" llenar_lista();">
							Regresar
					<i class="fas fa-save"></i>
			</button>
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
    
    
