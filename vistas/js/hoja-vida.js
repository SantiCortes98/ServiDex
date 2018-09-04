/*=============================================
 Agregando componentes desde la tabla
 =============================================*/

$(".tablas tbody").on("click", "button.agregarComponentes", function () {

    var idComponente = $(this).attr("idComponente");

//    Cuando hace clic el boton agregar se desactivara el boton
    $(this).removeClass("btn-primary agregarComponentes");
    $(this).addClass("btn-default");

    var datos = new FormData();

    datos.append("idComponente", idComponente);

    $.ajax({

        url: "ajax/componente.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            
            console.log("respuesta",respuesta);
            
            var nom_componente = respuesta["nom_componente"];

//            El bloque se lleva al la pagina de crear-producto.php para agregar a la incidencia

            $(".nuevoComponente").append(
                   ' <div class="row" style="padding:5px 15px">'+
                    '<!--Descripcion del componente-->' +
                            '<div class="col-xs-6" style="padding-right: 0px">' +
                                '  <div class="input-group">' +
                                        ' <span class="input-group-addon">' +
                                                '  <button type="button" class="btn btn-danger btn-xs quitarComponente" idComponente="' + idComponente + '"><i class="fa fa-times"></i></button> ' +
                                         '</span>' +
                                            '<input type="text" class="form-control agregarComponente nuevoComponente" id="agregarComponentes" name="agregarComponentes" idComponente="' + idComponente + '" value="' + nom_componente + '"  readonly>' +
                                    '  </div>' +
                            '</div>' +
                    '<!--Seleccionar el estado del computador-->' +
                            '<div class="col-xs-6">' +
                                    '<select class="form-control" id="nuevoEstado" name="nuevoEstado">' +
                                                    ' <option value="#">Seleccionar el estado</option>' +
                                                    '<option value="Bueno">Bueno</option>' +
                                                    ' <option value="Malo">Malo</option>' +
                                                    '<option value="Deteriorado">Deteriorado</option>' +
                                    '</select>' +
                            '</div>'+
                        '</div>'
                    );

            listarComponente();
        }

    });

});

/*=============================================
Quitar el componente y recuperar el boton
 =============================================*/
$(".formularioHoja").on("click", "button.quitarComponente", function () {

//    se borra toda la fila de la incidencia
    $(this).parent().parent().parent().parent().remove();

    var idComponente = $(this).attr("idComponente");

    $("button.recuperarBoton[idComponente='" + idComponente + "']").removeClass("btn-default");
    $("button.recuperarBoton[idComponente='" + idComponente + "']").addClass("btn-primary agregarComponente");

    listarComponente();

});

/*=============================================
 Listar Todas los componentes
 =============================================*/

function listarComponente() {
    var listaComponente = [];

    var nom_componente = $(".nuevoComponente");

    for (var i = 0; i < nom_componente.length; i++) {
        listaComponente.push({"id": $(nom_componente[i]).attr("idComponente"),
            "nom_componente": $(nom_componente[i]).val()
        });
    }
    
    //metodo para convertiser en dato de cadena a JSON
    console.log("listaComponente", JSON.stringify(listaComponente));
    $("#listaComponente").val(JSON.stringify(listaComponente));
}

