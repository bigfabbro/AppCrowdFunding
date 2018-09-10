<?php
require_once 'include.php';

/**
 * Classe che si occupa di generare la mail per l'attivazione.
 * 
 * @package Utility
 */
class mailcheck {

    static $systemMail='societyofunding@gmail.com';
    static $path='localhost/activation';
    private $iduser;
    private $pin;

    public function __construct($id=null,$p=null){
       $this->iduser=$id;
       $this->pin=$p;
    }

    public function setIdUser($id){
        $this->iduser=$id;
    }

    public function setPin($p){
        $this->pin=$p;
    }

    public function getIdUser(){
        return $this->iduser;
    }

    public function getPin(){
        return $this->pin;
    }

    /**
     * Funzione che si occupa di generare il template della mail di attivazione con i dati dell'utente nonché di inviarla.
     * 
     * @param $email email dell'utente;
     * @param $user username dell'utente;
     * @param $iduser id dell'utente.
     */
    public function sendActivEmail($email,$user,$iduser){
      $smarty=ConfSmarty::configuration();
      $mailobject="Mail di attivazione account Society of Funding";
      $this->setIdUser($iduser);
      $this->setPin($this->generate5PIN());
      $this->smarty->assign('user',$user);
      $this->smarty->assign('path',static::$path);
      $this->smarty->assign('pin',$this->$pin);
      $message=$this->smarty->fetch('mail.tpl');
      //viene settato l'header
      $header = "From: ".static::$systemMail.">\n";
      $header .= "CC: ".$email.">\n";
      $header .= "X-Mailer: Il nostro Php\n";
      $header .= "MIME-Version: 1.0\n";
      $header .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
      $header .= "Content-Transfer-Encoding: 7bit\n\n";
      //si memorizza nel database il codice di attivazione legato all'utente
      $db=FDatabase::getInstance();
      $db->store($this);
      //viene inviata la mail
      mail($email, $mailobject, $message, $header);
    }

    /** 
     * Funzione per la generazione del pin di attivazione random
     *
     * @return $pin pin a 5 cifre per l'attivazione
     */

    public function generate5PIN(){
        $pin="";
        for($i=0; $i<5; $i++){
            $pin=$pin.mt_rand(0, 9);
        }
        return $pin;
    }


}