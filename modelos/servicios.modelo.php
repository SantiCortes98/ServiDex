<?php

require_once 'conexion.php';

class ModeloServicios {

//=====================================
//MOSTRAR SERVICIOS
//======================================

    static public function mdlMostrarServicios($tabla, $item, $valor) {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = : $item ORDER BY id ASC");

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

    static public function mdlIngresarServicios($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_tecnico,id_perfil,id_cliente,codigo,incidencias,estados,artefacto_tecnologico,observaciones)
                 VALUES(:id_tecnico,:id_perfil,:id_cliente,:codigo,:incidencias,:estados,:artefacto_tecnologico,:observaciones)");

        $stmt->bindParam(":id_tecnico", $datos["id_tecnico"], PDO::PARAM_INT);
        $stmt->bindParam(":id_perfil", $datos["id_perfil"], PDO::PARAM_INT);
        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
        $stmt->bindParam(":incidencias", $datos["incidencias"], PDO::PARAM_STR);
        $stmt->bindParam(":estados", $datos["estados"], PDO::PARAM_STR);
        $stmt->bindParam(":artefacto_tecnologico", $datos["artefacto_tecnologico"], PDO::PARAM_STR);
        $stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

//=====================================
//RANGO DE FECHAS
//======================================
    static public function mdlRangoFechasServicios($tabla, $fechaInicial, $fechaFinal) {
        if ($fechaInicial == null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

            $stmt->execute();

            return $stmt->fetchAll();
        } else if ($fechaInicial == $fechaFinal) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%' ");

            $stmt->bindParam(" :fecha", $fechaFinal, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal' ");

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    //=====================================
//SUMAR EL TOTAL DE SERVICIOS
//======================================
    static public function mdlSumaTotalServicios($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla");

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt = null;
    }

}
