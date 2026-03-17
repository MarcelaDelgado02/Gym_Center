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

        $nombre = $_POST['nombre'];
        $beneficios = $_POST['beneficios'];
        $precio = $_POST['precio'];
        $duracion = $_POST['duracionDias'];
        $recordatorio = $_POST['diasAntesRecordatorio'];

        $resultado = $this->model->crear($nombre, $beneficios, $precio, $duracion, $recordatorio);

        echo json_encode(["success" => $resultado]);
    }
}


if(isset($_POST['accion'])){

    $controller = new tipoMembresiaC();

    if($_POST['accion'] == 'crear'){
        $controller->crear();
    }
}