<?php
//1.- Abrir la conexion
include '../backend/conexion.php';

//2.- Prepara la instrucción (query) para la base datos.
$query ="select * from empleado where nombre=? and apellido_paterno=?";

$stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss',$_GET['nombre'],$_GET['apellido_paterno']);

// 3.- Ejecutar la instrucción
$stmt->execute();

//4.- preparar la respuesta de la base de datos.
$resultado= $stmt->get_result();
if($resultado->num_rows>0){
    $row=$resultado->fetch_assoc();
    $respuesta[]= array_map('utf8_encode',$row);
    echo json_encode($respuesta);
    
}

$stmt->close();
//5.- Cerrar la conexión de la base de datos.
$mysqli->close();

 include '../backend/cerrar_conexion.php';
?>