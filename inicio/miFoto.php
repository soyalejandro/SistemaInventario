<?php
// Conexion a la base de datos
include("../sesiones/verificar_sesion.php");
$usuario = $_SESSION["idUsuario"];
$sexo    = $_SESSION["sexo"];

$foto ='../images/'.$usuario.'.jpg';

if (file_exists($foto)){

		$imagen=$foto;
	 }else{
			if ($sexo=='M') {
				$imagen='../images/hombre.jpg'; 
					}
			else{
				$imagen='../images/mujer.jpg'; 
						 }
	   	 }
?>
<h3 align="center"><?php echo $_SESSION["nCompleto"];?></h3>
<div  align="center"><img id="divrec"  src="<?php echo($imagen)?>" width="400" height="400"></div>
<input type="submit" class="btn btn-login  btn-flat " value="Cambiar Imagen" align="center" onclick="abrirModalSubir('<?php echo $usuario ?> ')">		
<!-- <input type="" name="" id="" value="<?php ($sexo)?>"> -->

<!-- Modal -->
	<div id="modalSubir" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <form id="frmSubir">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Selecciona la fotografía del Usuario</h4>
	      </div>
	      <div class="modal-body">
				<div class="form-group">
				<!-- <label for="image">Nueva imagen</label> -->
				<input type="file" class="form-control-file" name="image" id="image">
				<input type="hidden" class="form-control-file" name="user" id="user">
				
          </div>
	      </div>
	      <div class="modal-footer">
				<div class="row">
					<div class="col-lg-12">
						<button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>
						<input type="button" class="btn btn-login  btn-flat  pull-right upload" value="Subir Fotografía">
					</div>
				</div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Modal -->

	<script src="../js/inicio.js"></script>
	<script>

$("#image").fileinput({
		theme: 'fas',
		language: 'es',
		showUpload: false,
		showCaption: true,
		showCancel: false,
		showRemove: true,
		browseClass: "btn btn-login",
		fileType: "jpg",
		allowedFileExtensions: ['jpg'],
		overwriteInitial: false,
		maxFileSize: 2000,
		maxFilesNum: 10
});

</script>