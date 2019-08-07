<?php 
	include("../sesiones/verificar_sesion.php");                                       
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
		<div class="row" id="cuerpo" style="display:none">
			<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2">
				<?php 
					include('../layout/menuv.php');
				?>
			</div>

			<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cont">
			   <div class="titulo borde sombra">
			        <h3 class="titular">Panel Inicial</h3>
			   </div>	
			   <div class="contenido borde sombra" style="padding-right:18px;">
					<section id="panel">

					</section>
					<section id="misDatos" >
					</section>
					<section id="miFoto">

					</section>
					<section id="cambioPass">

					</section>
				</div>
			</div>			
		</div>
	</div>
	<footer class="fondo">
		<?php 
			include('../layout/pie.php');
		 ?>			

	</footer>

	<?php include('../footer.php');?>
	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Preloaders -->
    <script src="../plugins/Preloaders/jquery.preloaders.js"></script>
	
	<script src="../js/menu.js"></script>
	<script src="../js/precarga.js"></script>
	<script src="../js/salir.js"></script>
	<script src="../js/inicio.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>

	<script src="../plugins/bootstrap-fileinput-master/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/fileinput.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/locales/fr.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/js/locales/es.js" type="text/javascript"></script>
    <script src="../plugins/bootstrap-fileinput-master/themes/fas/theme.js" type="text/javascript"></script>
	<script src="../plugins/bootstrap-fileinput-master/themes/explorer-fas/theme.js" type="text/javascript"></script>
	
	<script>
		window.onload = function() {
			$("#cuerpo").fadeIn("slow");
		};	
		$("#linkPanel").addClass("activo");
		llenarPanel();
	</script>
	<script type="text/javascript" src="../plugins/Smoothbox-master/js/smoothbox.min.js"></script>
</body>
</html>