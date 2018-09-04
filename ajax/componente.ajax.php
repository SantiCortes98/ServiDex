<?php

require_once '../controladores/componentes.controlador.php';
require_once '../modelos/componentes.modelo.php';

class AjaxComponentes {

    public $idComponente;

    /* =============================================
      Mostrar Componente
      ============================================= */

    public function ajaxMostarComponente() {
        $itemComponente = "id";
        $valorComponente = $this->idComponente;

        $respuesta = ControladorComponentes::ctrMostrarComponentes($itemComponente, $valorComponente);

        echo json_encode($respuesta);
    }

}

/* =============================================
  Mostrar Componente
  ============================================= */
if (isset($_POST["idComponente"])) {

    $mostrar= new AjaxComponentes();
    $mostrar->idComponente = $_POST["idComponente"];
    $mostrar->ajaxMostarComponente();
}
