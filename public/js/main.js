$(document).ready(function () {
    
console.log("Esto es una prueba de entrada");
    var tabla=$('#tblArticulo').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/articulo/list",
            columns: [
                { data: 'check',"title": "#", "className": "center-align"},
                { data: 'detalle', "className": "center-align"},
                { data: 'id', "className": "center-align"},
                { data: 'codigo', "className": "center-align"},
                { data: 'descripcion', "className": "center-align" },
                { data: 'cantidad', "className": "center-align" },
                { data: 'precio', "className": "center-align" }          
            ]
  });

function limpiarDatos () {
    $("#observacion").val('');

  } 


  function Procesar(id,observacion,estado,_token) {
    $.ajax({
        type: "PUT",
        url: "/articulo/aprobar",
        data: {
          id: id,
          observacion: observacion,
          estado: estado,
          _token: _token,
        },
        success: function (response) {
            tabla.draw();
            limpiarDatos();
          console.log(response);
        },
      });
    }

    
  function Rechazar(id,observacion,estado,_token) {
    $.ajax({
        type: "PUT",
        url: "/articulo/rechazar",
        data: {
          id: id,
          observacion: observacion,
          estado: estado,
          _token: _token,
        },
        success: function (response) {
            tabla.draw();
            limpiarDatos();
          console.log(response);
        },
      });
    }



  $("#procesar").click(function (e) {
    e.preventDefault();

    var observacion = $("#observacion").val();
    let _token = $("input[name=_token").val();
    let estado = 5;
    let checks = document.querySelectorAll(".valores");

    checks.forEach((element) => {
      if (element.checked == true) {
         Procesar(element.value,observacion,estado,_token)
          console.log("El valor es :" + element.value);
      }
  
     })

  })


  
  $("#rechazar").click(function (e) {
    e.preventDefault();

    var observacion = $("#observacion").val();
    let _token = $("input[name=_token").val();
    let estado = 2;
    let checks = document.querySelectorAll(".valores");

    checks.forEach((element) => {
      if (element.checked == true) {
         Rechazar(element.value,observacion,estado,_token)
          console.log("El valor es :" + element.value);
        }
  
     })

  })

});

$(document).on("click", "a[data-role=update]", function () {

   
    $("#tabladetalle tr").remove();

    let IdRequisicion = $(this).data("id");
    console.log(IdRequisicion);

    mostrarRequisicion(IdRequisicion);
   
  });


  function mostrarRequisicion(id) {

    $.ajax({
        url: "/articulo/detalleArticulo/" + id,
        dataType: "json",
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            response.forEach(element => {
            var row = "<tr>" +
        '<td style="font-size: 12px;" class="text-center">' +
          element.iddetalle +
          "</td>" +
          '<td style="font-size: 12px;" class="text-center">' +
          element.descripcion +
          "</td>" +
          '<td style="font-size: 12px;" class="text-center">' +
          element.telefono+
          "</td>" +
          '<td style="font-size: 12px;" class="text-center">' +
          element.direccion +
          "</td>" +
          "</tr>";
          $("#tabladetalle").append(row);
            });
           
            $('#myModal').modal('show');

        },

        complete: function () {
         
            $(".loader").hide();
          },

    });


  }


  $('#cancelar').click(function (e) { 
    e.preventDefault();

    $('#myModal').modal('show');
    
});



