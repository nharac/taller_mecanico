<?php

    $serverName = "tallermecanicodata.database.windows.net"; // o IP del servidor
    $connectionOptions = [
        "Database" => "Taller_Tecnomecanica",
        "Uid" => "admin_taller4",
        "PWD" => "Hola12345"
    ];

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
?>