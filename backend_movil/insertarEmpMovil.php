<?php
//1.- Abrir la conexion
include '../backend/conexion.php';

//2.- Prepara la instrucción (query) para la base datos.
$query ="insert into empleado (nombre,apellido_paterno,puesto,usuario,password) values(?,?,?,?,?)";

$stmt = $mysqli->prepare($query);
$stmt->bind_param('sssss',
$_POST['nombre'],
$_POST['apellido_paterno'],
$_POST['puesto'],
$_POST['usuario'],
$_POST['password']);
//$stmt->bind_param('sssd',$nom,$ape,$pue,$sue);


// 3.- Ejecutar la instrucción
$stmt->execute();

//4.- preparar la respuesta de la base de datos.
if($stmt->affected_rows>0){        
            echo "1";
    }
           
$stmt->close();

 //5.- Cerrar la conexión de la base de datos.
 include('../backend/cerrar_conexion.php');

?>