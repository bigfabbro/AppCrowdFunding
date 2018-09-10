<?php

require_once 'include.php';


/**
 * La classe EDonazione contiene tutti gli attributi e metodi base riguardanti la donazione. Contiene i seguenti attributi (e i relativi metodi):
 * - id: è un identificativo autoincrement, relativo alla donazione
 * - amount: quantità di denaro che si desidera donare
 * - date: data relativa alla donazione
 * - reward: 
 * - idutente: id dell'utente che effettua la donazione
 * - idcc: carta di credito con cui si effettua la donazione
 * @author Gruppo 3
 * @package Entity
 */

class EDonazione
{   
    /** id relativo alla donazione */
    private $id;
    /** quantità di denaro che si vuole donare */
    private $amount; 
    /** data relativa alla donazione */
    private $date; 
    /** id associata alla reward */
    private $reward; 
    /** id dell'utente che effettua la donazione */
    private $idutente;
    /** id della campagna per la quale si vuole effettuare la donazione */
    private $idcamp; 
    /** booleano posto a true nel caso in cui la donazione è andata a buon fine */
    private $donationoccurred;
    /** id della carta di credito con la quale si effettua la donazione */
    private $idcc;



    public function __construct($amount, $date, $reward=null, $idutente, $idcamp, $idcc)
    {
        $this->amount=$amount;
        $this->date=$date;
        $this->reward=$reward;
        $this->idutente=$idutente;
        $this->idcamp=$idcamp;
        $this->donationoccurred=true;
        $this->idcc=$idcc;

    }
    

     /**
     * 
     * @return int l'id della donazione
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * 
     * @return float quantità di denaro che si vuole donare
     */

    public function getAmount()
    {
        return $this->amount;
    }

     /**
     * 
     * @return date data della donazione
     */


    public function getDate()
    {
        return $this->date;
    }


    /**
     * 
     * @return int id della reward
     */


    public function getReward()
    {
        return $this->reward;
    }

     /**
     * 
     * @return int id dell'utente
     */

    
    public function getIdUtente()
    {
        return $this->idutente;
    }
    
    
    /**
     * 
     * @return int id della campagna
     */
    
    public function getIdCamp()
    {
        return $this->idcamp;
    }
    
    
    /**
     * 
     * @return bool  
     */
    
    
     public function getDonationOccurred()
    {
        return $this->donationoccurred;
     }

    /**
     * 
     * @return int id della carta di credito
     */


    public function getIdCc()
    {
        return $this->idcc;
    }
    
 
    /**
     * 
     * @param int $id della donazione
     */

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * 
     * @param float $amount della donazione
     */


    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * 
     * @param data $date della donazione
     */


    public function setDate($date)
    {
        $this->date = $date;
    }

     /**
     * 
     * @param int $id della reward
     */
     

    public function setReward($reward)
    {
        $this->reward = $reward;
    }

    /**
     * 
     * @param int $id dell'utente che effettua la donazione
     */


    public function setIdUtente($user)
    {
        $this->idutente = $user;
    }


    /**
     * 
     * @param int $id della campagna di cui si effettua la donazione
     */


    public function setIdCamp($idcamp)
    {
        $this->idcamp = $idcamp;
    }
    


    /**
     * 
     * @param int $id della carta di credico con cui si effettua la donazione
     */



    public function setIdCc($idcc){
        $this->idcc= $idcc;
    }

    /**
     * 
     * @param bool $donationccourred posto a true in caso di donazione effettuata
     */



    public function setDonationOccurred($donationoccurred){
        $this->donationoccurred= $donationoccurred;
    }



    /**
     * @return bool  torna un booleano se la form è valida, i paramateri vengono passati per riferimento
     */
    



    static function valAmount($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([0-9]{1,10})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
    
    
    public function __toString(){
        $st="Id: ".$this->getId()." Amount: ".$this->getAmount()." Data: ".$this->getDate()." Reward: ".$this->getReward()."IdCamp:".$this->getIdCamp();
        return $st;
    }

    

}