<?php
require_once "../models/productosModelo.php";

$accion = $_POST["accion"];

if ($accion === "ultimo-id") {
    $tabla = "productos";
    $respuesta = ModeloProductos::mdlUltimoIdRgistrado($tabla);
}

if ($accion === "leer") {
    $tabla = "productos";
    $respuesta =  ModeloProductos::mdlMostrarProductos($tabla, null, null);
}

if ($accion === "crear") {
    $tabla = "productos";
    $consulta = ModeloProductos::mdlCrearProducto($tabla, $_POST);
    $respuesta = ["res" => $consulta];
}

if ($accion === "producto-actual") {
    $tabla = "productos";
    $item = "id";
    $valor = $_POST["idProducto"];

    $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
}

if ($accion === "actualizar") {


    $tabla = "productos";
    $datos = $_POST;
    $consulta = ModeloProductos::mdlActualizarProducto($tabla, $datos);

    $consulta2 =  ModeloProductos::mdlMostrarProductos($tabla, null, null);

    $respuesta = [
        "res" => $consulta,
        "datos" => $consulta2
    ];
}

if ($accion === "eliminar") {
    $tabla = "productos";
    $idProducto = $_POST["idProducto"];
    $consulta = ModeloProductos::mdlEliminarProducto($tabla, $idProducto, $_POST);
    $consulta2 =  ModeloProductos::mdlMostrarProductos($tabla, null, null);

    $respuesta = [
        "res" => $consulta,
        "datos" => $consulta2
    ];
}

if ($accion === "productos-salientes") {
    $respuesta = ModeloProductos::productosSalientes();
}

if ($accion === "productos-entrantes") {
    $respuesta = ModeloProductos::productosEntrantes();
}

echo json_encode($respuesta);
