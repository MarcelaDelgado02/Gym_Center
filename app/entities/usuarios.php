<?php

class usuario {

    private $idUsuario;
    private $nombreUsuario;
    private $contrasenaHash;
    private $rol;
    private $idPersona;

    public function __construct($idUsuario, $nombreUsuario, $contrasenaHash, $rol, $idPersona) {
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasenaHash = $contrasenaHash;
        $this->rol = $rol;
        $this->idPersona = $idPersona;
    }

    // GETTERS
    public function getIdUsuario() { return $this->idUsuario; }
    public function getNombreUsuario() { return $this->nombreUsuario; }
    public function getContrasenaHash() { return $this->contrasenaHash; }
    public function getRol() { return $this->rol; }
    public function getIdPersona() { return $this->idPersona; }

    // SETTERS
    public function setIdUsuario($idUsuario) { $this->idUsuario = $idUsuario; }
    public function setNombreUsuario($nombreUsuario) { $this->nombreUsuario = $nombreUsuario; }
    public function setContrasenaHash($contrasenaHash) { $this->contrasenaHash = $contrasenaHash; }
    public function setRol($rol) { $this->rol = $rol; }
    public function setIdPersona($idPersona) { $this->idPersona = $idPersona; }
}