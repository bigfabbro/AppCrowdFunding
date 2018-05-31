<?php
require_once 'include.php';
class ECommento
{
    private $id;
    private $user;
    private $text;
    private $date;
    private $idcamp;

    public function __construct($user,$text,$date,$idcamp){
        $this->user=$user;
        $this->text=$text;
        $this->date=$date;
        $this->idcamp=$idcamp;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function getIdCamp(){
        return $this->idcamp;
    }
    
    public function setIdCamp($id){
        $this->idcamp=$id;
    }
    
    public function getUser () {
        return $this->user;
    }
    
    public function setUser ($user){
        $this->user=$user;
    }
    
    public function getText () {
        return $this->text;
    }
    
    public function setText($text){
        $this->text=$text;
    }
    
    public function getDate () {
        return $this->date;
    }
    
    public function setDate($date){
        $this->date=$date;
    }

    public function __toString(){
        $st="ID: ".$this->getId()." User: ".$this->getUser()." Text: ".$this->getText()." Date: ".$this->getDate();
        return $st;
    }
}

