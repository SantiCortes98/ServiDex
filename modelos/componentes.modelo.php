
<?php

require_once 'conexion.php';

class ModeloComponentes {

    //=====================================
//MOSTRAR COMPONENTES
//======================================

    static public function mdlMostrarComponentes($tabla, $itemComponente, $valorComponente) {
        if ($itemComponente != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $itemComponente = : $itemComponente");

            $stmt->bindParam(":" . $itemComponente, $valorComponente, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");
            
            $stmt->execute();
            
            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt->null;
    }

}
