 function llenar_lista(){
     // console.log("Se ha llenado lista");
    ver_alta();

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
function llenar_lista2(ide){
     // console.log("Se ha llenado lista");
     ver_Detalle();

    $.ajax({
        url:"llenarLista2.php",
        type:"POST",
        dateType:"html",
        data:{
            'ide':ide
        },
        success:function(respuesta){
            $("#lista2").html(respuesta);
            $("#lista2").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}


 function llenar_lista3(idee){

    $.ajax({
        url:"llenarLista3.php",
        type:"POST",
        dateType:"html",
        data:{
            'idee':idee
        },
        success:function(respuesta){
            $("#lista3").html(respuesta);
            $("#lista3").slideDown("fast");
        }, 
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}

function llenar_medicamento()
{
   $.ajax({
       url : 'comboMedicamento.php',
       // data : {'id':id},
       type : 'POST',
       dataType : 'html',
       success : function(respuesta) {
           $("#id_medicamento").empty();
           $("#id_medicamento").html(respuesta);      
       },
       error : function(xhr, status) {
           alert('Disculpe, existió un problema');
       },
   });
}

function llenar_proveedor()
{
   $.ajax({
       url : 'comboProveedor.php',
       // data : {'id':id},
       type : 'POST',
       dataType : 'html',
       success : function(respuesta) {
           $("#id_proveedor").empty();
           $("#id_proveedor").html(respuesta);      
       },
       error : function(xhr, status) {
           alert('Disculpe, existió un problema');
       },
   });
}

function ver_alta(){

    $("#lista").slideDown('low');
    $("#alta").slideDown('low');
    $("#lista2").slideUp('low');
    $("#detalle").slideUp('low');
    $("#frmAlta")[0].reset();
    llenar_proveedor();
}



$("#frmAlta").submit(function(e){
  
    var id_proveedor = $("#id_proveedor").val();

    $.ajax({
        url:"guardar.php",
        type:"POST",
        dateType:"html",
        data:{
            'id_proveedor':id_proveedor
        },
        success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha guardado el registro' );
                $("#frmAlta")[0].reset();
                $("#alta").hide();
                llenar_lista();
            }else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('Ocupa Incetrar proveedor');
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



function ver_Detalle(){

    $("#lista2").slideDown('low');
    $("#detalle").slideDown('low');
    $("#lista").slideUp('low');
    $("#alta").slideUp('low');
    $("#frmDetalle")[0].reset();
    llenar_medicamento();
}

function ver_DetalleVisiali(idee){
     llenar_lista3(idee);
   $("#frmActuliza")[0].reset();
   $("#idEE").val(idee);
    $("#modalEditar").modal("show");


}

function abrirModalEditar(ide){
   llenar_lista2(ide);
    $("#frmDetalle")[0].reset();
    $("#idE").val(ide);
     
}

$("#frmDetalle").submit(function(e){

    var ide = $("#idE").val();
    var id_medicamento = $("#id_medicamento").val();
    var cantidad = $("#cantidad").val();

    $.ajax({
        url:"actualizar.php",
        type:"POST",
        dateType:"html",
        data:{
            'id_medicamento':id_medicamento,
            'cantidad':cantidad,
            'ide':ide
        },
        success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha actualizado el registro' );
                abrirModalEditar(ide);
            }
            else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('incerta un medicamento');
            }
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
    e.preventDefault();
    return false;
});

 function Completo(idp) {
     // console.log("Saliendo del sistema...")
    alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
    alertify.confirm(
        'Pedir', 
        '¿Seguro que decea completar ? ¡No se podra editar despues!', 
        function(){ 
                $.ajax({
        url:"completo.php",
        type:"POST",
        dateType:"html",
        data:{
            'idp':idp
        },
        success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha Completa el pedido' );
                llenar_lista();
            }else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('No hay medicamento pedido');
            }
        },
        error:function(xhr,status){
             alert(xhr);

        }
    });
            }, 
        function(){ 
                alertify.error('Cancelar') ; 
                console.log('cancelado')}
    ).set('labels',{ok:'Pedir',cancel:'Cancelar'});


     
 }
function Cancelar(idd) {
    $.ajax({
        url:"cancelar.php",
        type:"POST",
        dateType:"html",
        data:{
            'idd':idd
        },
        success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se Cancelo el pedido' );
                llenar_lista();
            }else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('Error');
            }
        },
        error:function(xhr,status){
             alert(xhr);

        }
    });
}


function status(concecutivo,id,total){
    var nomToggle = "#interruptor"+concecutivo;
    var nomBoton  = "#boton"+concecutivo;
    var numero    = "#tConsecutivo"+concecutivo;
    var Fecha   = "#tFecha"+concecutivo;
    var Hora    = "#tHora"+concecutivo;
    var NProv  = "#tNProv"+concecutivo;
    var status  = "#tstatus"+concecutivo;
    var totall  = "#tTotal"+concecutivo;


    if( $(nomToggle).is(':checked') ) {
        // console.log("activado");
        var valor=0;
        alertify.success('Pedido habilitado' );
        $(nomBoton).removeAttr("disabled");
        $(numero).removeClass("desabilita");
        $(Fecha).removeClass("desabilita");
        $(Hora).removeClass("desabilita");
        $(NProv).removeClass("desabilita");
        $(status).removeClass("desabilita");
        $(totall).removeClass("desabilita");
    }else{
        console.log("desactivado");
        var valor=1;
        alertify.error('Pedido cancelado' );
        $(nomBoton).attr("disabled", "disabled");
        $(numero).addClass("desabilita");
        $(Fecha).addClass("desabilita");
        $(Hora).addClass("desabilita");
        $(NProv).addClass("desabilita");
        $(status).addClass("desabilita");
        $(totall).addClass("desabilita");
    }
    // console.log(concecutivo+' | '+id);
    $.ajax({
        url:"status.php",
        type:"POST",
        dateType:"html",
        data:{
                'valor':valor,
                'id':id,
                'total':total
             },
        success:function(respuesta){
            llenar_lista();
        },
        error:function(xhr,status){
            alert(xhr);
        },
    });
}


function imprimir(){

        var titular = "Lista de Inventario";
        var mensaje = "¿Deseas generar un archivo con PDF con la lista de los pedidos a proveedor";

    var link    = "pdfListaPedido.php";

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
