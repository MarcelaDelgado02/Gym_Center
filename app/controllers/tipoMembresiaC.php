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

        $resultado = $this->model->crear($nombre, $beneficios, $precio, $duracion, $recordatorio);

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

    $resultado = $this->model->editar($id, $nombre, $beneficios, $precio, $duracion, $recordatorio);

    echo json_encode(["success" => $resultado]);
    exit;
}
}


if(isset($_POST['accion'])){
    $controller = new tipoMembresiaC();

    if($_POST['accion'] == 'crear'){
        $controller->crear();
    } elseif($_POST['accion'] == 'editar'){
        $controller->editar();  
    }
}