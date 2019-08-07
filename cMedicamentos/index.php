<?php 
	include('../sesiones/verificar_sesion.php');
	// Variables de configuración
	$titulo="Catálago Medicamentos";
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
				      <section id="alta" style="display: none">
            		<form id="frmAlta">
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="nomMed">Nombre Medicamento:</label>
												<input type="text" id="nomMed" class="form-control " autofocus="" required="" placeholder="Escribe el Nombre del Medicamento">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="codigo">Codigo:</label>
												<input type="text" id="codigo" class="form-control " required="" placeholder="Escribe el codigo">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="tipo">Tipo de Medicamento:</label>
												<select  id="tipo" class="select2 form-control " style="width: 100%">
													<option value="Analgésicos">Analgésicos</option>
													<option value="Antiácidos y antiulcerosos">Antiácidos y Antiulcerosos</option>
													<option value="Antialérgicos">Antialérgicos</option>
													<option value="Antidiarreicos y Laxantes">Antidiarreicos y Laxantes</option>
													<option value="Antiinfecciosos">Antiinfecciosos</option>
													<option value="Antiinflamatorios">Antiinflamatorios</option>
													<option value="Antipiréticos">Antipiréticos</option>
													<option value="Antitusivos y Mucolíticos">Antitusivos y Mucolíticos</option>
													
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="tipo">Via de Administracion:</label>
												<select  id="aplicacion" class="select2 form-control " style="width: 100%">
													<option value="Oral">Oral</option>
													<option value="Intramuscular">Intramuscular</option>
													<option value="Intravenosa">Intravenosa</option>
													<option value="Subcutánea">Subcutánea</option>
													<option value="Inhalatoria">Inhalatoria</option>
													<option value="Transdérmica">Transdérmica</option>
													<option value="Nasal">Nasal</option>
													<option value="Oftálmica">Oftálmica</option>
													<option value="Ótica">Ótica</option>
													<option value="Tópica">Tópica</option>
													<option value="Rectal Y Vaginal">Rectal Y Vaginal</option>
												</select>
											</div>
										</div>
										<hr class="linea">
									</div>
									<div class="row">
										<div class="col-lg-12">
											<button type="button" id="btnLista" class="btn btn-login  btn-flat  pull-left">Lista de Medicamentos</button>
											<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Guardar Información">										
										</div>
									</div>
            		</form>
				      </section>
							<section id="lista"></section>
							<section id="cambioPass">

						</section>
						<section id="miFoto">

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
	        		<h4 class="modal-title">Editar datos personas</h4>
	      		</div>
	      		<div class="modal-body">
							<input type="hidden" id="idE">
							<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="nomMedE">Nombre Medicamento:</label>
												<input type="text" id="nomMedE" class="form-control " autofocus="" required="" placeholder="Escribe el Nombre del Proveedor">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="codigoE">Codigo:</label>
												<input type="text" id="codigoE" class="form-control " required="" placeholder="Escribe el Nombre de la Agencia" readonly="true" >
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="tipo">Tipo de Medicamento:</label>
												<select  id="tipoE" class="select2 form-control " style="width: 100%">
													<option value="Analgésicos">Analgésicos</option>
													<option value="Antiácidos y antiulcerosos">Antiácidos y Antiulcerosos</option>
													<option value="Antialérgicos">Antialérgicos</option>
													<option value="Antidiarreicos y Laxantes">Antidiarreicos y Laxantes</option>
													<option value="Antiinfecciosos">Antiinfecciosos</option>
													<option value="Antiinflamatorios">Antiinflamatorios</option>
													<option value="Antipiréticos">Antipiréticos</option>
													<option value="Antitusivos y Mucolíticos">Antitusivos y Mucolíticos</option>
													
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="form-group">
												<label for="tipo">Via de Administracion:</label>
												<select  id="aplicacionE" class="select2 form-control " style="width: 100%">
													<option value="Oral">Oral</option>
													<option value="Intramuscular">Intramuscular</option>
													<option value="Intravenosa">Intravenosa</option>
													<option value="Subcutánea">Subcutánea</option>
													<option value="Inhalatoria">Inhalatoria</option>
													<option value="Transdérmica">Transdérmica</option>
													<option value="Nasal">Nasal</option>
													<option value="Oftálmica">Oftálmica</option>
													<option value="Ótica">Ótica</option>
													<option value="Tópica">Tópica</option>
													<option value="Rectal Y Vaginal">Rectal Y Vaginal</option>
												</select>
											</div>
										</div>
										
										<hr class="linea">
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