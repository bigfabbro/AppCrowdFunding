<?php
require_once 'include.php';
class EMailCheck {

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

    public function sendActivEmail($email,$user,$iduser){
      $smarty=ConfSmarty::configuration();
      $mailobject="Mail di attivazione account Society of Funding";
      $this->setIdUser($iduser);
      $this->setPin($this->generate5PIN());
      $this->smarty->assign('user',$user);
      $this->smarty->assign('path',static::$path);
      $this->smarty->assign('pin',$this->getPin());
      $message=$this->smarty->fetch('mail.tpl');
      $header = "From: ".static::$systemMail.">\n";
      $header .= "CC: ".$email.">\n";
      $header .= "X-Mailer: Il nostro Php\n";
      $header .= "MIME-Version: 1.0\n";
      $header .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
      $header .= "Content-Transfer-Encoding: 7bit\n\n";
      $db=FDatabase::getInstance();
      $db->store($this);
      mail($email, $mailobject, $message, $header);
    }

    public function VerifyCode(){
        
    }

    public function generate5PIN(){
        $pin="";
        for($i=0; $i<5; $i++){
            $pin=$pin.mt_rand(0, 9);
        }
        return $pin;
    }


}