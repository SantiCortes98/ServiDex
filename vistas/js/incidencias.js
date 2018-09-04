/* ========================================
 =            CAPTURAR CODIGO PARA ASIGNAR CODIGO             =
 ======================================== */
$('#nuevaCategoria').change(function () {

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "ajax/incidencias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (!respuesta) {
                var nuevoCodigo = idCategoria + "01";
                $("#nuevoCodigo").val(nuevoCodigo);
            } else {
                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#nuevoCodigo").val(nuevoCodigo);
            }
        }

    });
});

/* =============================================
 EDITAR INCIDENCIAS
 ============================================= */
$('.btnEditarIncidencias').click(function () {

    var idIncidencia = $(this).attr("idIncidencia");
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

            var datosCategoria = new FormData();
            datosCategoria.append("idCategoria", respuesta["id_categoria"]);
            console.log("respuesta", respuesta);

            $.ajax({

                url: "ajax/categorias.ajax.php",
                method: "POST",
                data: datosCategoria,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarCategoria").val(respuesta["id"]);
                    $("#editarCategoria").html(respuesta["categoria"]);
                }

            });

            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
        }
    });
});

/* =============================================
 ELIMINAR INCIDENCIAS
 ============================================= */
$('.btnEliminarIncidencias').click(function () {

    var idIncidencia = $(this).attr("idIncidencia");
    var codigo = $(this).attr("codigo");
    swal({
        title: '¿Está seguro de borrar la categoría?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoría!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=incidencias&idIncidencia=" + idIncidencia + " ";
        }
    });
});
