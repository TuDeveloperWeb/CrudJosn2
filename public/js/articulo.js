$(document).ready(function () {
    
    console.log("Esto es una prueba ");


    $('#add-item').click(function (e) { 
        e.preventDefault();

        $('#myModal').modal('show');



        // var adjunto='<tr><td><input type="file" class="form-control-file" name="Documento[]" id="DocumentoF"></td></tr>';

        // $('#tbl_files').append(adjunto);

        // console.log(adjunto);
        // var archivo='<input type="file" class="form-control-file" name="Documento[]" id="DocumentoF">'
        
        

    });


    $('#btnAgregar').click(function (e) { 
        e.preventDefault();

        

    var actions = '<a class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>';
    actions += '<a class="btn edit pl-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>';
    
        var Descripcion = $('#DescripcionF').val(); 
        var Telefono =$('#TelefonoF').val(); 
        var Direccion = $('#DireccionF').val(); 
     



        var row = '<tr>' +
        '<td><input type="hidden" class="form-control" name="IdDetalle[]" >' +
        '<input type="text" class="form-control" name="Detalle[]" required value="'+Descripcion+'" readonly></td>' +
        '<td><input type="text" class="form-control text-center telefono" name="Telefono[]" required value="'+Telefono+'" readonly></td>'+
        '<td><input type="text" class="form-control text-center" name="Direccion[]" required value="'+Direccion+'" readonly></td>'+
        '<td class="archivos"><input type="file" class="form-control-file Documento" name="Documento[]" ></td>'  
        ;
        row +='<td class="text-center">' + actions + '</td>';


        $("#tblDetalle").append(row);

 
        const input1 = document.querySelector('#DocumentoF');
        console.log(input1.files);
        

    const lista3 = document.querySelector('#tblDetalle').lastChild;
    // const lastListItem = lista3.querySelector(':last-child');

    var  file1 = lista3.querySelector(".Documento")
   

        file1.files = input1.files;



        $('#myModal').modal('hide');
        $('#formulario').trigger('reset');




    });


});


$(document).on("click", ".delete",  function () {
       
    $(this).parents("tr").remove();
    
});

function prueba() {
    const inputFile1 = document.getElementById('DocumentoF');
       const inputFile2 = document.getElementById('Adjunto');

    //    document.getElementById


        const fileReader = new FileReader();
        fileReader.readAsText(inputFile1.files[0]);

        fileReader.addEventListener('load', () => {
            const file = new File([fileReader.result], inputFile1.files[0].name, {
            type: inputFile1.files[0].type
            });
            inputFile2.files = [file];
        });

  }