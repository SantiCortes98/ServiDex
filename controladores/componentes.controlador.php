<?php

class ControladorComponentes {

    //=====================================
//MOSTRAR COMPONENTES
//======================================

    static public function ctrMostrarComponentes($itemComponente, $valorComponente) {
        $tabla = "componentes";
        $respuesta = ModeloComponentes::mdlMostrarComponentes($tabla, $itemComponente, $valorComponente);
        return $respuesta;
    }

}
