<?php
    header("Content-Type: application/json");

    include("../conexion.php");

    $sql = "SELECT id_cliente FROM Cliente WHERE Cedula = ?";
    $params = array($cedula);
    
    $stmt = sqlsrv_query($conn, $sql, $params);

    if($stmt === false){
        echo json_encode(["error" => sqlsrv_errors()]);
        exit;
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)

    echo json_encode($row);
?>