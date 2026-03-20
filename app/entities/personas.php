<?php

class persona {

    private $idPersona;
    private $cedula;
    private $nombrePersona;
    private $apellidos;
    private $telefono;
    private $correo;
    private $fechaNacimiento;
    private $genero;
    private $estado;

    public function __construct($idPersona, $cedula, $nombrePersona, $apellidos, $telefono, $correo, $fechaNacimiento, $genero, $estado) {
        $this->idPersona = $idPersona;    
        $this->cedula = $cedula;
        $this->nombrePersona = $nombrePersona;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->genero = $genero;
        $this->estado = $estado;
    }

    // GETTERS
    public function getIdPersona() { return $this->idPersona; }
    public function getCedula() { return $this->cedula; }
    public function getNombrePersona() { return $this->nombrePersona; }
    public function getApellidos() { return $this->apellidos; }
    public function getTelefono() { return $this->telefono; }
    public function getCorreo() { return $this->correo; }
    public function getFechaNacimiento() { return $this->fechaNacimiento; }
    public function getGenero() { return $this->genero; }
    public function getEstado() { return $this->estado; }

    // SETTERS
    public function setIdPersona($idPersona) { $this->idPersona = $idPersona; }
    public function setCedula($cedula) { $this->cedula = $cedula; }
    public function setNombrePersona($nombrePersona) { $this->nombrePersona = $nombrePersona; }
    public function setApellidos($apellidos) { $this->apellidos = $apellidos; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setCorreo($correo) { $this->correo = $correo; }
    public function setFechaNacimiento($fechaNacimiento) { $this->fechaNacimiento = $fechaNacimiento; }
    public function setGenero($genero) { $this->genero = $genero; }
    public function setEstado($estado) { $this->estado = $estado; }
}