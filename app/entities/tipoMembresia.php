<?php

class tipoMembresia{
    private $idTipoMembresia;
    private $nombre;
    private $beneficios;
    private $precio;
    private $duracionDias;
    private $diasAntesRecordatorio;


    public function __construct($idTipoMembresia,$nombre,$beneficios,$precio,$duracionDias,$diasAntesRecordatorio){
        $this-> idTipoMembresia = $idTipoMembresia;
        $this->nombre = $nombre;
        $this->beneficios = $beneficios;
        $this->precio = $precio;
        $this->duracionDias = $duracionDias;
        $this->diasAntesRecordatorio = $diasAntesRecordatorio;
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





}