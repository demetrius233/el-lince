<?php

require_once "../models/usuariosModelo.php";

if ($_POST["accion"] === "crear") {
    if (
        preg_match("/^[a-zA-Z0-9áéíóúñÁÉÍÓÚÑ ]+$/", $_POST["nombre"]) &&
        preg_match("/^[a-zA-Z0-9]+$/", $_POST["usuario"]) &&
        preg_match("/^[a-zA-Z0-9*.$%]+$/", $_POST["password"])
    ) {

        $tabla = "usuarios";
        $item = "usuario";
        $valor = $_POST["usuario"];
        $existeUsuario = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        /* VALIDAR QUE EL USUARIO NO SE HAYA REGISTRADO PREVIAMENTE */
        if ($existeUsuario) {
            $respuesta = ["res" => "existe"];
            echo json_encode($respuesta);
            return false;
        }

        /* CARGAR IMAGEN DE USUARIO POR DEFECTO */
        $ruta = "views/img/default/user-default.jpg";

        if (isset($_FILES["foto"]["tmp_name"])) {

            list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);

            $nuevoAncho = 500;
            $nuevoAlto = 500;

            /*=============================================
			CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
			=============================================*/

            $directorio = "../views/img/usuarios/" . $_POST["usuario"];

            mkdir($directorio, 0755);

            /*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

            if ($_FILES["foto"]["type"] == "image/jpeg") {

                /*=============================================
				    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

                $aleatorio = mt_rand(100, 999);

                $ruta = "../views/img/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".jpg";

                $origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);

                // Reescribir la ruta para poder traerla bien de la BD
                $ruta = "views/img/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".jpg";
            }

            if ($_FILES["foto"]["type"] == "image/png") {

                /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                $aleatorio = mt_rand(100, 999);

                $ruta = "../views/img/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".png";

                $origen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);

                // Reescribir la ruta para poder traerla bien de la BD
                $ruta = "views/img/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".png";
            }
        }

        // ENCRIPTAR PASSWORD
        $hashPass = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $_POST["foto"] = $ruta;
        $_POST["password"] = $hashPass;



        $consulta = ModeloUsuarios::mdlCrearUsuario($tabla, $_POST);

        // TRAER EL ULTIMO ID DE LA BD
        $ultimo_id = ModeloUsuarios::mdlUltimoIdRgistrado($tabla);

        // UNA VEZ QUE SE HACE LA AUDITORIA, AHORA HAY QUE HACER LA CONSULTA PARA TRAER EL ULTIMO REGISTRO DE LA AUDITORIA NOTIFICACION
        $ultimaNotificacion = ModeloUsuarios::traerUltimaNotificacion();
        $respuesta = ["res" => $consulta, "foto" => $ruta, "id" => $ultimo_id, "notificacion" => $ultimaNotificacion];
    } else {
        $respuesta = ["res" => "especiales"];
    }
}

if ($_POST["accion"] === "leer") {
    $tabla = "usuarios";



    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, null, null);
}

if ($_POST["accion"] === "usuario-actual") {
    $tabla = "usuarios";
    $item = "id";
    $valor = $_POST["idUsuario"];
    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
}

if ($_POST["accion"] === "actualizar") {

    if (!isset($_FILES["foto"])) {
        $_POST["foto"] = "";
    }


    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"])) {

        /*=============================================
        VALIDAR IMAGEN
        =============================================*/

        // LA RUTA DE LA IMAGEN ACTUAL DEL USUARIO
        $ruta = $_POST["fotoActual"];

        // SI SE ENVIÓ UNA IMAGEN, ENTONCES SE HACE TODO EL PROCESO PARA ACTUALIZAR O SUBIR UNA DESDE 0
        if (isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])) {

            list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);

            $nuevoAncho = 500;
            $nuevoAlto = 500;

            /*=============================================
            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
            =============================================*/

            $directorio = "../views/img/usuarios/" . $_POST["usuario"];

            /*=============================================
            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
            =============================================*/

            //  SI HAY UNA IMAGEN ACTUAL Y ADEMÁS ES DIFERENTE A LA IMG DE DEFAULT, ENTONCES ELIMINA LA IMAGEN, SINO
            // CREA UNA CARPETA NUEVA PORQUE ESO QUIERE DECIR QUE NO HAY UNA RUTA DE IMG PARA ESE USUARIO
            if ($ruta && $ruta !== "views/img/default/user-default.jpg") {

                unlink("../" . $ruta);
            } else {

                mkdir($directorio, 0755);
            }

            /*=============================================
            DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
            =============================================*/

            if ($_FILES["foto"]["type"] == "image/jpeg") {

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100, 999);

                $ruta = "../views/img/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".jpg";

                $origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);

                // Reescribir la ruta para poder traerla bien de la BD
                $ruta = "views/img/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".jpg";
            }

            if ($_FILES["foto"]["type"] == "image/png") {

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100, 999);

                $ruta = "../views/img/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".png";

                $origen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);

                // Reescribir la ruta para poder traerla bien de la BD
                $ruta = "views/img/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".png";
            }
        }

        $tabla = "usuarios";

        // SI HAY UNA CONTRASEÑA ENTONCES SE ENCRIPTA 
        if ($_POST["password"] !== "") {
            $pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $_POST["password"] = $pass_hash;
        }

        // GUARDAR EN LA SESSION LA FOTO ACTUALIZADA
        // SE ACTUALIZA LA FOTO Y EL NOMBRE DE LA SESION SI EL USUARIO QUE FUE EDITADO ES EL MISMO QUE INICIÓ SESION
        if ($_POST["usuarioActual"] === $_POST["usuario"]) {
            # code...
            $_SESSION["info"]["foto"] = $ruta;
            $_SESSION["info"]["nombre"] = $_POST["nombre"];
        }


        $_POST["foto"] = $ruta;

        $consulta = ModeloUsuarios::mdlActualizarUsuario($tabla, $_POST, $_POST["password"]);

        // UNA VEZ QUE SE HACE LA AUDITORIA, AHORA HAY QUE HACER LA CONSULTA PARA TRAER EL ULTIMO REGISTRO DE LA AUDITORIA NOTIFICACION
        $ultimaNotificacion = ModeloUsuarios::traerUltimaNotificacion();
    }

    $respuesta = ["res" => "ok", "datos" => $_POST, "notificacion" => $ultimaNotificacion];
}

if ($_POST["accion"] === "eliminar") {
    $tabla = "usuarios";
    $campo = "eliminado";
    $idUsuario = $_POST["idUsuario"];
    $valor = "1";

    $consulta = ModeloUsuarios::mdlCambiarEstado($tabla, $campo, $idUsuario, $valor, $_POST);

    // UNA VEZ QUE SE HACE LA AUDITORIA, AHORA HAY QUE HACER LA CONSULTA PARA TRAER EL ULTIMO REGISTRO DE LA AUDITORIA NOTIFICACION
    $ultimaNotificacion = ModeloUsuarios::traerUltimaNotificacion();


    $respuesta = [
        "res" => $consulta,
        "notificacion" => $ultimaNotificacion
    ];
}

if ($_POST["accion"] === "cambiar-estado") {
    $tabla = "usuarios";
    $campo = "estado";
    $idUsuario = $_POST["idUsuario"];
    $valor = $_POST["estado"];
    $respuesta = ModeloUsuarios::mdlCambiarEstado($tabla, $campo, $idUsuario, $valor, $_POST);
}

echo json_encode($respuesta);
