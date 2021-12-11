<?php

require_once "../models/usuariosModelo.php";

if (
    preg_match("/^[a-zA-Z0-9]+$/", $_POST["usuario"]) &&
    preg_match("/^[a-zA-Z0-9*.$%]+$/", $_POST["password"])
) {
    $tabla = "usuarios";
    $item = "usuario";
    $valor = $_POST["usuario"];

    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

    if (
        $respuesta["usuario"] === $_POST["usuario"] &&
        password_verify($_POST["password"], $respuesta["password"])
    ) {

        if (!$respuesta["estado"]) {
            $res = ["res" => "off"];
        } else {
            $respuesta["password"] = null;

            $_SESSION["iniciarSesion"] = "ok";
            $_SESSION["info"] = $respuesta;


            $res = [
                "res" => "ok",
                "info" => $_SESSION["info"]
            ];
        }
    } else {
        $res = ["res" => false];
    }
} else {
    $res = ["res" => "especiales"];
}

echo json_encode($res);
