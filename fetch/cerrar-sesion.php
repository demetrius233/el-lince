<?php
session_start();
session_destroy();
$_SESSION = [];

echo json_encode(["res" => "login-off"]);
