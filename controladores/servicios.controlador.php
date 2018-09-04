<?php

class ControladorServicios {

//=====================================
//MOSTRAR SERVICIOS
//======================================
    static public function ctrMostrarServicios($item, $valor) {

        $tabla = "servicios";
        $respuesta = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);
        return $respuesta;
    }

//=====================================
//GUARDAR SERVICIOS
//======================================
    static public function ctrCrearServicios() {

        if (isset($_POST["nuevoServicio"])) {


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

//=====================================
//RANGO DE FECHAS
//======================================

    static public function ctrRangoFechasServicios($fechaInicial, $fechaFinal) {
        $tabla = "servicios";

        $respuesta = ModeloServicios::mdlRangoFechasServicios($tabla, $fechaInicial, $fechaFinal);

        return $respuesta;
    }

    //=====================================
//DESCARGAR EXCEL
//======================================
    public function ctrDescargarReporte() {
        if (isset($_GET["reporte"])) {

            $tabla = "servicios";

            if (isset($_GET["fechaIncial"]) && isset($_GET["fechaFinal"])) {

                $servicios = ModeloServicios::mdlRangoFechasServicios($tabla, $_GET["fechaIncial"], $_GET["fechaFinal"]);
            } else {

                $item = null;
                $valor = null;

                $servicios = ModeloServicios::mdlMostrarServicios($tabla, $item, $valor);
            }
            //=====================================
            //CREAR EL ARCHIVO EXCEL
            //======================================
            $Name = $_GET["reporte"] . '.xls';

            header('Expires: 0');
            header('Cache-control: private');
            header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
            header("Cache-Control: cache, must-revalidate");
            header('Content-Description: File Transfer');
            header('Last-Modified: ' . date('D, d M Y H:i:s'));
            header("Pragma: public");
            header('Content-Disposition:; filename="' . $Name . '"');
            header("Content-Transfer-Encoding: binary");


            echo utf8_decode("<table border='0'> 

            <tr> 
            <td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td> 
            <td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
            <td style='font-weight:bold; border:1px solid #eee;'>TECNICO</td>
            <td style='font-weight:bold; border:1px solid #eee;'>PERFIL</td>
            <td style='font-weight:bold; border:1px solid #eee;'>INCIDENCIA</td>
            <td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>
            <td style='font-weight:bold; border:1px solid #eee;'>ARTEFACTO</td>		
            <td style='font-weight:bold; border:1px solid #eee;'>OBSERVACIONES</td>		
            <td style='font-weight:bold; border:1px solid #eee;'>FECHA</td	
            <td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>		
            </tr>");

            foreach ($servicios as $row => $item) {
                $cliente = ControladorClientes::ctrMostrarClientes("id", $item["id_cliente"]);
                $tecnico = ControladorUsuarios::ctrMostarUsuarios("id", $item["id_tecnico"]);
                $perfil = ControladorUsuarios::ctrMostarUsuarios("id", $item["id_perfil"]);

                echo utf8_decode("<tr>
                     
                    <td sytle='border:1px solid #eee;'>" . $item["codigo"] . "</td>
                    <td sytle='border:1px solid #eee;'>" . $cliente["nombre"] . "</td>
                    <td sytle='border:1px solid #eee;'>" . $tecnico["nombre"] . "</td>
                    <td sytle='border:1px solid #eee;'>" . $perfil["perfil"] . "</td>
                    <td sytle='border:1px solid #eee;'>");

                $incidencias = json_decode($item["incidencias"], true);

                foreach ($incidencias as $key => $valueInicidencias) {
                    echo utf8_decode($valueInicidencias["descripcion"] . "<br>");
                }

                echo utf8_decode("</td>
                        <td sytle='border:1px solid #eee;'>" . $item["estados"] . "</td>
                         <td sytle='border:1px solid #eee;'>" . $item["artefacto_tecnologico"] . "</td>
                         <td sytle='border:1px solid #eee;'>" . $item["observaciones"] . "</td>
                         <td style='border: 1px solid #eee;'>" . substr($item["fecha"], 0, 10) . "</td>
                        <td style='border: 1px solid #eee;'>" . number_format($item["total"]) . "</td>
                  <tr>");
            }
            echo "</table>";
        }
    }

    //=====================================
//SUMA TOTAL SERVICIOS
//======================================
    
    static public  function ctrSumarTotalServicios(){
       
       $tabla = "servicios";
       
       $respuesta = ModeloServicios::mdlSumaTotalServicios($tabla);
       
       return $respuesta;
       
   } 
    
    
}
