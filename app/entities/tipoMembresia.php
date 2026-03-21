<?php

class tipoMembresia{
    private $idTipoMembresia;
    private $nombre;
    private $beneficios;
    private $precio;
    private $duracionDias;
    private $diasAntesRecordatorio;
    private $estado;


    public function __construct($idTipoMembresia,$nombre,$beneficios,$precio,$duracionDias,$diasAntesRecordatorio,$estado ){
        $this-> idTipoMembresia = $idTipoMembresia;
        $this->nombre = $nombre;
        $this->beneficios = $beneficios;
        $this->precio = $precio;
        $this->duracionDias = $duracionDias;
        $this->diasAntesRecordatorio = $diasAntesRecordatorio;
        $this->estado = $estado;
    }

    public function getIdTipoMembresia() { return $this->idTipoMembresia; }
    public function setIdTipoMembresia($id) { $this->idTipoMembresia = $id; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getBeneficios() { return $this->beneficios; }
    public function setBeneficios($beneficios) { $this->beneficios = $beneficios; }

    public function getPrecio() { return $this->precio; }
    public function setPrecio($precio) { $this->precio = $precio; }

    public function getDuracionDias() { return $this->duracionDias; }
    public function setDuracionDias($dias) { $this->duracionDias = $dias; }

    public function getDiasAntesRecordatorio() { return $this->diasAntesRecordatorio; }
    public function setDiasAntesRecordatorio($dias) { $this->diasAntesRecordatorio = $dias; }

    public function getEstado() { return $this->estado; }
    public function setEstado($estado) { $this->estado = $estado; }



}