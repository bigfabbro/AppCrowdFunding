<?php

class EMedia {
    private $id;
    private $filename;
    private $data; //dati
    private $idcamp;

    public function __construct($fname,$idcamp){
        $this->filename=$fname;
        $this->data=NULL;
        $this->idcamp=$idcamp;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getFname(){
        return $this->filename;
    }

    public function setFname($fname){
        $this->filename=$fname;
    }

    public function getData(){
        return $this->data;
    }

    public function setData(){
         $this->data;
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