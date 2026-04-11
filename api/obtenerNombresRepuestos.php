<?php
    header("Content-Type: application/json");

    include("../conexion.php");

    $sql = "SELECT id_Repuesto, Nombre_Repuesto FROM Repuesto";
    $stmt = sqlsrv_query($conn, $sql);

    $repuestos = [];

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $repuestos[] = $row;
    }

    echo json_encode($repuestos);
?>