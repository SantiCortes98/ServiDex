<?php

require_once 'conexion.php';

class ModelohojaDeVida {

//=====================================
//MOSTRAR HOJA DE VIDA
//======================================

    static public function mdlMostrarHojasDeVida($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=: $item ORDER BY id ASC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
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

    //=====================================
//GUARDAR HOJA DE VIDA
//======================================

    static public function mdlCrearHojaDeVida($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_cliente,nom_aparato,marca,estado_aparato,componentes,estado_componente,licencia,fecha,id_us,id_perfil)"
                . "VALUES(:id_cliente,:nom_aparato,:marca,:estado_aparato,:componentes,:estado_componente,:licencia,:fecha,:id_us,:id_perfil)");

        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":nom_aparato", $datos["nom_aparato"], PDO::PARAM_STR);
        $stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_aparato", $datos["estado_aparato"], PDO::PARAM_STR);
        $stmt->bindParam(":componentes", $datos["componentes"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_componente", $datos["estado_componente"], PDO::PARAM_STR);
        $stmt->bindParam(":licencia", $datos["licencia"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":id_us", $datos["id_us"], PDO::PARAM_INT);
        $stmt->bindParam(":id_perfil", $datos["id_perfil"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

}
