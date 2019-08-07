function llenar_lista(){
     // console.log("Se ha llenado listaa");
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
    $("#nsucursal").focus();
    $("#frmAlta")[0].reset();
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
  
    var nsucursal    = $("#nsucursal").val();
    var ubicacion   = $("#ubicacion").val();
    var encargado   = $("#encargado").val();



        $.ajax({
            url:"guardar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'nsucursal':nsucursal,
                    'ubicacion':ubicacion,
                    'encargado':encargado
                   
                 },
            success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha guardado el registro' );
                $("#frmAlta")[0].reset();
                $("#nombre").focus();
                $("#alta").hide();
                llenar_lista();
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

function abrirModalEditar(encargado,ubicacion,nsucursal,ide){
   
    $("#frmActuliza")[0].reset();
    $("#nsucursalE").val(nsucursal);
    $("#ubicacionE").val(ubicacion);
    $("#encargadoE").val(encargado);
  
    $("#idE").val(ide);

    $(".select2").select2();

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
         $('#nsucursalE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var nsucursal    = $("#nsucursalE").val();
    var ubicacion   = $("#ubicacionE").val();
    var encargado    = $("#encargadoE").val();
   
    var ide       = $("#idE").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                   
                'nsucursal':nsucursal,
                'ubicacion':ubicacion,
                'encargado':encargado,
                    'ide':ide
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            $("#frmActuliza")[0].reset();
            $("#modalEditar").modal("hide");
            llenar_lista();
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
    var nsucursal   = "#tNsucursal"+concecutivo;
    var ubicacion   = "#tUbicacion"+concecutivo;
    var encargado   = "#tEncargado"+concecutivo;
    // var carrera  = "#tCarrera"+concecutivo;
   // var sexo      = "#tSexo"+concecutivo;

      if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(nsucursal).removeClass("desabilita");
        $(ubicacion).removeClass("desabilita");
        $(encargado).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(nsucursal).addClass("desabilita");
        $(ubicacion).addClass("desabilita");
        $(encargado).addClass("desabilita");
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

        var titular = "Lista de Farmacias";
        var mensaje = "¿Deseas generar un archivo con PDF con la lista de Farmacias activos";

    var link    = "pdfListaFarmacia.php";

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