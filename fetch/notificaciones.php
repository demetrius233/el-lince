<?php

require_once "../models/notificaciones.php";

$respuesta = ModeloNotificaciones::traerUltimaNotificacion();

echo json_encode($respuesta);
