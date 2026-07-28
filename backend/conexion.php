<?php

/* Ricardo Antonio Gomez Corrales 6°C T/V */

$servidor = "localhost:3306";
$usuario_bd = "root";
$password_bd = "1234";
$base_dtos = "salchicorp";

$mysqli = new mysqli($servidor, $usuario_bd, $password_bd, $base_dtos);

/* Verificacion de la conexion */
if (mysqli_connect_errno()) {
    print("Fallo en la conexión");
    exit();
}
?>