<?php

include ('../config/conexion.php');
include_once(__DIR__ . '/../entities/tipoMembresia.php');




class tipoMembresiaM {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerTiposMembresia() {
        $sql = "SELECT * FROM tiposmembresias ORDER BY nombre";
        $resultado = mysqli_query($this->conn, $sql);
        if (!$resultado) {
            error_log("Error en consulta: " . mysqli_error($this->conn));
            return [];
        }
        $tipos = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $tipos[] = new tipoMembresia(
                $fila['idTipoMembresia'],
                $fila['nombre'],
                $fila['beneficios'],
                $fila['precio'],
                $fila['duracionDias'],
                $fila['diasAntesRecordatorio']   // ← CORREGIDO
            );
        }
        return $tipos;
    }
}