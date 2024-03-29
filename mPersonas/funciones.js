function llenar_lista(){
     // console.log("Se ha llenado lista");
    preCarga(1000,4);
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
function llenar_sede()
{
   $.ajax({
       url : 'comboSedes.php',
       // data : {'id':id},
       type : 'POST',
       dataType : 'html',
       success : function(respuesta) {
           $("#id_sede").empty();
           $("#id_sede").html(respuesta);      
       },
       error : function(xhr, status) {
           alert('Disculpe, existió un problema');
       },
   });
}
function llenar_sedeA(id_sede)
{
     // alert(idRepre);
     $.ajax({
        url : 'comboSedesA.php',
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            $("#id_sedeE").empty();
            $("#id_sedeE").html(respuesta);  
            $("#id_sedeE").val(id_sede);
            $(".select2").select2();
 
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}
function ver_alta(){
    preCarga(800,4);
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#frmAlta")[0].reset();
    $("#nombre").focus();
    llenar_sede();
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
  
    var nombre    = $("#nombre").val();
    var paterno   = $("#paterno").val();
    var materno   = $("#materno").val();
    var direccion = $("#direccion").val();
    var sexo      = $("#sexo").val();
    var telefono  = $("#telefono").val();
    var fecha_nac = $("#fecha_nac").val();
    var correo    = $("#correo").val();
    var tipo      = $("#tipo").val();
    var id_sede      = $("#id_sede").val();

    if(id_sede==0){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
 
        alertify.alert()
        .setting({
            'title':'Información',
            'label':'Salir',
            'message': 'Debes seleccionar una sede.' ,
            'onok': function(){ alertify.message('Gracias !');}
        }).show();
        $("#id_sede").focus();
        return false;       
    }

    $.ajax({
        url:"guardar.php",
        type:"POST",
        dateType:"html",
        data:{
            'nombre':nombre,
            'paterno':paterno,
            'materno':materno,
            'direccion':direccion,
            'sexo':sexo,
            'telefono':telefono,
            'fecha_nac':fecha_nac,
            'correo':correo,
            'tipo':tipo,
            'id_sede':id_sede
        },
        success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha guardado el registro' );
                $("#frmAlta")[0].reset();
                $("#nombre").focus();
                $("#alta").hide();
                llenar_lista();
                llenar_sede();
            }else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('Registro Duplicado');
            }
        // llenarLista();
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
    e.preventDefault();
    return false;
});

function abrirModalEditar(nombre,paterno,materno,direccion,telefono,fecha_nac,correo,tipo,sexo,ide,id_sede){
   
    $("#frmActuliza")[0].reset();
    $("#nombreE").val(nombre);
    $("#paternoE").val(paterno);
    $("#maternoE").val(materno);
    $("#direccionE").val(direccion);
    $("#telefonoE").val(telefono);
    $("#fecha_nacE").val(fecha_nac);
    $("#correoE").val(correo);
    $("#tipoE").val(tipo);
    $("#sexoE").val(sexo);
    $("#idE").val(ide);

    llenar_sedeA(id_sede);

    $(".select2").select2();

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
        $('#nombreE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var nombre    = $("#nombreE").val();
    var paterno   = $("#paternoE").val();
    var materno   = $("#maternoE").val();
    var direccion = $("#direccionE").val();
    var sexo      = $("#sexoE").val();
    var telefono  = $("#telefonoE").val();
    var fecha_nac = $("#fecha_nacE").val();
    var correo    = $("#correoE").val();
    var tipo      = $("#tipoE").val();
    var ide       = $("#idE").val();
    var id_sede   = $("#id_sedeE").val();

    $.ajax({
        url:"actualizar.php",
        type:"POST",
        dateType:"html",
        data:{
            'nombre':nombre,
            'paterno':paterno,
            'materno':materno,
            'direccion':direccion,
            'sexo':sexo,
            'telefono':telefono,
            'fecha_nac':fecha_nac,
            'correo':correo,
            'tipo':tipo,
            'ide':ide,
            'id_sede':id_sede
        },
        success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha actualizado el registro' );
                $("#frmActuliza")[0].reset();
                $("#modalEditar").modal("hide");
                llenar_lista();
                llenar_sede();
            }else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('Registro Duplicado');
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
    var nomToggle = "#interruptor"+concecutivo;
    var nomBoton  = "#boton"+concecutivo;
    var numero    = "#tConsecutivo"+concecutivo;
    var persona   = "#tPersona"+concecutivo;
    var correo    = "#tCorreo"+concecutivo;
    var telefono  = "#tTelefono"+concecutivo;
    var sexo      = "#tSexo"+concecutivo;
    var sede      = "#tSede"+concecutivo;

    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(persona).removeClass("desabilita");
        $(correo).removeClass("desabilita");
        $(telefono).removeClass("desabilita");
        $(sexo).removeClass("desabilita");
        $(sede).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(persona).addClass("desabilita");
        $(correo).addClass("desabilita");
        $(telefono).addClass("desabilita");
        $(sexo).addClass("desabilita");
        $(sede).addClass("desabilita");
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
function imprimir(){

        var titular = "Lista de Personas";
        var mensaje = "¿Deseas generar un archivo con PDF oon la lista de personas activos";

    var link    = "pdfListaPersona.php";

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