<?php
require_once 'include.php';
class EMediaUser extends EMedia{
    private $iduser;

    public function __construct($fname,$iduser){
        parent::__construct($fname);
        $this->iduser=$iduser;
    }

    public function getIdUser(){
        return $this->iduser;
    }

    public function setIdUser($iduser){
        $this->iduser=$iduser;
    }

    public function __toString(){
        $st="Id: ".$this->getId()." filename: ".$this->getFname()." Data: ".$this->getData()." IdUser: ".$this->getiduser();
        return $st;
    }


}