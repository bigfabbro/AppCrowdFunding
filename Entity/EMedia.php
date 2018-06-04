<?php

require_once 'include.php';

class EMedia {
    private $id;
    private $filename;
    private $data; //dati

    public function __construct($fname){
        $this->filename=$fname;
        $this->data=NULL;
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

    public function setData($data){
         $this->data=$data;
    }

    public function __toString(){
        $st="Id: ".$this->getId()." filename: ".$this->getFname()." Data: ".$this->getData();
        return $st;
    }


}