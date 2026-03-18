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

        $sql = "SELECT * FROM ttiposmembresias WHERE estado = 1";
        $resultado = mysqli_query($this->conn, $sql);

        $tipos = [];

        while ($fila = mysqli_fetch_assoc($resultado)) {

            $tipos[] = new tipoMembresia(
                $fila['idTipoMembresia'],
                $fila['nombre'],
                $fila['beneficios'],
                $fila['precio'],
                $fila['duracionDias'],
                $fila['diasAntesRecordatorio'],
                $fila['estado']
            );
        }

        return $tipos;
    }

    public function crear($nombre, $beneficios, $precio, $duracion, $recordatorio,$estado) {

       $sql = "INSERT INTO ttiposmembresias 
        (nombre, beneficios, precio, duracionDias, diasAntesRecordatorio, estado)
        VALUES ('$nombre','$beneficios','$precio','$duracion','$recordatorio','$estado')";

        return mysqli_query($this->conn, $sql);
    }

   public function editar($id, $nombre, $beneficios, $precio, $duracion, $recordatorio, $estado) {

    $sql = "UPDATE ttiposmembresias SET 
        nombre = '$nombre',
        beneficios = '$beneficios',
        precio = '$precio',
        duracionDias = '$duracion',
        diasAntesRecordatorio = '$recordatorio',
        estado = '$estado'
    WHERE idTipoMembresia = $id";

    return mysqli_query($this->conn, $sql);
}

    public function buscarTiposMembresia($nombre) {
    $termino = "%$nombre%";

    
    $sql = "SELECT * FROM ttiposmembresias WHERE nombre LIKE ?";
    $stmt = mysqli_prepare($this->conn, $sql);
    if (!$stmt) {
        die("Error en la preparación: " . mysqli_error($this->conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $termino); // pasamos termino de manera segura
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    $tipos = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $tipos[] = new tipoMembresia(
        $fila['idTipoMembresia'],
        $fila['nombre'],
        $fila['beneficios'],
        $fila['precio'],
        $fila['duracionDias'],
        $fila['diasAntesRecordatorio'],
        $fila['estado']
    );
       
    }

    mysqli_stmt_close($stmt);

    return $tipos;

}

    public function eliminar($id) {

    $sql = "UPDATE ttiposmembresias 
            SET estado = 2 
            WHERE idTipoMembresia = $id";

    return mysqli_query($this->conn, $sql);
}
    
}