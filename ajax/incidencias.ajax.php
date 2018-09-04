<?php

require_once '../controladores/incidencias.controlador.php';
require_once '../modelos/incidencias.modelo.php';

class AjaxIncidencias {
    /* =============================================
      GENERAR CODIGO A PARTIR DE ID CATEGORIA
      ============================================= */

    public $idCategoria;

    public function ajaxCrearCodigoIncidencia() {

        $item = "id_categoria";
        $valor = $this->idCategoria;
        $orden = "id";

        $respuesta = ControladorIncidencias::ctrMostrarIncidencias($item, $valor, $orden);

        echo json_encode($respuesta);
    }

    /* =============================================
      EDITAR INCIDENCIAS
      ============================================= */
    public $idIncidencia;
    
    public function ajaxEditarIncidencia(){
        
        $item = "id";
        $valor = $this->idIncidencia;
        $orden = "id";
        
        $respuesta = ControladorIncidencias::ctrMostrarIncidencias($item, $valor, $orden);
        
        echo json_encode($respuesta);
        
    }
    
}

/* =============================================
  GENERAR CODIGO A PARTIR DE ID CATEGORIA
  ============================================= */
if (isset($_POST["idCategoria"])) {

    $codigoIncidencia = new AjaxIncidencias();
    $codigoIncidencia->idCategoria = $_POST["idCategoria"];
    $codigoIncidencia->ajaxCrearCodigoIncidencia();
}

    /* =============================================
      EDITAR INCIDENCIAS
      ============================================= */

    if (isset($_POST["idIncidencia"])) {
        
        $editarIncidencia = new AjaxIncidencias();
        $editarIncidencia->idIncidencia=$_POST["idIncidencia"];
        $editarIncidencia->ajaxEditarIncidencia();
    
}
