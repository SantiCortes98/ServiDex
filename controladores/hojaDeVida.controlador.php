<?php

class ControladorhojaDeVida {

//=====================================
//MOSTRAR HOJA DE VIDA
//======================================

    static public function ctrMostrarHojasDeVida($item, $valor) {
        $tabla = "hojadevida";
        $respuesta = ModelohojaDeVida::mdlMostrarHojasDeVida($tabla, $item, $valor);
        return $respuesta;
    }

//=====================================
//GUARDAR HOJA DE VIDA
//======================================
    static public function ctrCrearHojaDeVida() {

        if (isset($_POST["nomAparato"])) {

            $listaIncidencias = json_decode($_POST["listaIncidencias"], true);

            $tabla = "servicios";
            $datos = array(
                "id_tecnico" => $_POST["idTecnico"],
                "id_perfil" => $_POST["idPerfil"],
                "id_cliente" => $_POST["seleccionarCliente"],
                "codigo" => $_POST["nuevoServicio"],
                "incidencias" => $_POST["listaIncidencias"],
                "estados" => $_POST["nuevoEstado"],
                "artefacto_tecnologico" => $_POST["nuevaTecnologia"],
                "observaciones" => $_POST["nuevaObservacionIncidente"]
            );

            $respuesta = ModeloServicios::mdlIngresarServicios($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

			swal({

			   type: "success",
			   title: "¡El servicio ha sido guardado correctamente!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "servicios";

			    }

			});
				

		</script>';
            } else {

                echo '<script>

			swal({

			   type: "error",
			   title: "¡El servicio no puede ir vacío o llevar caracteres especiales!",
			   showConfirmButton: true,
			    confirmButtonText: "Cerrar"

			}).then(function(result){

			   if(result.value){
						
				window.location = "servicios";

			    }

			});
				

		</script>';
            }
        }
    }

}
