<?php

session_start();

require_once "conexion.php";

class ModeloUsuarios
{
    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        if ($item) {
            # code...
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE eliminado = 0");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    static public function mdlCrearUsuario($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, perfil, password, foto) VALUES (:nombre, :usuario, :perfil, :password, :foto)");

        $stmt->bindParam(":nombre", $datos["nombre"]);
        $stmt->bindParam(":usuario", $datos["usuario"]);
        $stmt->bindParam(":perfil", $datos["perfil"]);
        $stmt->bindParam(":password", $datos["password"]);
        $stmt->bindParam(":foto", $datos["foto"]);

        /* AUDITORIA */
        $nombre = $datos["nombre"];
        $perfil = $datos["perfil"];
        $foto = $datos["foto"];
        $usuario = $datos["usuarioActual"];
        $usuarioAfectado = $datos["usuario"];

        $sqlVerdadera = "INSERT INTO $tabla (nombre, usuario, perfil, foto) VALUES ($nombre, $usuario, $perfil, $foto)";
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve) VALUES (:id_usuario, :accion, :accion_breve)");

        $mensaje = "$usuario agregó el usuario $usuarioAfectado";

        $stmt2->bindParam(":id_usuario", $datos["idUsuario"]);
        $stmt2->bindParam(":accion", $sqlVerdadera);
        $stmt2->bindParam(":accion_breve",  $mensaje);
        $stmt2->execute();
        /* AUDITORIA */


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al crear el usuario";
        }
    }

    static public function mdlActualizarUsuario($tabla,  $datos, $password)
    {
        if ($password !== "") {
            $sql = "UPDATE $tabla SET nombre = :nombre, perfil = :perfil, password = :password, foto = :foto WHERE usuario=:usuario";
            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":nombre", $datos["nombre"]);
            $stmt->bindParam(":usuario", $datos["usuario"]);
            $stmt->bindParam(":perfil", $datos["perfil"]);
            $stmt->bindParam(":password", $datos["password"]);
            $stmt->bindParam(":foto", $datos["foto"]);

            if ($stmt->execute()) {



                // return ["res" => "ok", "sql" => $sql];
                return $sql;
            } else {
                return "Hubo un error al editar el usuario";
            }
        } else {
            $sql = "UPDATE $tabla SET nombre = :nombre, perfil = :perfil, foto = :foto WHERE usuario=:usuario";
            $stmt = Conexion::conectar()->prepare($sql);

            $stmt->bindParam(":usuario", $datos["usuario"]);
            $stmt->bindParam(":nombre", $datos["nombre"]);
            $stmt->bindParam(":perfil", $datos["perfil"]);
            $stmt->bindParam(":foto", $datos["foto"]);

            $nombre = $datos["nombre"];
            $perfil = $datos["perfil"];
            $foto = $datos["foto"];
            $usuario = $datos["usuarioActual"];
            $usuarioAfectado = $datos["usuario"];

            $sqlVerdadera = "UPDATE $tabla SET nombre = $nombre, perfil = $perfil, foto = $foto WHERE usuario= $usuarioAfectado";
            $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve) VALUES (:id_usuario, :accion, :accion_breve)");

            $mensaje = "$usuario modificó la información de $usuarioAfectado";

            $stmt2->bindParam(":id_usuario", $datos["idUsuario"]);
            $stmt2->bindParam(":accion", $sqlVerdadera);
            $stmt2->bindParam(":accion_breve",  $mensaje);

            $stmt2->execute();

            if ($stmt->execute()) {

                return "ok";
            } else {
                return "Hubo un error al editar el usuario";
            }
        }
    }

    static public function mdlCambiarEstado($tabla, $campo, $idUsuario, $valor, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $campo = :$campo WHERE id=:id");

        $stmt->bindParam(":" . $campo, $valor);
        $stmt->bindParam(":id", $idUsuario);

        /* AUDITORIA */
        $datos["usuarioActual"] = "andres02";
        $usuario = $datos["usuarioActual"];

        $sqlVerdadera = "DELETE FROM $tabla WHERE id=$idUsuario";
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve) VALUES (:id_usuario, :accion, :accion_breve)");

        $mensaje = "$usuario eliminó un usuario ";

        $stmt2->bindParam(":id_usuario", $datos["idUsuario"]);
        $stmt2->bindParam(":accion", $sqlVerdadera);
        $stmt2->bindParam(":accion_breve",  $mensaje);
        $stmt2->execute();
        /* AUDITORIA */


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al eliminar el usuario";
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

    static public function totalUsuarios()
    {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM `usuarios` WHERE eliminado = 0");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["COUNT(id)"];
    }

    static public function traerUltimaNotificacion()
    {
        $stmt = Conexion::conectar()->prepare("SELECT a.*, u.foto FROM auditoria a INNER JOIN usuarios u ON a.id_usuario = u.id  ORDER BY id DESC");

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
