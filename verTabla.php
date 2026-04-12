<?php
    class tabla
    {
        private $conn;

        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function listaOrdenes()
        {
            $sql = "SELECT OT.*, 
            V.Tipo,
            S.Nombre_servicio,
            C.Cedula
            FROM [dbo].[Orden_Trabajo] AS OT      
            LEFT JOIN [dbo].[Vehiculo] AS V ON OT.id_vehiculo = V.id_vehiculo
            LEFT JOIN [dbo].[Servicio] AS S ON OT.id_servicio = S.id_servicio
            LEFT JOIN [dbo].[Cliente] AS C ON OT.id_cliente = C.id_cliente";

            $stmt = sqlsrv_query($this->conn, $sql);

            return $stmt;
        }
    }
?>