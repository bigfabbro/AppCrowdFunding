<?php

require_once 'include.php';

class EDonazione
{
    private $id;
    private $amount; //quantità di denaro che si desidera donare
    private $date; //data relativa alla donazione
    private $reward; 
    private $idutente; //id dell'utente che effettua la donazione
    private $idcamp; //id della campagna per la quale si vuole effettuare la donazione
    private $donationoccurred; //variabile booleana posta a true nel caso in cui la donazione è andata a buon fine
    private $idcc; //carta di credito con cui si effettua la donazione


    public function __construct($amount,$date,$reward=null,$user,$idcamp,$creditcard)
    {
        $this->amount=$amount;
        $this->date=$date;
        $this->reward=$reward;
        $this->idutente=$user;
        $this->idcamp=$idcamp;
        $this->donationoccurred=false;
        $this->idcc=$creditcard;
    }
   
    public function getId()
    {
        return $this->id;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getReward()
    {
        return $this->reward;
    }

    public function getIdUtente()
    {
        return $this->idutente;
    }

    public function getIdCamp()
    {
        return $this->idcamp;
    }

    public function getCreditCard()
    {
        return $this->idcc;
    }

    public function getOcc(){
        return $this->donationoccurred;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setReward($reward)
    {
        $this->reward = $reward;
    }

    public function setIdUtente($user)
    {
        $this->idutente = $user;
    }

    public function setIdCamp($idcamp)
    {
        $this->idcamp = $idcamp;
    }


    public function setCreditCard($creditcard){
        $this->idcc= $creditcard;

    }
    
    
    /**
     *  torna un booleano se la form è valida, i paramateri vengono passati per riferimento

     */
    //validate
     
    static function valOwnername($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
    
    static function valOwnersurname($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

    static function valCcnumber($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([0-9]{16})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

    static function valExpdate($val):bool{
        $date=explode('-',$val);
        if(!checkdate($date[1],$date[2],$date[0])){
            return false;
        }
        else return true;
    } 
    
    static function valCvv($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([0-9]{3})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
    



    static function valAmount($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([0-9]{1,10})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
    


    /**
     * @access public
     * @param $donationoccurred boolean
     */
    public function setDonEffettuata($donationoccurred) {
        $this->donationoccurred=$donationoccurred;
    }


    
    public function __toString(){
        $st="Id: ".$this->getId()." Amount: ".$this->getAmount()." Data: ".$this->getData()." Reward: ".$this->getReward()."Username".$this->getUsername()."IdCamp:".$this->getIdCamp;
        return $st;
    }

    

}