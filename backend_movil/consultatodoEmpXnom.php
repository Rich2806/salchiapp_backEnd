<?php
//1.- Abrir la conexion
include '../backend/conexion.php';

//2.- Prepara la instrucción (query) para la base datos.
$query ="select nombre,apellido_paterno,puesto from empleado where nombre like '".$_GET['nombre']."%'";

$stmt = $mysqli->prepare($query);

// 3.- Ejecutar la instrucción
$stmt->execute();

//4.- preparar la respuesta de la base de datos.
$resultado= $stmt->get_result();
$i=0;
if($resultado->num_rows>0){
  while(  $row=$resultado->fetch_assoc()){  
        $respuesta[$i]= array_map('utf8_encode',$row);
        $i++;
  }
  echo json_encode($respuesta);
}

$stmt->close();

//5.- Cerrar la conexión de la base de datos.
include '../backend/cerrar_conexion.php';
?>