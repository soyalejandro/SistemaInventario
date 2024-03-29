<?php 
	// Conexion a la base de datos
	include'../conexion/conexion.php';

	// Codificacion de lenguaje
	mysql_query("SET NAMES utf8");

	// Consulta a la base de datos
	$consulta=mysql_query("SELECT	id_medicamento,
									nombre_medicamento,
									activo,
									codigo,
									tipo_medicamento,
									via_administracion
							FROM
								medicamentos",$conexion) or die (mysql_error());
	// $row=mysql_fetch_row($consulta)
 ?>
	<div class="table-responsive">
		<table id="example1" class="table table-responsive table-condensed table-bordered table-striped">
		  <thead align="center">
				<tr class="info" >
					<th>#</th>
					<th>Nombre</th>
					<th>Codigo</th>
					<th>Tipo Medicamento</th>
					<th>Via de Administracion</th>
					<th>Editar</th>
					<th>Estatus</th>
				</tr>
			</thead>
			<tbody align="center">
				<?php 
					$n=1;
					while ($row=mysql_fetch_row($consulta)) {
						$idMedicamento   = $row[0];
						$activo	= $row[2];
						$nomMedicamento      = $row[1];
						$codigo  = $row[3];
						$tipo    = $row[4];
						$via    = $row[5];
						$checado=($activo==1)?'checked':'';		
						$desabilitar=($activo==0)?'disabled':'';
						$claseDesabilita=($activo==0)?'desabilita':'';
				?>
				<tr>
					<td >
						<p id="<?php echo "tConsecutivo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo "$n"; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tMedicamento".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $nomMedicamento; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tCodigo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
							<?php echo $codigo; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tDescripcion".$n; ?>"  class="<?php echo $claseDesabilita; ?>">
							<?php echo $tipo ; ?>
						</p>
					</td>
					<td>
						<p id="<?php echo "tDescripcion".$n; ?>"  class="<?php echo $claseDesabilita; ?>">
							<?php echo $via; ?>
						</p>
					</td>
					<td>
						<button id="<?php echo "boton".$n; ?>" <?php echo $desabilitar ?>  type="button" class="btn btn-login btn-sm" 
							onclick="abrirModalEditar(
												'<?php echo $nomMedicamento ?>',
												'<?php echo $codigo ?>',
												'<?php echo $tipo ?>',
												'<?php echo $via ?>',
												'<?php echo $idMedicamento?>'
												);">
							<i class="far fa-edit"></i>
						</button>
					</td>
					<td>
						<input  data-size="small" data-style="android" value="<?php echo "$valor"; ?>" type="checkbox" <?php echo "$checado"; ?>  id="<?php echo "interruptor".$n; ?>"  data-toggle="toggle" data-on="Desactivar" data-off="Activar" data-onstyle="danger" data-offstyle="success" class="interruptor" data-width="100" onchange="status(<?php echo $n; ?>,<?php echo $idMedicamento; ?>);">
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
					<th>Nombre</th>
					<th>Codigo</th>
					<th>Tipo Medicamento</th>
					<th>Via de Administracion</th>
					<th>Editar</th>
					<th>Estatus</th>
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
				lengthMenu: [
					[ 10, 25, 50, -1 ],
					[ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
				],
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
					{
						text: 'Nuevo Medicamento',
						action: function (  ) {
							ver_alta();
						},
						counter: 1
					},
				]
				
			});
		});
	</script>
	<script>
		$(".interruptor").bootstrapToggle('destroy');
		$(".interruptor").bootstrapToggle();
	</script>
    
    
