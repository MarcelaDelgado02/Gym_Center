<?php

include_once(__DIR__ . '/../models/tipoMembresiaM.php');

class tipoMembresiaC {
    private $model;

    public function __construct() {
        $this->model = new tipoMembresiaM();
    }

    public function listar() {
        return $this->model->obtenerTiposMembresia();
    }
}
