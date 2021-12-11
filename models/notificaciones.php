<?php


require_once "conexion.php";

class ModeloNotificaciones
{


    static public function traerUltimaNotificacion()
    {
        $stmt = Conexion::conectar()->prepare("SELECT a.*, u.foto, u.usuario, u.nombre FROM auditoria a INNER JOIN usuarios u ON a.id_usuario = u.id  ORDER BY id DESC");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
