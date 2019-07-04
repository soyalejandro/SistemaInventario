<div id="modalContra" >
        <div >
            <!-- Modal content-->
            <form id="frmContra">
                <div >
                    <div class="modal-header">
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
                                <input disabled = "disabled" id="btn_actualizar_pass" type="submit" class="btn btn-login  btn-flat  pull-right" value="Actualizar Contraseña" onclick="actualizar_pass()">	
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    


<script >
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
<script src="funciones.js"></script>