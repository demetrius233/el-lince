
<?php

require_once "../models/categoriasModelo.php";

$accion = $_POST["accion"];

if ($accion === "crear") {
    $tabla = "categorias";

    $categoria = $_POST["categoria"];

    if (preg_match("/^[a-zA-Z0-9áéíóúñÁÉÍÓÚÑ ]+$/", $categoria)) {
        $consulta = ModeloCategorias::mdlCrearCategoria($tabla, $categoria, $_POST);

        $respuesta = ["res" => $consulta];
        # code...
    } else {
        $respuesta = ["res" => "especiales"];
    }
}

if ($accion === "leer") {
    $tabla = "categorias";
    $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, null, null);
}


if ($accion === "categoria-actual") {
    $tabla = "categorias";
    $item = "id";
    $valor = $_POST["idCategoria"];
    $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
}

if ($accion === "actualizar") {
    $tabla = "categorias";
    $categoria = $_POST["categoria"];
    $idCategoria = $_POST["idCategoria"];
    $idUsuario = $_POST["idUsuario"];
    $usuario = $_POST["usuario"];
    $categoriaActual = $_POST["categoriaActual"];


    $respuesta = ModeloCategorias::mdlActualizarCategoria($tabla, $categoria, $idCategoria, $idUsuario, $usuario, $categoriaActual);
    $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, null, null);
}

if ($accion === "eliminar") {
    $tabla = "categorias";
    $campo = "eliminado";
    $valor = "1";
    $idCategoria = $_POST["idCategoria"];
    $respuesta = ModeloCategorias::mdlCambiarEstado($tabla, $campo, $idCategoria, $valor, $_POST);
    $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, null, null);
}
echo json_encode($respuesta);
