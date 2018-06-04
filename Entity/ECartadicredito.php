<?php
  
  class ECartadicredito{

    private $id;
    private $ownername;
    private $ownersurname;
    private $expirationdate;
    private $ccnumber;
    private $ccv;

    public function __constructor($owname,$owsurname,$exdate,$ccn,$ccv){
         $this->ownername=$owname;
         $this->ownersurname=$owsurname;
         $this->expirationdate=$exdate;
         $this->ccnumber=$ccn;
         $this->ccv=$ccv;
    }

    public function getOwnname(){
        return $this->ownername;
    }

    public function getOwnsurname(){
        return $this->ownersurname;
    }

    public function getExdate(){
        return $this->expirationdate;
    }

    public function getCcnumber(){
        return $this->ccnumber;
    }

    public function getCCV(){
        return $this->ccv;
    }

    public function getId(){
        return $this->id;
    }

    public function setOwnname($name){
        $this->ownername=$name;
    }

    public function setOwnsurname($surname){
        $this->ownersurname=$surname;
    }

    public function setExdate($expdate){
        $this->expirationdate=$expdate;
    }

    public function setCcnumber($ccn){
        $this->ccnumber=$ccn;
    }

    public function setCCV($ccv){
        $this->ccv=$ccv;
    }

    public function setId($id){
        $this->id=$id;
    }

}