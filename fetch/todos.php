<?php

require_once "../models/usuariosModelo.php";
require_once "../models/categoriasModelo.php";
require_once "../models/productosModelo.php";

$accion = $_POST["accion"];

if ($accion == "leer") {

    $consulta1 = ModeloUsuarios::totalUsuarios();
    $consulta2 = ModeloCategorias::totalCategorias();
    $consulta3 = ModeloProductos::totalProductos();

    $respuesta = [
        "total_usuarios" => $consulta1,
        "total_categorias" => $consulta2,
        "total_productos" => $consulta3
    ];
}


echo json_encode($respuesta);
