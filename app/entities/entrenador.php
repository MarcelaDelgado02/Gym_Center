<?php

class entrenador {

    private $idEntrenador;
    private $idPersona;
    private $estado;

    public function __construct($idEntrenador, $idPersona, $estado) {
        $this->idEntrenador = $idEntrenador;
        $this->idPersona = $idPersona;
        $this->estado = $estado;
    }

    // GETTERS
    public function getIdEntrenador() { return $this->idEntrenador; }
    public function getIdPersona() { return $this->idPersona; }
    public function getEstado() { return $this->estado; }

    // SETTERS
    public function setIdEntrenador($idEntrenador) { $this->idEntrenador = $idEntrenador; }
    public function setIdPersona($idPersona) { $this->idPersona = $idPersona; }
    public function setEstado($estado) { $this->estado = $estado; }
}