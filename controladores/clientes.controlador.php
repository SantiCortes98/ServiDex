<?php

class ControladorClientes {
    /* ========================================
      =            MOSTRAR CLIENTES        =
      ======================================== */

    static public function ctrMostrarClientes($item, $valor) {

        $tabla = "cliente";

        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

        return $respuesta;
    }

    /* ========================================
      =            CREAR CLIENTE        =
      ======================================== */

    static public function ctrCrearCliente() {
        if (isset($_POST["nuevoNombre"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                    preg_match('/^[0-9]+$/', $_POST["nuevoDocumento"]) &&
                    preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoNumCelular"]) &&
                    preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_POST["nuevoCorreo"])) {

                $tabla = "cliente";

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "documento" => $_POST["nuevoDocumento"],
                    "fecha_nacimiento" => $_POST["nuevaFechaNacimiento"],
                    "correo" => $_POST["nuevoCorreo"],
                    "num_celular" => $_POST["nuevoNumCelular"],
                    "area_trabajo" => $_POST["nuevoPuestoArea"]);

                $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>

			swal({

			   type: "success",
			   title: "¡El cliente ha sido guardado correctamente!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "clientes";

			    }

			});
				

		</script>';
                } else {
                    echo '<script>

			swal({

			   type: "error",
			   title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "clientes";

			    }

			});
				

		</script>';
                }
            }
        }
    }

    /* ========================================
      =            EDITAR CLIENTE        =
      ======================================== */

    static public function ctrEditarCliente() {
        if (isset($_POST["editarNombre"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
                    preg_match('/^[0-9]+$/', $_POST["editarDocumento"]) &&
                    preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_POST["editarCorreo"]) &&
                    preg_match('/^[()\-0-9 ]+$/', $_POST["editarNumCelular"])) {

                $tabla = "cliente";

                $datos = array("id" => $_POST["idCliente"],
                    "nombre" => $_POST["editarNombre"],
                    "documento" => $_POST["editarDocumento"],
                    "correo" => $_POST["editarCorreo"],
                    "num_celular" => $_POST["editarNumCelular"],
                    "fecha_nacimiento" => $_POST["editarFechaNacimiento"],
                    "area_trabajo" => $_POST["editarPuestoArea"]);

                $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>

			swal({

			   type: "success",
			   title: "¡El cliente ha sido cambiado correctamente!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "clientes";

			    }

			});
				

		</script>';
                } else {
                    echo '<script>

			swal({

			   type: "error",
			   title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "clientes";

			    }

			});
				

		</script>';
                }
            }
        }
    }

    /* ========================================
      =            ELIOMINAR CLIENTE        =
      ======================================== */

    static public function ctrEliminarCliente() {

        if (isset($_GET["idCliente"])) {
            $tabla = "cliente";
            $datos = $_GET["idCliente"];

            $respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>

			swal({

			   type: "success",
			   title: "¡El cliente ha sido borrado correctamente!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "clientes";

			    }

			});
				

		</script>';
            }
        }
    }

}
