<?php

require_once 'include.php';

 
 class VUtente{

     private $smarty;
     private $notval;


     function __construct(){
         $this->smarty=ConfSmarty::configuration();
         $this->notval=array (
            'username' => false,
            'password' => false,
            'name'=> false,
            'surname'=> false,
            'sex'=>false,
            'email'=> false,
            'date'=>false,
            'telnumber'=> false,
            'profpic'=> false,
            'badlogin'=>false,
            'city'=>false,
            'street'=>false,
            'number'=>false,
            'country'=>false,
            'zipcode'=>false
        );
     }

     function showFormLogin(){
         $this->smarty->assign('badlogin',$this->notval['badlogin']);
         $this->smarty->display('login.tpl');
     }
     function navbar(){
         if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
     }
     function showFormRegistration($errors=null,$valori=null){
         if(isset($errors)){
             $this->smarty->assign('errors',$errors);
             $this->smarty->assign('values',$valori);
         }
         $this->smarty->display('registration.tpl');
     }

     function showWelcome(){
         $this->smarty->display('welcome.tpl');
     }

     function showActivation(){
         $this->navbar();
         $this->smarty->display('activation.tpl');
     }

     function showProfile(EUtente $user,EMediaUser $pic,$camps,$photos,EIndirizzo $address,$myProf){
        $this->navbar();
        $pic64=base64_encode($pic->getData());
        $this->smarty->assign('myProf',$myProf);
        $this->smarty->assign('photos',$photos);
        $this->smarty->assign('pic64',$pic64);
        $this->smarty->assign('camps',$camps);
        $this->smarty->assign('numcamps',count($camps));
        $this->smarty->assign('address',$address);
        $this->smarty->assign('user',$user);
        $this->smarty->display('profile.tpl');
    }

    function valFormLogin() :bool {
         if(isset($_POST['username']) && isset($_POST['password']))
         {
            if(!preg_match("/^([a-zA-Z0-9]{3,15})$/",$_POST['username'])){
                $this->notval['username']=true;
            }
            if(!preg_match('/^[a-zA-Z0-9]+$/',$_POST['password'])){
                $this->notval['password']=true;
            }
         }
         else
         {
             if(!isset($_POST['username'])) $this->notval['username']=true;
             if(!isset($_POST['password'])) $this->notval['password']=true;
         }
        if($this->notval['username']==true || $this->notval['password']==true) 
        {
           return false;
        }
        else return true;
    }

    /** Funzione che verifica la correttezza del form di registrazione.
     * Prima si verifica se la relativa componente  dell'array $_POST è settato 
     * ed in tal caso si richiama il metodo statico dell'entità corrispondente per 
     * verificare la correttezza. Per i campi non necessari (numero di telefono e foto del profilo) 
     * non è previsto che il not validate sia posto a true anche nel caso in cui non siano inseriti
     * nel form. Per i campi che devono essere univoci si verifica anche l'univocità. La funzione
     * restituisce l'array $notval che specifica per ogni campo del form se è valido o meno.
     */
    function valFormRegistration(){

        if(isset($_POST['name'])){
            $this->notval['name']=!EUtente::valName($_POST['name']); 
        }
        else   $this->notval['name']=true;

        if(isset($_POST['surname'])){
            $this->notval['surname']=!EUtente::valSurname($_POST['surname']); 
        }
        else   $this->notval['surname']=true;

        if(isset($_POST['username'])){
            if(!EUtente::valUsername($_POST['username']) || EUtente::UsernameExist($_POST['username'])){
                $this->notval['username']=true;
            }
        }
        else   $this->notval['username']=true;

        if(isset($_POST['sex'])){
            $this->notval['sex']=!EUtente::valSex($_POST['sex']); 
        }
        else  $notval['sex']=true;

        if(isset($_POST['email'])){
            if(!EUtente::valEmail($_POST['email']) || EUtente::MailExist($_POST['email'])){
                $this->notval['email']=true;
            }
        }
        else   $this->notval['email']=true;

        if(isset($_POST['telnumber'])){
            $this->notval['telnumber']=!EUtente::valTelnum($_POST['telnumber']); 
        }

        if(isset($_POST['date'])){
            $this->notval['date']=!EUtente::valDatan($_POST['date']); 
        }
        else   $this->notval['date']=true;

        if($_POST['password1']==$_POST['password2']){
            $this->notval['password']=!EUtente::valPassword($_POST['password1']);
        }
        else  $this->notval['password']=true;

        if($_FILES['upicture']['errors']!=0){
            $this->notval['upicture']=!EMediaUser::valPic($_FILES['upicture']['type']);
        }

        if(isset($_POST['city'])){
            $this->notval['city']=!EIndirizzo::valCity($_POST['city']);
        }
        else $notval['city']=true;

        if(isset($_POST['street'])){
            $this->notval['street']=!EIndirizzo::valStreet($_POST['street']);
        }
        else  $this->notval['street']=true;

        if(isset($_POST['number'])){
            $this->notval['number']=!EIndirizzo::valNumber($_POST['number']);
        }
        else  $this->notval['number']=true;

        if(isset($_POST['zipcode'])){
            $this->notval['zipcode']=!EIndirizzo::valZipcode($_POST['zipcode']);
        }
        else  $this->notval['zipcode']=true;

        if(isset($_POST['country'])){
            $this->notval['country']=!EIndirizzo::valCountry($_POST['country']);
        }
        else  $this->notval['country']=true;

        return $this->notval;
    }

    public function setBadLogin(){
        $this->notval['badlogin']=true;
    }

    function getNotVal(){
        return $this->notval;
    }
}