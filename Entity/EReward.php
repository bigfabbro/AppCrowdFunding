<?php
require 'include.php';


class EReward
{   
    /**id relativa alla reward */
    private $id;
    /**nome della reward */
    private $namereward;
    /**donazione minima affinche si riceva un reward*/
    private $pledged; 
    /** descrizione del reward*/
    private $descriptionrew; 
    /**id della campagna alla quale è associata la reward */
    private $idcamp;
    
    public function __construct($nare, $ple, $der,$idcamp){
        $this->namereward=$nare;
        $this->pledged=$ple;
        $this->descriptionrew=$der;
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
    
    public function getName () {
        return $this->namereward;
    }
    
    public function setName ($nare){
        $this->namereward=$nare;
    }
    
    public function getPledged () {
        return $this->pledged;
    }
    
    public function setPledged ($ple){
        $this->pledged=$ple;
    }
    
    public function getDescriptionRe () {
        return $this->descriptionrew;
    }
    
    public function setDescriptionRe ($der){
        $this->descriptionre=$der;
    }
    
    public function __toString(){
        $st="ID: ".$this->getId()." Name: ".$this->getName()." Description: ".$this->getDescriptionRe()." Pledged: ".$this->getPledged();
        return $st;
    }
}

