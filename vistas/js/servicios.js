/*=============================================
 * Variable Local Storage
 =============================================*/
if (localStorage.getItem("capturarRango") != null) {

    $("#daterange-btn span").html(localStorage.getItem("capturarRango"));
} else {
    $("#daterange-btn span").html('<i class="fa fa-calendar"></i> Rango de fecha ');
}

/*=============================================
 Agregando incidencias desde la tabla
 =============================================*/

$(".tablas tbody").on("click", "button.agregarIncidencias", function () {

    var idIncidencia = $(this).attr("idIncidencia");

//    Cuando hace clic el boton agregar se desactivara el boton
    $(this).removeClass("btn-primary agregarIncidencias");
    $(this).addClass("btn-default");

    var datos = new FormData();

    datos.append("idIncidencia", idIncidencia);

    $.ajax({

        url: "ajax/incidencias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            var descripcion = respuesta["descripcion"];

//            El bloque se lleva al la pagina de crear-producto.php para agregar a la incidencia

            $(".nuevoIncidente").append(
                    '<!--Descripcion de la incidencia-->' +
                    ' <div class="row" style="padding: 5px 15px">' +
                    '<div class="col-xs-6" style="padding-right: 0px">' +
                    ' <div class="input-group">' +
                    '<span class="input-group-addon">' +
                    '<button type="button" class="btn btn-danger btn-xs quitarIncidencia" idIncidencia="' + idIncidencia + '"><i class="fa fa-times"></i></button>  ' +
                    '  </span>' +
                    '<input type="text" class="form-control agregarIncidencia nuevaDescripcion" id="agregarIncidencias" idIncidencia="' + idIncidencia + '" name="agregarIncidencias" value="' + descripcion + '" required="" readonly>' +
                    ' </div>' +
                    '</div>' +
                    '<!--Seleccionar el estado del computador-->' +
                    '<div class="col-xs-3">' +
                    ' <select class="form-control" id="nuevoEstado" name="nuevoEstado">' +
                    '<option value="#">Seleccionar el estado</option>' +
                    '<option value="Bueno">Bueno</option>' +
                    '<option value="Malo">Malo</option>' +
                    '<option value="Deteriorado">Deteriorado</option>' +
                    '</select>' +
                    '</div>' +
                    '<!--Seleccionar la tecnologia adecuada-->' +
                    '<div class="col-xs-3" style="padding-left: 0px">' +
                    '<div class="input-group">' +
                    '<select class="form-control" id="nuevaTecnologia" name="nuevaTecnologia">' +
                    '<option value="#">Seleccionar la tecnologia</option>' +
                    '<option value="PC">PC</option>' +
                    '<option value="Router">Router</option>' +
                    '<option value="Impresora">Impresora</option>' +
                    ' </select>' +
                    ' </div>' +
                    '</div>' +
                    '</div>'
                    );

            listarIncidencias();
        }

    });

});

/*=============================================
 QUITAR INCIDENCIA   DE LA VENTA Y RECUPERAR EL BOTON
 =============================================*/
$(".formularioServicio").on("click", "button.quitarIncidencia", function () {

//    se borra toda la fila de la incidencia
    $(this).parent().parent().parent().parent().remove();

    var idIncidencia = $(this).attr("idIncidencia");

    $("button.recuperarBoton[idIncidencia='" + idIncidencia + "']").removeClass("btn-default");
    $("button.recuperarBoton[idIncidencia='" + idIncidencia + "']").addClass("btn-primary agregarIncidencia");

    listarIncidencias();

});

/*=============================================
 Listar Todas las incidencias
 =============================================*/

function listarIncidencias() {
    var listaIncidencias = [];

    var descripcion = $(".nuevaDescripcion");

    for (var i = 0; i < descripcion.length; i++) {

        listaIncidencias.push({"id": $(descripcion[i]).attr("idIncidencia"),
            "descripcion": $(descripcion[i]).val()
        });

    }


//    Metodo para convertirse en dato de cadena a JSON
    console.log("listaIncidencias", JSON.stringify(listaIncidencias));
    $("#listaIncidencias").val(JSON.stringify(listaIncidencias));


}

/*=============================================
 Factura Imprimir
 =============================================*/
$(".tablas").on("click", ".btnImprimirServicio", function () {

    var codigoServicio = $(this).attr("codigoServicio");

    window.open("extensiones/tcpdf/pdf/factura.php?codigo=" + codigoServicio, "_blank");
});

/*=============================================
 RANGO DE FECHAS
 =============================================*/
$('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
                'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment(),
            endDate: moment()
        },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

            var fechaInicial = start.format('YYYY-MM-DD');
            var fechaFinal = end.format('YYYY-MM-DD');

            var capturarRango = $("#daterange-btn span").html();

            localStorage.setItem("capturarRango", capturarRango);

            window.location = "index.php?ruta=servicios&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

        }

);

/*=============================================
 CANCELAR RANGO DE FECHAS
 =============================================*/
$(".daterangepicker .opensleft  .range_inputs .cancelBtn").on("click", function () {

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "servicios";

});

/*=============================================
 CAPTURAR HOY
 =============================================*/
$(".daterangepicker .opensleft  .ranges li").on("click", function(){
    
   var textoHoy = $(this).attr("data-range-key");
   
    if (textoHoy == "Hoy") {
       var d = new Date();
       
       var dia = d.getDate();
       var mes = d.getMonth()+1;
       var año = d.getFullYear();
       
       var fechaInicial = año+"-"+mes+"-"+dia;
       var fechaFinal = año+"-"+mes+"-"+dia;
       
       localStorage.setItem("capturarRango","Hoy");
       window.location =  "index.php?ruta=servicios&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;
       
    }
});

