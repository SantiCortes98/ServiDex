<?php

class ControladorIncidencias {
    /* ========================================
      =            MOSTRAR INCIDENCIAS            =
      ======================================== */

    static public function ctrMostrarIncidencias($item, $valor,$orden) {

        $tabla = "incidencias";

        $respuesta = ModeloIncidencias::mdlMostrarProductos($tabla, $item, $valor, $orden);

        return $respuesta;
    }

    /* ========================================
      =            CREAR INCIDENCIAS            =
      ======================================== */

    static public function ctrCrearIncidencia() {
        if (isset($_POST["nuevaDescripcion"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])) {

                $tabla = "incidencias";
                $datos = array("id_categoria" => $_POST["nuevaCategoria"],
                    "codigo" => $_POST["nuevoCodigo"],
                    "descripcion" => $_POST["nuevaDescripcion"]);

                $respuesta = ModeloIncidencias::mdlCrearIncidencias($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

			swal({

			   type: "success",
			   title: "¡La incidencia ha sido guardado correctamente!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "incidencias";

			    }

			});
				

		</script>';
                }
            } else {

                echo '<script>

			swal({

			   type: "error",
			   title: "¡La incidencia no puede ir vacío o llevar caracteres especiales!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "incidencias";

			    }

			});
				

		</script>';
            }
        }
    }

    /* ========================================
      =            EDITAR INCIDENCIAS            =
      ======================================== */

    static public function ctrEditarIncidencia() {

        if (isset($_POST["editarDescripcion"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])) {

                $tabla = "incidencias";
                $datos = array("id_categoria" => $_POST["editarCategoria"],
                    "codigo" => $_POST["editarCodigo"],
                    "descripcion" => $_POST["editarDescripcion"]);

                $respuesta = ModeloIncidencias::mdlEditarIncidencias($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

			swal({

			   type: "success",
			   title: "¡La incidencia ha sido actualizada correctamente!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "incidencias";

			    }

			});
				

		</script>';
                }
            } else {

                echo '<script>

			swal({

			   type: "error",
			   title: "¡La incidencia no puede ir vacío o llevar caracteres especiales!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "incidencias";

			    }

			});
				

		</script>';
            }
        }
    }

    /* ========================================
      =            ELIMINAR INCIDENCIAS            =
      ======================================== */

    static public function ctrEliminarIncidencia() {

        if (isset($_GET["idIncidencia"])) {

            $tabla = "incidencias";
            $datos = $_GET["idIncidencia"];

            $respuesta = ModeloIncidencias::mdlEliminarIncidencia($tabla, $datos);

            if ($respuesta == "ok") {
                echo'<script>

		swal({
			  type: "success",
			  title: "La incidencia ha sido borrada correctamente",
			 showConfirmButton: true,
			 confirmButtonText: "Cerrar"
		  }).then(function(result){
			if (result.value) {

				window.location = "incidencias";

			}
		})

	</script>';
            }
        }
    }

    /* =============================================
      ACTUALIZAR INCIDENCIAS
      ============================================= */

    static public function ctrMostrarSumaVentas() {
        $tabla = "incidencias";
        $respuesta = ModeloIncidencias::mdlMostrarSumaIncidencias($tabla);
        return $respuesta;
    }

}
