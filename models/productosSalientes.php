<?php


require_once "conexion.php";

class ModeloProductosSalientes
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

    static public function mdlCrearProductoSaliente($id_usuario, $producto, $cantidad)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO productos_salientes (id_usuario, producto, cantidad) VALUES (:id_usuario, :producto, :cantidad)");

        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->bindParam(":producto", $producto);
        $stmt->bindParam(":cantidad", $cantidad);

        if ($stmt->execute()) {
            return "Producto saliente registrado";
        } else {
            return "Hubo un error al crear el producto saliente";
        }
    }

    static public function mdlCrearProductoEntrante($id_usuario, $producto, $cantidad)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO productos_entrantes (id_usuario, producto, cantidad) VALUES (:id_usuario, :producto, :cantidad)");

        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->bindParam(":producto", $producto);
        $stmt->bindParam(":cantidad", $cantidad);

        if ($stmt->execute()) {
            return "Producto entrante registrado";
        } else {
            return "Hubo un error al crear el producto saliente";
        }
    }
}
