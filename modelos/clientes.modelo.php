<?php

require_once 'conexion.php';

class ModeloClientes {
    /* =============================================
      CREAR CLIENTE
      ============================================= */

    static public function mdlIngresarCliente($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,documento,fecha_nacimiento,correo,num_celular,area_trabajo)"
                . "VALUES (:nombre,:documento,:fecha_nacimiento,:correo,:num_celular,:area_trabajo)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":num_celular", $datos["num_celular"], PDO::PARAM_STR);
        $stmt->bindParam(":area_trabajo", $datos["area_trabajo"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      MOSTRAR CLIENTE
      ============================================= */

    static public function mdlMostrarClientes($tabla, $item, $valor) {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR CLIENTE
      ============================================= */

    static public function mdlEditarCliente($tabla, $datos) {
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre ,documento ="
                . " :documento  , correo = :correo , num_celular ="
                . ":num_celular , fecha_nacimiento = :fecha_nacimiento, area_trabajo = :area_trabajo WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":num_celular", $datos["num_celular"], PDO::PARAM_STR);
         $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":area_trabajo", $datos["area_trabajo"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

        /* =============================================
      ELIMINAR CLIENTE
      ============================================= */
        static public function mdlEliminarCliente($tabla,$datos){
            $stmt= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return "ok";
            }else{
                return "error";
            }
            
            $stmt->close();
            $stmt=null;
        }
}
