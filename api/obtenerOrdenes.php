<?php
    header("Content-Type: application/json");
    include("../conexion/conexion.php");
    include("../verTabla.php");

    $obj = new tabla($conn);
    $stmt = $obj->listaOrdenes();

    $ordenes = [];

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if($row['estado'] == "Por Hacer" || $row['estado'] == "En Proceso"){
            $ordenes[] = $row;

        }
    }

    echo json_encode($ordenes);
?>