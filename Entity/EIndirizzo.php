<?php

class EIndirizzo{
    private $id;
    private $city;
    private $street;
    private $number;
    private $zipcode;
    private $country;
    private $iduser;

    public function __construct($ci,$str,$num,$zc,$co,$idu){
        $this->city=$ci;
        $this->street=$str;
        $this->number=$num;
        $this->zipcode=$zc;
        $this->country=$co;
        $this->iduser=$idu;
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
}