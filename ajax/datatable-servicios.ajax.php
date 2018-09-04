<?php

require_once '../controladores/servicios.controlador.php';
require_once '../modelos/servicios.modelo.php';

class TablaIncidencias {
    /* ========================================
      =            MOSTRAR LA TABLA DE INICDENCIAS     =
      ======================================== */

    public function mostrarTabla() {

        $item = null;
        $valor = null;

        $incidencias = ControladorIncidencias::ctrMostrarIncidencias($item, $valor);

  	echo '{
		"data": [';

		for($i = 0; $i < count($incidencias)-1; $i++){

			$item = "id";
    			$valor = $incidencias[$i]["id_categoria"];

			$categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			echo '[
			      "'.($i+1).'",
			      "'.$incidencias[$i]["codigo"].'",
			      "'.$incidencias[$i]["descripcion"].'",
			      "'.$categoria["categoria"].'",
			      "'.$incidencias[$i]["fecha"].'",
			      "'.$incidencias[$i]["id"].'"
			    ],';

			}

			$item = "id";
			$valor = $incidencias[count($incidencias)-1]["id_categoria"];

			$categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);


		   echo'[
			      "'.count($incidencias).'",
			      "'.$incidencias[count($incidencias)-1]["codigo"].'",
			      "'.$incidencias[count($incidencias)-1]["descripcion"].'",
			      "'.$categoria["categoria"].'",
			      "'.$incidencias[count($incidencias)-1]["fecha"].'",
			      "'.$incidencias[count($incidencias)-1]["id"].'"
			    ]
			]
	}';
    }

}

/* ========================================
  =          ACTIVAR TABLA  INCIDENCIAS     =
  ======================================== */
$activar = new TablaIncidencias();
$activar->mostrarTabla();
