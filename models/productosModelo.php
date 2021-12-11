<?php


require_once "conexion.php";

class ModeloProductos
{
    static public function mdlMostrarProductos($tabla, $item, $valor)
    {
        if ($item) {
            # code...
            $stmt = Conexion::conectar()->prepare("SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.id= :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    static public function mdlCrearProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_categoria, codigo, descripcion, stock, precio_compra, precio_venta) VALUES (:id_categoria, :codigo, :descripcion, :stock, :precio_compra, :precio_venta)");

        $stmt->bindParam(":id_categoria", $datos["idCategoria"]);
        $stmt->bindParam(":codigo", $datos["codigo"]);
        $stmt->bindParam(":descripcion", $datos["descripcion"]);
        $stmt->bindParam(":stock", $datos["stock"]);
        $stmt->bindParam(":precio_compra", $datos["precioCompra"]);
        $stmt->bindParam(":precio_venta", $datos["precioVenta"]);

        /************  AUDITORIA ******************/
        $idUsuario = $datos["idUsuario"];
        $usuario = $datos["usuario"];
        $idCategoria = $_POST["idCategoria"];
        $codigo = $_POST["codigo"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precioCompra = $_POST["precioCompra"];
        $precioVenta = $_POST["precioVenta"];

        $sqlVerdadera = "INSERT INTO $tabla (id_categoria, codigo, descripcion, stock, precio_compra, precio_venta) VALUES ($idCategoria, $codigo, $descripcion, $stock, $precioCompra, $precioVenta)";
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve) VALUES (:id_usuario, :accion, :accion_breve)");

        $mensaje = "$usuario creó un producto ";

        $stmt2->bindParam(":id_usuario", $idUsuario);
        $stmt2->bindParam(":accion", $sqlVerdadera);
        $stmt2->bindParam(":accion_breve", $mensaje);

        $stmt2->execute();
        /************  AUDITORIA ******************/

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al crear el producto";
        }
    }

    static public function mdlActualizarProducto($tabla,  $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, id_categoria = :id_categoria, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta WHERE id=:id");

        $stmt->bindParam(":descripcion", $datos["descripcion"]);
        $stmt->bindParam(":id_categoria", $datos["idCategoria"]);
        $stmt->bindParam(":stock", $datos["stock"]);
        $stmt->bindParam(":precio_compra", $datos["precioCompra"]);
        $stmt->bindParam(":precio_venta", $datos["precioVenta"]);
        $stmt->bindParam(":id", $datos["idProducto"]);


        /************  AUDITORIA ******************/
        $idUsuario = $datos["idUsuario"];
        $usuario = $datos["usuario"];
        $idCategoria = $_POST["idCategoria"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precioCompra = $_POST["precioCompra"];
        $precioVenta = $_POST["precioVenta"];

        $sqlVerdadera = "UPDATE $tabla SET descripcion = $descripcion, id_categoria = $idCategoria, stock = $stock, precio_compra = $precioCompra, precio_venta = $precioVenta WHERE id=:id";
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve) VALUES (:id_usuario, :accion, :accion_breve)");

        $mensaje = "$usuario actualizó el inventario ";

        $stmt2->bindParam(":id_usuario", $idUsuario);
        $stmt2->bindParam(":accion", $sqlVerdadera);
        $stmt2->bindParam(":accion_breve", $mensaje);

        $stmt2->execute();
        /************  AUDITORIA ******************/

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al editar el producto";
        }
    }

    static public function mdlEliminarProducto($tabla, $idProducto, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

        $stmt->bindParam(":id", $idProducto);

        /************  AUDITORIA ******************/
        $idUsuario = $datos["idUsuario"];
        $usuario = $datos["usuario"];

        $sqlVerdadera = "DELETE FROM $tabla WHERE id=$idProducto";
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO auditoria (id_usuario, accion, accion_breve) VALUES (:id_usuario, :accion, :accion_breve)");

        $mensaje = "$usuario eliminó un producto del inventario ";

        $stmt2->bindParam(":id_usuario", $idUsuario);
        $stmt2->bindParam(":accion", $sqlVerdadera);
        $stmt2->bindParam(":accion_breve", $mensaje);

        $stmt2->execute();
        /************  AUDITORIA ******************/


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "Hubo un error al eliminar el producto";
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

    static public function totalProductos()
    {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM `productos`");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["COUNT(id)"];
    }

    static public function productosSalientes()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos_salientes ORDER BY id DESC LIMIT 11");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function totalProductosSalientes()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos_salientes ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function productosEntrantes()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos_entrantes ORDER BY id DESC LIMIT 11");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function totalProductosEntrantes()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos_entrantes ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
