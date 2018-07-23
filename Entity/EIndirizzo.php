<?php

class EIndirizzo{
    private $id;
    private $city;
    private $street;
    private $number;
    private $zipcode;
    private $country;
    private $iduser;

    public function __construct($ci,$str,$num,$zc,$co,$idu=null){
        $this->city=$ci;
        $this->street=$str;
        $this->number=$num;
        $this->zipcode=$zc;
        $this->country=$co;
        $this->iduser=$idu;
    }

    public function setId($id){
        $this->id=$id;
    }
    public function setCity($ci){
        $this->city=$ci;
    }

    public function setStreet($st){
        $this->street=$st;
    }

    public function setNum($num){
        $this->number=$num;
    }

    public function setZipcode($zc){
        $this->zipcode=$zc;
    }

    public function setCountry($co){
        $this->country=$co;
    }

    public function setIdu($idu){
        $this->iduser=$idu;
    }

    public function getCity(){
        return $this->city;
    }

    public function getStreet(){
        return $this->street;
    }

    public function getNum(){
        return $this->number;
    }

    public function getZipcode(){
        return $this->zipcode;
    }

    public function getCountry(){
        return $this->country;
    }

    public function getIduser(){
        return $this->iduser;
    }
    public function getId(){
        return $this->id;
    }

    public function __toString(){
        $st="ID: ".$this->getId()." City: ".$this->getCity()." street: ".$this->getStreet()." number: ".$this->getNum();
        return $st;
    }

    static function Update($field,$val,$iduser){
        $db=FDatabase::getInstance();
        $address=$db->load('Indirizzo',$iduser);
        $db->update('Indirizzo',$address->getId(),$field,$val);
    }

    //validation

    static function valCity($val){
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{4,50})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

    static function valStreet($val){
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{4,100})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

    static function valNumber($val){
        if(!preg_match("/^([0-9]{1,4})$/",$val)){
            return false;
        }
        else return true;
    }

    static function valZipcode($val){
        if(!preg_match("/^([0-9]{4,5})$/",$val)){
            return false;
        }
        else return true;
    }

    static function valCountry($val){
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{4,100})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
}