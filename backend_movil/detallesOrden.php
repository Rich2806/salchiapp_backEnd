<?php
//1.- Abrir la conexion
include '../backend/conexion.php';

//2.- Prepara la instrucción (query) para la base datos.
$query ="SELECT i.id_insumo, i.num_insumo, i.descripcion, od.cantidad FROM orden_detalles AS od
                                                LEFT JOIN orden_salida AS o ON od.id_orden = o.id_orden
                                                RIGHT JOIN insumo AS i ON i.id_insumo = od.id_insumo WHERE o.id_orden = ?";

$stmt = $mysqli->prepare($query);

$stmt->bind_param("s", $_POST['id_orden']);
// 3.- Ejecutar la instrucción
$stmt->execute();

//4.- preparar la respuesta de la base de datos.
$resultado= $stmt->get_result();
$respuesta = array();
$i=0;
if($resultado->num_rows>0){
  while(  $row=$resultado->fetch_assoc()){  
        $respuesta[$i]= array_map('utf8_encode',$row);
        $i++;
  }
}
echo json_encode($respuesta);

//5.- Cerrar la conexión de la base de datos.
 include '../backend/cerrar_conexion.php';
?>