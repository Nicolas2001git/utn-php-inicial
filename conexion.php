<?php

$env = parse_ini_file(".env");

$host = $env["DB_HOST"];
$usuarioBD = $env["DB_USER"];
$claveBD = $env["DB_PASSWORD"];
$nombreBD = $env["DB_NAME"];

$conexion = mysqli_connect($host, $usuarioBD, $claveBD, $nombreBD);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8mb4");

?>