<?php

require_once 'conexion.php';

class ModeloIncidencias {
    /* ========================================
      =            MOSTRAR INCIDENCIAS            =
      ======================================== */

    static public function mdlMostrarProductos($tabla, $item, $valor, $orden) {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :"
                    . "$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt->null;
    }

    /* ========================================
      =            CREAR INCIDENCIAS            =
      ======================================== */

    static public function mdlCrearIncidencias($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria,codigo,descripcion)"
                . "VALUES(:id_categoria,:codigo,:descripcion)");

        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* ========================================
      =            EDITAR INCIDENCIAS            =
      ======================================== */

    static public function mdlEditarIncidencias($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria= :id_categoria,"
                . "descripcion= :descripcion WHERE  codigo= :codigo");

        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* ========================================
      =            ELIMINAR INCIDENCIAS            =
      ======================================== */

    static public function mdlEliminarIncidencia($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt->null;
    }

    /* =============================================
      ACTUALIZAR INCIDENCIAS
      ============================================= */

    static public function mdlActualizarIncidencias($tabla, $item1, $valor1, $valor2) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :$id");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":id", $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }


        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      MOSTRAR SUMA INCIDENCIAS
      ============================================= */
    static public function mdlMostrarSumaIncidencias($tabla){
        
        $stmt = Conexion::conectar()->prepare("SELECT SUM(incidencias) as total FROM $tabla");
        $stmt->execute();
        return $stmt ->fetch();
        $stmt->close();
        $stmt=null;
    }
}
