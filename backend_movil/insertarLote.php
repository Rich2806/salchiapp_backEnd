<?php
//1.- Abrir la conexion
include '../backend/conexion.php';

//2.- Prepara la instrucción (query) para la base datos.
$query ="insert into Lote (num_lote,costo,cantidad,fecha_empaque,fecha_caducidad,id_insumo) values (?,?,?,?,?,?)";

$stmt = $mysqli->prepare($query);
$stmt->bind_param('sdissi',
$_POST['num_lote'],
$_POST['costo'],
$_POST['cantidad'],
$_POST['fecha_empaque'],
$_POST['fecha_caducidad'],
$_POST['id_insumo']);


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