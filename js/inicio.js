function llenarPanel() {
  // console.log("Se debe de llenar las etiquetas");
  $.ajax({
    url: "../inicio/panel.php",
    data: {},
    type: "POST",
    dataType: "html",
    success: function(respuesta) {
        ocultarSec();
      $("#panel").html(respuesta);
      $("#panel").hide();
      $("#panel").fadeIn("slow");
    },
    error: function(xhr, status) {
      alert("no se muestra");
    }
  });
}

function llenarMisDatos() {
  // console.log("Se debe de llenar las etiquetas");
  $.ajax({
    url: "../inicio/misDatos.php",
    data: {},
    type: "POST",
    dataType: "html",
    success: function(respuesta) {
        ocultarSec();
      $("#misDatos").html(respuesta);
      $("#misDatos").hide();
      $("#misDatos").fadeIn("slow");
      consulta_datos();
    },
    error: function(xhr, status) {
      alert("no se muestra");
    }
  });
}


function consulta_datos() {
$.ajax({
        url:"../inicio/datos_persona.php",
        data: {},
        type:"POST",
        dateType:"html",
       success:function(respuesta){
          var array = eval(respuesta);
          $('#nombre').val(array[0]);
          $('#paterno').val(array[1]);
          $('#materno').val(array[2]);
          $('#direccion').val(array[3]);
          $('#sexo').val(array[4]).change();
          $('#telefono').val(array[5]);
          $('#fecha_nac').val(array[6]);
          $('#correo').val(array[7]);
         },
         error:function(xhr,status){
          alert(xhr);
           }
     });
}

function actualiza_datos() {

 $.ajax({
  url:"../inicio/actualiza_datos.php",
  type:"POST",
  dateType:"html",
  data:$('#frmAlta').serialize(),
  success:function(respuesta) {
    if (respuesta == "ok") {
      alertify.set('notifier','position','botton-right');
      alertify.success('se ha actualizado el registro');
      llenarMisDatos();
    }else{
      alertify.set('notifier','position','botton-right');
      alertify.success('Ha ocurido un Error');
    }
  },
  error:function (xhr,status) {
    alert(xhr);
  },
 });
}

function abrirModalSubir(user){
   
    $('#user').val(user);
    $("#modalSubir").modal("show");
}

$(document).ready(function() {
    $(".upload").on('click', function() {

        var formData = new FormData();

        var files = $('#image')[0].files[0];
        var usuario=$('#user').val();

        formData.append('file',files);
        formData.append('user',usuario);

        $.ajax({
            url: 'upload.php', 
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                   
                    $('#image').fileinput('reset').trigger('custom-event');       
                    alertify.success('La imagen ha sido cargada con exito.');
                    $("#modalSubir").modal("hide");
                     location.reload();
                   
                } else {
          alertify.error('Formato de imagen incorrecto.');
        }
            },
            error:function(xhr,status){
                alertify.error('Error en proceso');
            },
        });
    return false;
    });
});



function CambioContrasena() {
  // console.log("Se debe de llenar las etiquetas");
  $.ajax({
    url: "../inicio/cambioContrasena.php",
    data: {},
    type: "POST",
    dataType: "html",
    success: function(respuesta) {
        ocultarSec();
      $("#cambioPass").html(respuesta);
      $("#cambioPass").hide(); 
      $("#cambioPass").fadeIn("slow");
    },
    error: function(xhr, status) {
      alert("no se muestra");
    }
  });
}


function llenarFoto() {
  // console.log("Se debe de llenar las etiquetas");
  $.ajax({
    url: "../inicio/miFoto.php",
    data: {},
    type: "POST",
    dataType: "html",
    success: function(respuesta) {
        ocultarSec();
      $("#miFoto").html(respuesta);
      $("#miFoto").hide();
      $("#miFoto").fadeIn("slow");
    },
    error: function(xhr, status) {
      alert("no se muestra");
    }
  });
}

function ocultarSec(){
    $("#panel").hide();
    $("#misDatos").hide();
    $("#miFoto").hide();
    $("#cambioPass").hide();

}

function QuitarClass(){
  $("#linkMisDatos").removeClass("activo");
  $("#linkPanel").removeClass("activo");
  $("#linkMifoto").removeClass("activo");
  $("#linkCambioPass").removeClass("activo");
}

$("#linkMisDatos").on("click", function() {
  llenarMisDatos();
  QuitarClass();
  $("#linkMisDatos").addClass("activo");
});

$("#linkPanel").on("click", function() {
  llenarPanel();
  QuitarClass();
  $("#linkPanel").addClass("activo");
});

$("#linkMifoto").on("click", function() {
  llenarFoto();
  QuitarClass();
  $("#linkMifoto").addClass("activo");
});
$("#linkCambioPass").on("click", function() {
  CambioContrasena();
  QuitarClass();
  $("#linkCambioPass").addClass("activo");
});
$("#linkCambioPass2").on("click", function() {
  CambioContrasena();
  QuitarClass();
  
});
$("#linkMifoto2").on("click", function() {
  llenarFoto();
  QuitarClass();
});
