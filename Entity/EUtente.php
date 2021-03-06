<?php

require_once 'include.php';

/**
 * La classe EUtente contiene tutti gli attributi e metodi base riguardanti gli utenti. 
 * Contiene i seguenti attributi (e i relativi metodi):
 * -id: è un identificativo autoincrement, relativo al'utente;
 * -username: username account utente;
 * -password: password account;
 * -name: nome dell'utente;
 * -surname: cognome dell'utente;
 * -sex: sesso utente;
 * -datan: data di nascità utente;
 * -email: email utente;
 * -telnumber: numero cell utente;
 * -bio: breve descrizione utente;
 * -activate: account attivo o no.
 *  @author Gruppo 3
 *  @package Entity
 */ 
class EUtente
{
    /** id utente */
    private $id;
    /** username */
    private $username;
    /** password account */
    private $password;
    /** nome utente */
    private $name;
    /** cognome utente */
    private $surname;
    /** sesso utente */
    private $sex;
    /** data nascità utente */
    private $datan;
    /** email utente */
    private $email;
    /** cell utente */
    private $telnumber;
    /** descrizione utente */
    private $bio;
    /** stato account */
    private $activate;
    /** costruttore */
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
    /**
     * @return int id utente
     */
    public function getId(){
        return $this->id;
    }
    /**
     * @return string nome utente
     */
    public function getName(){
        return $this->name;
    }
    /**
     * @return string cognome utente
     */
    public function getSurname(){
        return $this->surname;
    }
    /**
     * @return string sesso
     */
    public function getSex(){
        return $this->sex;
    }
    /**
     * @return string username
     */
    public function getUserName(){
        return $this->username;
    }
    /**
     * @return string password
     */
    public function getPass(){
        return $this->password;
    }
    /**
     * @return date data nascità
     */
    public function getDatan(){
        return $this->datan;
    }
    /**
     * @return string email
     */
    public function getEmail(){
        return $this->email;
    }
    /**
     * @return string cell
     */
    public function getTel(){
        return $this->telnumber;
    }
    /**
     * @return string bio
     */
    public function getBio(){
        return $this->bio;
    }
    /**
     * @return int stato account
     */   
    public function getActivate(){
        return $this->activate;
    }
    /**
     * @param int $id utente
     */
    public function setId($id){
        $this->id=$id;
    }
    /**
     * @param string $un username
     */
    public function setUserName($un){
        $this->username=$un;
    }
    /**
     * @param string $pass password
     */
    public function setPass($pass){
        $this->password=$pass;
    }
    /**
     * @param date $dt data nascità
     */
    public function setDatan($dt){
        $this->datan=$dt;
    }
    /**
     * @param string $se sesso
     */
    public function setSex($se){
        $this->sex=$se;
    }
    /**
     * @param string $em email
     */
    public function setEmail($em){
        $this->email=$em;
    }
    /**
     * @param string $tel cell
     */
    public function setTel($tel){
        $this->telnumber=$tel;
    }
    /**
     * @param string $name nome 
     */
    public function setName($name){
        $this->name=$name;
    }
    /**
     * @param string $surname cognome
     */
    public function setSurname($surname){
        $this->surname=$surname;
    }
    /**
     * @param string $b descrizione
     */ 
    public function setBio($b){
        $this->bio=$b;
    }
    /**
     * @param int $act attivazione
     */
    public function setActivate($act){
        $this->activate=$act;
    }
    /**
     * Aggiorna
     * @param
     * @param 
     * @param
     */
    static function Update($field,$val,$id){
        $db=FDatabase::getInstance();
        $db->update('Utente',$id,$field,$val);
    }

    /********************validation**************************/
    
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valName($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
    
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valSurname($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valUsername($val):bool{
        if(!preg_match("/^([a-zA-Z0-9_]{3,30})$/",$val)){
            return false;
           }
        return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valPassword($val):bool{
        if(!preg_match("/^([a-zA-Z0-9_]{8,30})$/",$val)){
            return false;
           }
        return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valSex($val):bool{
        if(!($val=="m" || $val=="M" || $val=="F" || $val=="f")){
            return false;
           }
        return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valDatan($val):bool{
        $date=explode('-',$val);
        if(!checkdate($date[1],$date[2],$date[0])){
            return false;
        }
        else return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valEmail($val):bool{
        if(filter_var($val, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function valTelnum($val):bool{
        if(!preg_match("/^([0-9]{0,10})$/",$val)){
            return false;
        }
        else return true;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function UsernameExist($val):bool{
        $db=FDatabase::getInstance();
        if($db->exist('Utente','username',$val)) return true;
        else return false;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    static function MailExist($val):bool{
        $db=FDatabase::getInstance();
        if($db->exist('Utente','email',$val)) return true;
        else return false;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     */
    public function __toString(){
        $st="Nome: ".$this->name." Cognome: ".$this->surname." Username: ".$this->username;
        return $st;
    }
}




