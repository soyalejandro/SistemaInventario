 function llenar_lista(){
     // console.log("Se ha llenado lista");
    ver_alta();
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
function llenar_lista2(ide){
     // console.log("Se ha llenado lista");
     ver_Detalle();
    preCarga(1000,4);
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


function llenar_medicamentoA(id_medicamento)
{
     // alert(idRepre);
     $.ajax({
        url : 'comboMedicamentoA.php', 
        // data : {'id':id},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            $("#id_medicamentoE").empty();
            $("#id_medicamentoE").html(respuesta);  
            $("#id_medicamentoE").val(id_medicamento);
            $(".select2").select2();
 
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function ver_alta(){
    preCarga(800,4);
    $("#lista").slideDown('low');
    $("#alta").slideDown('low');
    $("#lista2").slideUp('low');
    $("#detalle").slideUp('low');
    $("#frmAlta")[0].reset();

}

function ver_Detalle(){
    preCarga(800,4);
    $("#lista2").slideDown('low');
    $("#detalle").slideDown('low');
    $("#lista").slideUp('low');
    $("#alta").slideUp('low');
    $("#frmDetalle")[0].reset();

}


function abrirModalEditar(ide){
   llenar_lista2(ide);
    $("#frmDetalle")[0].reset();
    $("#idE").val(ide);
     
}

function Surtir(idee,id_medicamento,cantidad,ideep,cantiEntarnte){
   
    $("#frmActuliza")[0].reset(); 
    $("#cantidadE").val(cantidad);
    $("#cantidadEntrante").val(cantiEntarnte);
    $("#idEE").val(idee);
     $("#idEEE").val(ideep);
    llenar_medicamentoA(id_medicamento);

    $(".select2").select2();

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
     });   
}

$("#frmActuliza").submit(function(e){
   
    var cantidad  = $("#cantidadE").val();
    var cantidadSurtida   = $("#cantidadSurtida").val();
    var id_medicamento   = $("#id_medicamentoE").val();
    var idee = $("#idEE").val();
    var ideep = $("#idEEE").val();

    $.ajax({
        url:"surtir.php",
        type:"POST",
        dateType:"html",
        data:{
            'cantidadSurtida':cantidadSurtida,
            'cantidad':cantidad,
            'id_medicamento':id_medicamento,
            'idee':idee
        },
        success:function(respuesta){
            if(respuesta == "ok"){
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('Se ha actualizado el registro' );
                $("#frmActuliza")[0].reset();
                $("#modalEditar").modal("hide");
                abrirModalEditar(ideep);

            }else{
                alertify.set('notifier','position', 'bottom-right');
                alertify.error('La cantidad surtida es mas que la cantidad pedida');
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
        '¿Seguro que decea completar?', 
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
                alertify.success('Se ha Actualizado' );
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
            }, 
        function(){ 
                alertify.error('Cancelar') ; 
                console.log('cancelado')}
    ).set('labels',{ok:'Pedir',cancel:'Cancelar'});


     
 }
 function imprimir(pedidoFarmacia){

    var titular = "Recibo";
    var mensaje = "¿Deseas generar recibo de comprobacion?";

var link    = "pdfListaRecibos.php?pedidoFarmacia="+pedidoFarmacia;

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

function imprimir(pedidoFarmacia){

    var titular = "Recibo";
    var mensaje = "¿Deseas generar recibo de comprobacion?";

var link    = "pdfListaRecibos.php?pedidoFarmacia="+pedidoFarmacia;

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