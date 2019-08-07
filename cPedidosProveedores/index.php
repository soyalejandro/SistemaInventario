<?php 
	include('../sesiones/verificar_sesion.php');
	// Variables de configuración
	$titulo="Pedidos Proveedores";
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

									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<label for="proveedor">Proveedor:</label>
												<select name="id_proveedor" id="id_proveedor" class="select2" style="width:100%"></select>
											</div>
										</div>
										
										<hr class="linea">
									</div>
									<div class="row">
										<div class="col-lg-12">
											<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Generar Pedido">										
										</div>
									</div>
            		</form>
            		  <br>
				      <hr>
				      <br>
				      </section>
				      
							<section id="lista"></section>
				    </div>


				   <div class="container-fluid">
				      <section id="detalle">
            		<form id="frmDetalle">
            			<input id="idE" type="hidden" >
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="medicamento">Medicamento:</label>
												<select name="id_medicamento" id="id_medicamento" class="select2" style="width:100%"></select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="Cantidad">Cantidad:</label>
												<input type="text" id="cantidad" class="form-control " required="" placeholder="Escribe la Cantidad">
											</div>
										</div>

										
										<hr class="linea">
									</div>
									<div class="row">
										<div class="col-lg-12">
											<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Guardar">										
										</div>
									</div>
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
	        		<h4 class="modal-title">Detalle</h4>
	      		</div>
	      		<div class="modal-body">
							<input type="hidden" id="idEE">
							<div class="row">
										<section id="lista3">
					 	
					 					</section>
										
										<hr class="linea">
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