<?php

class cliente {

    private $idCliente;
    private $estado;
    private $idPersona;
    private $idUsuario;

    public function __construct($idCliente, $estado, $idPersona, $idUsuario) {
        $this->idCliente = $idCliente;
        $this->estado = $estado;
        $this->idPersona = $idPersona;
        $this->idUsuario = $idUsuario;
    }

    // GETTERS
    public function getIdCliente() { return $this->idCliente; }
    public function getEstado() { return $this->estado; }
    public function getIdPersona() { return $this->idPersona; }
    public function getIdUsuario() { return $this->idUsuario; }

    // SETTERS
    public function setIdCliente($idCliente) { $this->idCliente = $idCliente; }
    public function setEstado($estado) { $this->estado = $estado; }
    public function setIdPersona($idPersona) { $this->idPersona = $idPersona; }
    public function setIdUsuario($idUsuario) { $this->idUsuario = $idUsuario; }
}