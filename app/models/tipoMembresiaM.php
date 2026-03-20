<?php
include('../config/conexion.php');
require_once('../entities/tipoMembresia.php');

class tipoMembresiaM {

    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerTiposMembresia() {

        $sql = "SELECT * FROM tiposmembresias ORDER BY nombre";
        $resultado = mysqli_query($this->conn, $sql);

        $tipos = [];

        while ($fila = mysqli_fetch_assoc($resultado)) {

            $tipos[] = new tipoMembresia(
                $fila['idTipoMembresia'],
                $fila['nombre'],
                $fila['beneficios'],
                $fila['precio'],
                $fila['duracionDias'],
                $fila['diasAntesRecordatorio']
            );
        }

        return $tipos;
    }

    public function crear($nombre, $beneficios, $precio, $duracion, $recordatorio) {

        $sql = "INSERT INTO tiposmembresias 
        (nombre, beneficios, precio, duracionDias, diasAntesRecordatorio)
        VALUES ('$nombre','$beneficios','$precio','$duracion','$recordatorio')";

        return mysqli_query($this->conn, $sql);
    }
}