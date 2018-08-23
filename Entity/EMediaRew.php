<?php

require_once 'include.php';

class EMediaRew extends EMedia{
    private $idrew;

    public function __construct($fname,$idrew){
        parent::__construct($fname);
        $this->idrew=$idrew;
    }

    public function getIdRew(){
        return $this->idrew;
    }

    public function setIdRew($idrew){
        $this->idrew=$idrew;
    }

    public function __toString(){
        $st="Id: ".$this->getId()." filename: ".$this->getFname()." Data: ".$this->getData()." IdRew: ".$this->getIdRew();
        return $st;
    }


}