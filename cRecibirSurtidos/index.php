<?php 
	include('../sesiones/verificar_sesion.php');
	// Variables de configuración
	$titulo="Surtido a Farmacia";
	$opcionMenu="A";
 ?>
<!DOCTYPE html>
<html lang="en">
	<head> 
		<?php include('../header.php');?>
	</head>
	<body>
		<header>
			<?php include('../layout/encabezado.php');?>
		</header><!-- /header -->	
		<div class="container-fluid" >
			<div class="row">
				<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2 vertical">
					<?php include('menuv.php');?>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cont">
			  	<div class="titulo borde sombra">
			      <h3><?php echo $titulo; ?></h3>
			   	</div>	
			   	<div class="contenido borde sombra">
				  	<div class="container-fluid">
				      <section id="alta">
            		<form id="frmAlta">
            		</form>
				      </section>
					  <section id="lista"></section>
				    </div>


				   <div class="container-fluid">
				      <section id="detalle">
            		<form id="frmDetalle">
            			<input id="idE"  type="hidden">
            			

            		</form>
            		  <br>
				      <hr>
				      <br>
				      
				      </section>
				      
					 <section id="lista2">
					 	
					 </section>

				    </div>	
			   </div>	
				</div>			
			</div>
		</div>
		


<footer class="fondo">
			<?php 
				include('../layout/pie.php');
			?>			
</footer>


<!-- Modal -->
		<div id="modalEditar" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
	    	<!-- Modal content-->
	    	<form id="frmActuliza">
	    		<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Surtir Pedido Proveedor</h4>
	      		</div>
	      		<div class="modal-body">
							<input id="idEE" type="hidden">
							<input id="idEEE" type="hidden"  >
							<div class="row">
										<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
											<div class="form-group">
												<label for="medicamento">Medicamento:</label>
												<select name="id_medicamentoE" id="id_medicamentoE" class="select2" style="width:100%" disabled="disabled"  ></select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
											<div class="form-group">
												<label for="cantidad">Cantidad a surtir :</label>
												<input type="text" id="cantidadE" class="form-control " required="" placeholder="Escribe la Cantidad de medicamento" readonly="true">
											</div>
										</div>
										<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
											<div class="form-group">
												<label for="cantidadEntrante">Cantidad Anterior:</label>
												<input type="text" id="cantidadEntrante" readonly="true" class="form-control " required="" placeholder="Escribe la Cantidad de medicamento" >
											</div>
										</div>
										<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
											<div class="form-group">
												<label for="cantidadSurtida">Cantidad:</label>
												<input type="text" id="cantidadSurtida" class="form-control " required="" placeholder="Escribe la Cantidad de medicamento" >
											</div>
										</div>
							</div>
	      		</div>
						<div class="modal-footer">
							<div class="row">
								<div class="col-lg-12">
									<button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>
									<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Actualizar Información">	
								</div>
							</div>
						</div>
	    		</div>
				</form>
	  	</div>
		</div>
		<!-- Modal -->	
		

	<?php include('../footer.php');?> 
	</body>
</html>