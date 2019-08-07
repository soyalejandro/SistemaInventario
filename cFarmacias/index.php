<?php 
include("../sesiones/verificar_sesion.php");
include'../conexion/conexion.php';

// Variables de configuración
$titulo="Catálago de Farmacias";
$opcionMenu="A";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('../header.php');?>
</head>

<body>
	<header>
		<?php 
			include('../layout/encabezado.php');
		 ?>
	</header><!-- /header -->	
	<div class="container-fluid" >
		<div class="row">
			<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2 vertical">
			<?php 
				include('menuv.php');
			 ?>
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
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-9">
										<div class="form-group">
											<label for="nombre">Encargado:</label>
											<input type="text" id="encargado" class="form-control " autofocus="" required="" placeholder="Escribe el nombre del encargado">
										</div>
										<div class="form-group">
											<label for="nombre">Ubicacion:</label>
											<input type="text" id="ubicacion" class="form-control " autofocus="" required="" placeholder="Escribe las ubicacion">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
										<div class="form-group">
											<label for="abreviatura">Numero de la sucursal:</label>
											<input type="text" id="nsucursal" class="form-control " required="" placeholder="Escribe el numero de la sucursal">
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-lg-12">
										<button type="button" id="btnLista" class="btn btn-login  btn-flat  pull-left">Lista de Sucursales</button>
										<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Guardar Información">										
									</div>
								</div>
            				</form>
				        </section>

				        <section id="lista" style="width: 100%">
            
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
	        <h4 class="modal-title">Editar datos de Farmacias</h4>
	      </div>
	      <div class="modal-body">
				<input type="hidden" id="idE">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
						<div class="form-group"> 
							<label for="encargadoE">Nombre del encargado:</label>
							<input type="text" id="encargadoE" class="form-control " autofocus="" required="" placeholder="Escribe el nombre del encargado">
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
		 				<div class="form-group">
							<label for="abreviaturaE">Ubicacion:</label>
							<input type="text" id="ubicacionE" class="form-control " required="" placeholder="Escribe la Ubicacion">
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
						<div class="form-group">
							<label for="abreviaturaE">Numero de la sucursal:</label>
							<input type="text" id="nsucursalE" class="form-control " readonly="true" required="" placeholder="Escribe el numero de la sucursal">
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

	<!-- Modal -->
		<?php include('../footer.php');?> 
</body>
</html>