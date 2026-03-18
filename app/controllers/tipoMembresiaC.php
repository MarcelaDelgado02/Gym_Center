<?php
require_once('../models/tipoMembresiaM.php');

class tipoMembresiaC {

    private $model;

    public function __construct() {
        $this->model = new tipoMembresiaM();
    }

    public function listar() {
        return $this->model->obtenerTiposMembresia();
    }

    public function crear() {
        header('Content-Type: application/json');

        $nombre = $_POST['nombre'];
        $beneficios = $_POST['beneficios'];
        $precio = $_POST['precio'];
        $duracion = $_POST['duracionDias'];
        $recordatorio = $_POST['diasAntesRecordatorio'];

        $estado = $_POST['estado'];
        $resultado = $this->model->crear($nombre, $beneficios, $precio, $duracion, $recordatorio, $estado);

        echo json_encode(["success" => $resultado]);
    }

    public function editar() {

    header('Content-Type: application/json');

    $id = $_POST['idTipoMembresia']; 
    $nombre = $_POST['nombre'];
    $beneficios = $_POST['beneficios'];
    $precio = $_POST['precio'];
    $duracion = $_POST['duracionDias'];
    $recordatorio = $_POST['diasAntesRecordatorio'];
    $estado = $_POST['estado'];

    $resultado = $this->model->editar($id, $nombre, $beneficios, $precio, $duracion, $recordatorio, $estado);
    echo json_encode(["success" => $resultado]);
    exit;
}

 public function buscarTiposMembresia() {
    header('Content-Type: application/json');
    $resultado = $this->model->buscarTiposMembresia($_POST['nombre'] ?? '');
    echo json_encode($resultado);
}
}


if (isset($_POST['accion'])) {
    $controller = new tipoMembresiaC();
    $accion = $_POST['accion'];

    // Verifica si el metodo existe en la clase antes de llamarlo
    if (method_exists($controller, $accion)) {
        $controller->$accion(); // Llama automaticamente al método
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            "success" => false,
            "error" => "Acción '$accion' no encontrada"
        ]);
    }


}