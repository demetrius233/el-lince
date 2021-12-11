<?php

require_once "../models/productosSalientes.php";
require_once "../models/productosModelo.php";


if ($_POST["accion"] == "saliente") {

    $id_usuario = $_POST["usuarioActual"];
    $producto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];
    # code...
    $registrarProductoSaliente = ModeloProductosSalientes::mdlCrearProductoSaliente($id_usuario, $producto, $cantidad);

    echo json_encode($registrarProductoSaliente);
} else if ($_POST["accion"] == "entrante") {

    $id_usuario = $_POST["usuarioActual"];
    $producto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];
    #
    $registrarProductoSaliente = ModeloProductosSalientes::mdlCrearProductoEntrante($id_usuario, $producto, $cantidad);

    echo json_encode($registrarProductoSaliente);
}

if ($_POST["accion"] == "entrantes-salientes") {

    $productosEntrantes = ModeloProductos::totalProductosEntrantes();
    $productosSalientes = ModeloProductos::totalProductosSalientes();

    $respuesta = [
        "entrantes" => $productosEntrantes,
        "salientes" => $productosSalientes,
    ];

    echo json_encode($respuesta);
}
