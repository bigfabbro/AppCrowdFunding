<?php

require_once 'include.php';

class EMediaCamp extends EMedia{
    private $idcamp;

    public function __construct($fname,$idcamp){
        parent::__construct($fname);
        $this->idcamp=$idcamp;
    }

    public function getIdCamp(){
        return $this->idcamp;
    }

    public function setIdCamp($idcamp){
        $this->idcamp=$idcamp;
    }

    public function __toString(){
        $st="Id: ".$this->getId()." filename: ".$this->getFname()." Data: ".$this->getData()." IdCamp: ".$this->getIdCamp();
        return $st;
    }


}