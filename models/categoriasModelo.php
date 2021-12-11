<?php


require_once "conexion.php";

class ModeloCategorias
{
    static public function mdlMostrarCategorias($tabla, $item, $valor)
    {
        if ($item) {
            # code...
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE eliminado = 0");
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE eliminado = 0");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    static public function mdlCrearCategoria($tabla, $categoria, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (categoria) VALUES (:categoria)");

        $stmt->bindParam(":categoria", $categoria);

        /************  AUDITORIA ******************/
        $idUsuario = $datos["idUsuario"];
        $usuario = $datos["usuario"];
        $sqlVerdadera = "INSERT INTO $tabla (categoria) VALUES ($categoria)";
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve) VALUES (:id_usuario, :accion, :accion_breve)");

        $mensaje = "$usuario creó una categoría ";

        $stmt2->bindParam(":id_usuario", $idUsuario);
        $stmt2->bindParam(":accion", $sqlVerdadera);
        $stmt2->bindParam(":accion_breve", $mensaje);

        $stmt2->execute();
        /************  AUDITORIA ******************/

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al crear la categoria22222";
        }
    }

    static public function mdlActualizarCategoria($tabla,  $categoria, $idCategoria, $idUsuario, $usuario, $categoriaActual)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id=:id");

        $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":id", $idCategoria);


        /************  AUDITORIA ******************/

        $sqlVerdadera = "UPDATE $tabla SET categoria = $categoria WHERE id= $idCategoria";
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve, accion_anterior) VALUES (:id_usuario, :accion, :accion_breve, :accion_anterior)");

        $mensaje = "$usuario actualizó una categoría ";

        $stmt2->bindParam(":id_usuario", $idUsuario);
        $stmt2->bindParam(":accion", $sqlVerdadera);
        $stmt2->bindParam(":accion_breve", $mensaje);
        $stmt2->bindParam(":accion_anterior",  $categoriaActual);

        $stmt2->execute();
        /************  AUDITORIA ******************/

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al editar la categoria";
        }
    }

    static public function mdlCambiarEstado($tabla, $campo, $idCategoria, $valor, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $campo = :$campo WHERE id=:id");

        $stmt->bindParam(":" . $campo, $valor);
        $stmt->bindParam(":id", $idCategoria);

        /************  AUDITORIA ******************/
        $idUsuario = $datos["idUsuario"];
        $usuario = $datos["usuario"];
        $sqlVerdadera = "DELETE FROM $tabla WHERE id=$idCategoria";
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve) VALUES (:id_usuario, :accion, :accion_breve)");

        $mensaje = "$usuario eliminó una categoría ";

        $stmt2->bindParam(":id_usuario", $idUsuario);
        $stmt2->bindParam(":accion", $sqlVerdadera);
        $stmt2->bindParam(":accion_breve", $mensaje);

        $stmt2->execute();
        /************  AUDITORIA ******************/


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al eliminar la categoría";
        }
    }


    static public function mdlUltimoLogin($tabla, $fecha, $id_usuario)
    {


        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ultimo_login = :fecha WHERE id=:id");

        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":id", $id_usuario);


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al editar el usuario";
        }
    }

    static public function mdlUltimoIdRgistrado($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id FROM $tabla ORDER BY id DESC");

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["id"];
    }

    static public function totalCategorias()
    {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM `categorias` WHERE eliminado = 0");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["COUNT(id)"];
    }
}
