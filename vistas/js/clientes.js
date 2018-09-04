/*=============================================
 EDITAR CLIENTE
 =============================================*/
$(".btnEditarCliente").click(function () {

    var idCliente = $(this).attr("idCliente");

    var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            console.log("respuesta", respuesta);

            $("#idCliente").val(respuesta["id"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarDocumento").val(respuesta["documento"]);
            $("#editarCorreo").val(respuesta["correo"]);
            $("#editarNumCelular").val(respuesta["num_celular"]);
            $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
            $("#editarPuestoArea").val(respuesta["area_trabajo"]);
        }
    });

});

/*=============================================
 ELIMINAR CLIENTE
 =============================================*/
$(".btnEliminarCliente").click(function (){
   
    var idCliente = $(this).attr("idCliente");
    console.log("idCliente",idCliente);
    
    swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
    }).then((result) =>{
        
        if (result.value) {
            
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
            
        }
        
        });
    
});