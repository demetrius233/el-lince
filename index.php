<?php

require_once "models/usuariosModelo.php";
require_once "models/categoriasModelo.php";
require_once "models/productosModelo.php";
require_once "models/notificaciones.php";
require_once "models/productosSalientes.php";
require_once "models/notificaciones.php";

require_once "controllers/controladorPrincipal.php";

$Vistaprincipal = new ControladorPrincipal();
$Vistaprincipal->ctrControladorPrincipal();
