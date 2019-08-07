<div id="modalContra" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <form id="frmContra">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Actualizar Contraseña</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-6">
                            <div class="form-group">
                                <label for="pass">Contraseña Nueva:</label>
                                <input onkeyup="verificar_pass()" type="password" id="pass" class="form-control " autofocus="" required="" placeholder="Escribe la contraseña">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-6">
                            <div class="form-group">
                                <label for="pass1">Confirma Contraseña:</label>
                                <input onkeyup="verificar_pass()" type="password" id="pass1" class="form-control " required="" placeholder="Confirma la contraseña">
                            </div>
                        </div>
                        <hr class="linea">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" id="btnCerrar" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>
                            <input disabled = "disabled" id="btn_actualizar_pass" type="submit" class="btn btn-login  btn-flat  pull-right" value="Actualizar Contraseña" onclick="actualizar_pass()">	
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function cambiar_contra(){
        $("#modalContra").modal("show");
        $("#frmContra")[0].reset();
        $('#modalContra').on('shown.bs.modal', function () {
            $('#pass').focus();            
        }); 
    }
    function actualizar_pass(){
        var pass   = $("#pass").val();
        $.ajax({
            url:"../sesiones/actualizar_pass2.php",
            type:"POST",
            dateType:"html",
            data:{
                'pass':pass
            },
            success:function(respuesta){
            if (respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha actualizado la contraseña' );
                $("#frmContra")[0].reset();
                $("#modalContra").modal("hide");
            }else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('La contraseña es igual a la Anterior' );
            }
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
    }

    function verificar_pass(){
		var pass1 = $('#pass').val();
		var pass2 = $('#pass1').val();

		if(pass1.trim() != "" && pass2.trim() !=""){
			if(pass1 == pass2){
				$('#btn_actualizar_pass').removeAttr('disabled');
			}else{
				$('#btn_actualizar_pass').attr('disabled', 'disabled');
			}
		}else{
			$('#btn_actualizar_pass').attr('disabled', 'disabled');
		}
	}
</script>
<!-- ENLACE A ARCHIVOS JS -->

<!-- jquery -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Preloaders -->
<script src="../plugins/Preloaders/jquery.preloaders.js"></script>

<!-- bootstrap-toggle-master -->
<script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
<script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>

    <!-- dataTableButtons -->
<script type="text/javascript" src="../plugins/dataTableButtons/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../plugins/dataTableButtons/buttons.flash.min.js"></script>
<script type="text/javascript" src="../plugins/dataTableButtons/buttons.colVis.min.js"></script>
<script type="text/javascript" src="../plugins/dataTableButtons/jszip.min.js"></script>
<script type="text/javascript" src="../plugins/dataTableButtons/pdfmake.min.js"></script>
<script type="text/javascript" src="../plugins/dataTableButtons/vfs_fonts.js"></script>
<script type="text/javascript" src="../plugins/dataTableButtons/buttons.html5.min.js"></script>
<script type="text/javascript" src="../plugins/dataTableButtons/buttons.print.min.js"></script>

<!-- alertify -->
<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>

<!-- Funciones propias -->
<script src="funciones.js"></script>
<script src="../js/inicio.js"></script>
<script src="../js/menu.js"></script>
<script src="../js/precarga.js"></script>
<script src="../js/salir.js"></script>

<script type="text/javascript" src="../plugins/stacktable/stacktable.js"></script> 

<!-- LLAMADAS A FUNCIONES E INICIALIZACION DE COMPONENTES -->
<script>
    $(function () {
        $(".select2").select2();    
    });
    llenar_lista();
    var letra ='<?php echo $opcionMenu; ?>';
    $(document).ready(function() { menuActivo(letra); });
</script>