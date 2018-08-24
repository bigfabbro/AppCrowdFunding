<?php

require_once 'include.php';

class EUtente
{
    private $id;
    private $username;
    private $password;
    private $name;
    private $surname;
    private $sex;
    private $datan;
    private $email;
    private $telnumber;
    private $bio;
    private $activate;
    
    public function __construct($un=null,$pass=null,$name=null,$surname=null,$se=null,$dt=null,$em=null,$tel=null,$b=null){
        $this->username=$un;
        $this->password=$pass;
        $this->name=$name;
        $this->surname=$surname;
        $this->sex=$se;
        $this->datan=$dt;
        $this->email=$em;
        $this->telnumber=$tel;
        $this->bio=$b;
        $this->activate=false;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    
    public function getSurname(){
        return $this->surname;
    }

    public function getSex(){
        return $this->sex;
    }
   
    public function getUserName(){
        return $this->username;
    }
    
    public function getPass(){
        return $this->password;
    }

    public function getDatan(){
        return $this->datan;
    }
    
    public function getEmail(){
        return $this->email;
    }

    
    public function getTel(){
        return $this->telnumber;
    }
        
    public function getBio(){
        return $this->bio;
    }
          
    public function getActivate(){
        return $this->activate;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setUserName($un){
        $this->username=$un;
    }
    
    public function setPass($pass){
        $this->password=$pass;
    }

    public function setDatan($dt){
        $this->datan=$dt;
    }

    public function setSex($se){
        $this->sex=$se;
    }
    
    public function setEmail($em){
        $this->email=$em;
    }
    
    public function setTel($tel){
        $this->telnumber=$tel;
    }
    
    public function setName($name){
        $this->name=$name;
    }
    
    public function setSurname($surname){
        $this->surname=$surname;
    }
        
    public function setBio($b){
        $this->bio=$b;
    }

    public function setActivate($act){
        $this->activate=$act;
    }

    static function Update($field,$val,$id){
        $db=FDatabase::getInstance();
        $db->update('Utente',$id,$field,$val);
    }

    //validation
    
    static function valName($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
    
    static function valSurname($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

    static function valUsername($val):bool{
        if(!preg_match("/^([a-zA-Z0-9_]{3,30})$/",$val)){
            return false;
           }
        return true;
    }

    static function valPassword($val):bool{
        if(!preg_match("/^([a-zA-Z0-9_]{8,30})$/",$val)){
            return false;
           }
        return true;
    }
    
    static function valSex($val):bool{
        if(!($val=="m" || $val=="M" || $val=="F" || $val=="f")){
            return false;
           }
        return true;
    }

    static function valDatan($val):bool{
        $date=explode('-',$val);
        if(!checkdate($date[1],$date[2],$date[0])){
            return false;
        }
        else return true;
    }

    static function valEmail($val):bool{
        if(filter_var($val, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }

    static function valTelnum($val):bool{
        if(!preg_match("/^([0-9]{0,10})$/",$val)){
            return false;
        }
        else return true;
    }

    static function UsernameExist($val):bool{
        $db=FDatabase::getInstance();
        if($db->exist('Utente','username',$val)) return true;
        else return false;
    }

    static function MailExist($val):bool{
        $db=FDatabase::getInstance();
        if($db->exist('Utente','email',$val)) return true;
        else return false;
    }

    public function __toString(){
        $st="Nome: ".$this->name." Cognome: ".$this->surname." Username: ".$this->username;
        return $st;
    }
}




