<?php
require_once 'include.php';
class mailcheck {

    static $systemMail='societyofunding@gmail.com';
    static $path='localhost/activation';
    private $smarty;

    function __construct(){
        $this->smarty=ConfSmarty::configuration();
    }

    public function sendActivEmail($email,$user){
      $boundary=md5(uniqid(rand()));
      $mailobject="Mail di attivazione account Society of Funding";
      $pin=$this->generate5PIN();
      $this->smarty->assign('user',$user);
      $this->smarty->assign('path',static::$path);
      $this->smarty->assign('pin',$pin);
      $header = "From: ".static::$systemMail.">\n";
      $header .= "Reply-To: ".static::$systemMail.">\n";
      $header .= "CC: ".$email.">\n";
      $header .= "X-Mailer: Il nostro Php\n";
      $header .= "MIME-Version: 1.0\n";
      $header .= "Content-Type: multipart/alternative;boundary=$boundary\n";
      $message = "--".$boundary."\n";
      $message .= "Content-type: text/html;charset=iso-8859-1\n";
      $message .= "Content-Transfer-Encoding: 7bit\n\n";
      $message .=$this->smarty->fetch('mail.tpl');
      $message .= "--".$boundary."\n";
      $message .= "Content-ID:<logo>\n";
      $message .= "Content-Type:image/jpeg\n";
      $message .= "Content-Transfer-Encoding:base64\n\n";
      $allegato="imgmail1.jpg";
      $file=fopen($allegato,"rb");
      $data=fread($file,filesize($allegato));
      fclose($file);
      $data=chunk_split(base64_encode($data));
      $message .="$data\n\n";
      $message .="--".$boundary."\n";
      mail($email, $mailobject, $message, $header);
    }

    
   
    public function generate5PIN(){
        $pin="";
        for($i=0; $i<5; $i++){
            $pin=$pin.mt_rand(0, 9);
        }
        return $pin;
    }
}