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

function ver_alta(){
    preCarga(800,4);
    $("#lista").slideUp('low');
    $("#alta").slideDown('low');
    $("#frmAlta")[0].reset();
    $("#nomProv").focus();
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
  
    var nomProv    = $("#nomProv").val();
    var nomAge   = $("#nomAge").val();
    var direccion = $("#direccion").val();
    var telefono  = $("#telefono").val();
    var correo    = $("#correo").val();
    $.ajax({
        url:"guardar.php",
        type:"POST",
        dateType:"html",
        data:{
            'nomProv':nomProv,
            'nomAge':nomAge,
            'direccion':direccion,
            'telefono':telefono,
            'correo':correo
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

function abrirModalEditar(nomProv,nomAge,telefono,correo,direccion,ide){
   
    $("#frmActuliza")[0].reset();
    $("#nomProvE").val(nomProv);
    $("#nomAgeE").val(nomAge);
    $("#telefonoE").val(telefono);
    $("#correoE").val(correo);
    $("#direccionE").val(direccion);
    $("#idE").val(ide);

    $(".select2").select2();

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
        $('#nomProvE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var nomProv    = $("#nomProvE").val();
    var nomAge   = $("#nomAgeE").val();
    var telefono  = $("#telefonoE").val();
    var correo    = $("#correoE").val();
    var direccion = $("#direccionE").val();
    var ide       = $("#idE").val();

    $.ajax({
        url:"actualizar.php",
        type:"POST",
        dateType:"html",
        data:{
            'nomProv':nomProv,
            'nomAge':nomAge,
            'telefono':telefono,
            'correo':correo,
            'direccion':direccion,
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
                alertify.error('Nombre Provedor  Duplicado');
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
    var agencia    = "#tAgencia"+concecutivo;
    var telefono  = "#tTelefono"+concecutivo;
    var correo      = "#tCorreo"+concecutivo;
    var direccion      = "#tDireccion"+concecutivo;

    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(persona).removeClass("desabilita");
        $(agencia).removeClass("desabilita");
        $(telefono).removeClass("desabilita");
        $(correo).removeClass("desabilita");
         $(direccion).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(persona).addClass("desabilita");
        $(agencia).addClass("desabilita");
        $(telefono).addClass("desabilita");
        $(correo).addClass("desabilita");
        $(direccion).addClass("desabilita");
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
function imprimir(valor){

        var titular = "Lista de Provedores";
        var mensaje = "¿Deseas generar un archivo con PDF con la lista de Provedores activos";

    var link    = "pdfListaProveedor.php?valor="+valor;

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