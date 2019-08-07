function llenar_lista(){
     // console.log("Se ha llenado lista");
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
  
    var nomMed    = $("#nomMed").val();
    var codigo   = $("#codigo").val();
    var tipo   = $("#tipo").val();
    var aplicacion   = $("#aplicacion").val();
    $.ajax({
        url:"guardar.php",
        type:"POST",
        dateType:"html",
        data:{
            'nomMed':nomMed,
            'codigo':codigo,
            'tipo':tipo,
            'aplicacion':aplicacion


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

function abrirModalEditar(nomMed,codigo,tipo,aplicacion,ide){
   
    $("#frmActuliza")[0].reset();
    $("#nomMedE").val(nomMed);
    $("#codigoE").val(codigo);
    $("#tipoE").val(tipo);
    $("#aplicacionE").val(aplicacion);
    $("#idE").val(ide);

    $(".select2").select2();

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
        $('#nomMedE').focus();
     });   
}

$("#frmActuliza").submit(function(e){
  
    var nomMed    = $("#nomMedE").val();
    var codigo   = $("#codigoE").val();
    var tipo  = $("#tipoE").val();
    var aplicacion  = $("#aplicacionE").val();
    var ide       = $("#idE").val();

    $.ajax({
        url:"actualizar.php",
        type:"POST",
        dateType:"html",
        data:{
            'nomMed':nomMed,
            'codigo':codigo,
            'tipo':tipo,
            'aplicacion':aplicacion,
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
    var medicamento   = "#tMedicamento"+concecutivo;
    var codigo    = "#tCodigo"+concecutivo;
    var descripcion  = "#tDescripcion"+concecutivo;

    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Registro habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(medicamento).removeClass("desabilita");
        $(codigo).removeClass("desabilita");
        $(descripcion).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Registro deshabilitado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(medicamento).addClass("desabilita");
        $(codigo).addClass("desabilita");
        $(descripcion).addClass("desabilita");
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
        var mensaje = "¿Deseas generar un archivo con PDF con la lista de Medicamentos activos";

    var link    = "pdfListaMedicamento.php?valor="+valor;

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