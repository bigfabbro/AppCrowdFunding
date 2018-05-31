<?php

require_once 'include.php';

class EDonazione
{
    private $id;
    private $amount; //quantità di denaro che si desidera donare
    private $date; //data relativa alla donazione
    private $reward; 
    private $username; //username dell'utente che effettua la donazione
    private $idcamp; //id della campagna per la quale si vuole effettuare la donazione
    private $donationoccurred; //variabile booleana posta a true nel caso in cui la donazione è andata a buon fine
    private $creditcard; //carta di credito con cui si effettua la donazione


    public function __construct($amount,$date,$reward=null,$user,$idcamp,$creditcard)
    {
        $this->amount=$amount;
        $this->date=$date;
        $this->reward=$reward;
        $this->username=$user;
        $this->idcamp=$idcamp;
        $this->donationoccurred=false;
        $this->creditcard=$creditcard;
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

    public function getUsername()
    {
        return $this->user;
    }

    public function getIdCamp()
    {
        return $this->idcamp;
    }

    public function getCreditCard()
    {
        return $this->$creditcard;
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

    public function setUsername($user)
    {
        $this->iduser = $user;
    }

    public function setIdCamp($idcamp)
    {
        $this->idcamp = $idcamp;
    }


    public function setCreditCard($creditcard){
        $this->creditcard= $creditcard;

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