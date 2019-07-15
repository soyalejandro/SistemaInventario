function llenar_lista(){
    // console.log("Se ha llenado lista");
   // preCarga(1000,4);
   $.ajax({
       url:"llenarLista.php",
       type:"POST",
       dateType:"html",
       data:{},
       success:function(respuesta){
           $("#lista").html(respuesta);
           $("#lista").slideDown("fast");
       },
       error:function(xhr,status){
           alert("no se muestra");
       }
   }); 
}

function ver_alta(){
   // preCarga(800,4);
   $("#lista").slideUp('low');
   $("#alta").slideDown('low');
   $("#noControl").focus();
}

function ver_lista(){
   $("#alta").slideUp('low');
   $("#lista").slideDown('low');
}

$('#btnLista').on('click',function(){
   llenar_lista();
   ver_lista();
});

$("#frmAlta").submit(function(e){
   
    var idPersona = $("#idPersona").val();
    var usuario   = $("#usuario").val();
    var contra    = $("#contra").val();
    //Validaciones
   if(idPersona==0){
       alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

       alertify.alert()
       .setting({
           'title':'Información',
           'label':'Salir',
           'message': 'Debes seleccionar el dato de una persona.' ,
           'onok': function(){ alertify.message('Gracias !');}
       }).show();
       return false;       
   }
   
   // console.log(nombreCompleto);

       $.ajax({
           url:"guardar.php",
           type:"POST",
           dateType:"html",
           data:{
                 'usuario':usuario,
                 'idPersona':idPersona,
                 'contra':contra
                },
           success:function(respuesta){
            if(respuesta == "ok"){
              alertify.set('notifier','position', 'bottom-right');
              alertify.success('Se ha guardado el registro' );
              $("#frmAlta")[0].reset();
              llenar_persona();
              $("#alta").hide();
              llenar_lista();
            }else{
              alertify.set('notifier','position', 'bottom-right');
              alertify.error('Nombre de usuario ya existe' );
            }
           },
           error:function(xhr,status){
               alert(xhr);
           },
       });
       e.preventDefault();
       return false;
});

function abrirModalEditar(idPersona,usuario,idE){
  
    $("#frmActuliza")[0].reset();

   llenar_personaA(idPersona);

   $("#idE").val(idE);
   $("#usuarioE").val(usuario);

   $("#modalEditar").modal("show");

    $('#modalEditar').on('shown.bs.modal', function () {
        $('#noControlE').focus();
    });   
}

$("#frmActuliza").submit(function(e){
 
   var usuario = $("#usuarioE").val();
   var ide     = $("#idE").val();
  
       $.ajax({
           url:"actualizar.php",
           type:"POST",
           dateType:"html",
           data:{
                   'usuario':usuario,
                   'ide':ide
                },
           success:function(respuesta){
            if(respuesta == "ok"){
              alertify.set('notifier','position', 'bottom-right');
              alertify.success('Se ha actualizado el registro' );
              $("#frmActuliza")[0].reset();
              $("#modalEditar").modal("hide");
              llenar_lista();
            }else{
              alertify.set('notifier','position', 'bottom-right');
              alertify.error('Nombre de usuario ya existe' );
            }
           },
           error:function(xhr,status){
               alert(xhr);
           },
       });
       e.preventDefault();
       return false;
});

function status(concecutivo,id){
   var nomToggle      = "#interruptor"+concecutivo;
   var nomBoton       = "#boton"+concecutivo;
   var numero         = "#tConsecutivo"+concecutivo;
   var tNombrePersona = "#tNombrePersona"+concecutivo;
   var tUsuario       = "#tUsuario"+concecutivo;
   var tFecha         = "#tFecha"+concecutivo;
   var tRestaurar     = "#tRestaurar"+concecutivo;

   if( $(nomToggle).is(':checked') ) {
       // console.log("activado");
       var valor=0;
       alertify.success('Registro habilitado' );
       $(nomBoton).removeAttr("disabled");
       $(numero).removeClass("desabilita");
       $(tNombrePersona).removeClass("desabilita");
       $(tUsuario).removeClass("desabilita");
       $(tFecha).removeClass("desabilita");
       $(tRestaurar).removeAttr("disabled");

   }else{
       // console.log("desactivado");
       var valor=1;
       alertify.error('Registro deshabilitado' );
       $(nomBoton).attr("disabled", "disabled");
       $(numero).addClass("desabilita");
       $(tNombrePersona).addClass("desabilita");
       $(tUsuario).addClass("desabilita");
       $(tFecha).addClass("desabilita");
       $(tRestaurar).attr("disabled","disabled");

   }
   // console.log(concecutivo+' | '+id);
   $.ajax({
       url:"status.php",
       type:"POST",
       dateType:"html",
       data:{
               'valor':valor,
               'id':id
            },
       success:function(respuesta){
           // console.log(respuesta);
       },
       error:function(xhr,status){
           alert(xhr);
       },
   });
}


function llenar_persona()
{
   // alert(idRepre);
   $.ajax({
       url : 'comboPersonas.php',
       // data : {'id':id},
       type : 'POST',
       dataType : 'html',
       success : function(respuesta) {
           $("#idPersona").empty();
           $("#idPersona").html(respuesta);      
       },
       error : function(xhr, status) {
           alert('Disculpe, existió un problema');
       },
   });
}
function llenar_personaA(idPersona)
{
   // alert(idRepre);
   $.ajax({
       url : 'comboPersonasA.php',
       // data : {'id':id},
       type : 'POST',
       dataType : 'html',
       success : function(respuesta) {
           $("#nombreE").empty();
           $("#nombreE").html(respuesta);  
           $("#nombreE").val(idPersona);
           $(".select2").select2();

       },
       error : function(xhr, status) {
           alert('Disculpe, existió un problema');
       },
   });
}
function restaurar_contra(idUsuario){
  var titular = "Restaurar Contraseña";
  var mensaje = "¿Deseas restaurar la contraseña";
  // var link    = "pdfListaPersona.php?id="+idPersona+"&datos="+datos;

  alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
  alertify.confirm(
      titular, 
      mensaje, 
      function(){ 
            $.ajax({
                url : 'restaurarContra.php',
                data : {'idUsuario':idUsuario},
                type : 'POST',
                dataType : 'html',
                success : function(respuesta) {
                    alertify.success('Se ha restaurado la contraseña' );
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
          }, 
      function(){ 
              alertify.error('Cancelar') ; 
              // console.log('cancelado')
            }
  ).set('labels',{ok:'Restaurar',cancel:'Cancelar'}); 
}
function imprimir(){
  var titular = "Lista de Usuarios";
  var mensaje = "¿Deseas generar un archivo con PDF oon la lista de usuarios activos";
  // var link    = "pdfListaPersona.php?id="+idPersona+"&datos="+datos;
  var link    = "pdfListaUsuarios.php?";

  alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
  alertify.confirm(
      titular, 
      mensaje, 
      function(){ 
          window.open(link,'_blank');
          }, 
      function(){ 
              alertify.error('Cancelar') ; 
              // console.log('cancelado')
            }
  ).set('labels',{ok:'Generar PDF',cancel:'Cancelar'}); 
}