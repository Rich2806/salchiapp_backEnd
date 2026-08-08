<?php
    include ("../backend/conexion.php");

    //2.-Prepara la instruccion para la base de datos
    $query = "select * from empleado where num_empleado = ?";
    //stmt se le conoce como statement
    $stmt = $mysqli->prepare($query);


    //sustituir los comodines por valores reales
    $stmt->bind_param("s", $_GET['num_empleado']);

    //3.- Ejecutar la instruccion
    $stmt->execute();

    //4.- preparar la respuesta de la base de datos
    $resultado = $stmt->get_result();
    
    if($resultado->num_rows > 0){
        $row = $resultado->fetch_array();
        $respuesta['contrasena'] = $row['contrasena'];
        $respuesta['id_empleado'] = $row['id_empleado'];
        $respuesta['nombre'] = $row['nombre'];
        $respuesta['puesto'] = $row['puesto'];
        echo json_encode(array($respuesta));
    }

    $stmt->close();

    include("../backend/cerrar_conexion.php");
    
?>