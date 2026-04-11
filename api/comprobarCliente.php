<?php
    header("Content-Type: application/json");
    include("../conexion.php");

    $cedula = $_GET['numDocumento'] ?? null;

    if (!$cedula) {
        echo json_encode(["error" => "Sin cédula"]);
        exit();
    }

    $sql = "SELECT id_cliente FROM Cliente WHERE Cedula = ?";
    $params = [$cedula];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => sqlsrv_errors()]);
        exit();
    }

    $cliente = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($cliente) {
        echo json_encode($cliente);
    } else {
        echo json_encode(null);
    }
?>