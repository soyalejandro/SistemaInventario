<?php 
	include('../sesiones/verificar_sesion.php');
	// Variables de configuración
	$titulo="Catálago de Usuarios";
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
										<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
											<div class="form-group">
												<label for="nombre">Nombre de la Persona:</label>
												<select id="idPersona" class="select2" style="width:100%"></select>
											</div>
										</div>
										<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
											<div class="form-group">
												<label for="usuario">Nombre Usuario:</label>
												<input type="text" id="usuario" class="form-control " required="" placeholder="Escribe el Usuario">
											</div>
										</div>
										<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
											<div class="form-group">
												<label for="contra">Contraseña:</label>
												<input type="text" id="contra" class="form-control " required="" readonly="true" value="12345">
											</div>
										</div>
										<hr class="linea">
									</div>
									<div class="row">
										<div class="col-lg-12">
											<button type="button" id="btnLista" class="btn btn-login  btn-flat  pull-left">Lista de Usuarios</button>
											<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Guardar Información">										
										</div>
									</div>
            		</form>
				      </section>
				      <section id="lista"></section>
				      <section id="cambioPass"></section>
					  <section id="miFoto"></section> 
				    </div>
			   	</div>	
				</div>			
			</div>
		</div>
		<footer class="fondo">
			<?php include('../layout/pie.php');?>			
		</footer>
		<!-- Modal -->
		<div id="modalEditar" class="modal fade" role="dialog">
	  	<div class="modal-dialog modal-lg">
	    	<!-- Modal content-->
	    	<form id="frmActuliza">
	    		<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Editar datos Usuario</h4>
	      		</div>
	      		<div class="modal-body">
							<input type="hidden" id="idE">
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
									<div class="form-group">
										<label for="nombreE">Nombre de la Persona:</label>
										<select id="nombreE" class="select2" style="width:100%" disabled="disabled"></select>
									</div>
								</div>
								<div class="col-xs-6 col-sm-4 col-md-4 col-lg-6">
									<div class="form-group">
										<label for="usuarioE">Nombre Usuario:</label>
										<input type="text" id="usuarioE" class="form-control " required="" placeholder="Escribe el apellido">
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