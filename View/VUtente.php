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
         $this->navbar();
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
         $this->smarty->display('activation.tpl');
     }

     function showProfile(EUtente $user,EMediaUser $pic,$camps,$photos,EIndirizzo $address){
        $this->navbar();
        $pic64=base64_encode($pic->getData());
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
        else {return true;}
    }

    function valFormRegistration(){
        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['date']) && isset($_POST['city']) && isset($_POST['street']) && isset($_POST['zipcode']) && isset($_POST['country']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2']))
        {
           $replace=array(" ","'");
           if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$_POST['name']))){
               $this->notval['name']=true;
           }
           if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$_POST['surname']))){
            $this->notval['surname']=true;
           }
           $date=explode('-',$_POST['date']);
           if(!checkdate($date[1],$date[2],$date[0])){
            $this->notval['date']=true;
           }
           if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$_POST['city']))){
            $this->notval['city']=true;
           }
           if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$_POST['street']))){
            $this->notval['street']=true;
           }
           if(!preg_match("/^([0-9]{0,3})$/",$_POST['number'])){
            $this->notval['number']=true;
           }
           if(!preg_match("/^([0-9]{5})$/",$_POST['zipcode'])){
            $this->notval['zipcode']=true;
           }
           if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$_POST['country']))){
            $this->notval['country']=true;
           }
           if(isset($_POST['telephon'])){
            if(!preg_match("/^([0-9]{9,10})$/",$_POST['telephon'])){
             $this->notval['telnumber']=true;
            }
           }
           if(!preg_match("/^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/",$_POST['email'])){
            $this->notval['email']=true;
           }
           if(!preg_match("/^([a-zA-Z0-9_]{3,30})$/",$_POST['username'])){
            $this->notval['username']=true;
           }
           if(!preg_match("/^([a-zA-Z0-9_]{8,30})$/",$_POST['password1'])){
            $this->notval['password']=true;
           }
           if(!preg_match("/^([a-zA-Z0-9_]{8,30})$/",$_POST['password2'])){
            $this->notval['password']=true;
           }
           if(!($_POST['password1']==$_POST['password2'])){
            $this->notval['password']=true;
           }
           if(isset($_FILES['upicture'])){
              if(!($_FILES['upicture']['type']=='image/png' || $_FILES['upicture']['type']=='image/jpeg')){
                $this->notval['profpic']=true;
              }
            }
            else $this->notaval['profpic']=true;
        }
        else
        {
            if(!isset($_POST['name'])) $this->notval['name']=true;
            if(!isset($_POST['surname'])) $this->notval['surname']=true;
            if(!isset($_POST['date'])) $this->notval['date']=true;
            if(!isset($_POST['city'])) $this->notval['city']=true;
            if(!isset($_POST['street'])) $this->notval['street']=true;
            if(!isset($_POST['zipcode'])) $this->notval['zipcode']=true;
            if(!isset($_POST['country'])) $this->notval['country']=true;
            if(!isset($_POST['email'])) $this->notval['email']=true;
            if(!isset($_POST['username'])) $this->notval['username']=true;
            if(!isset($_POST['password1'])|| !isset($_POST['password2'])) $this->notval['password']=true;
        }
          return $this->notval;
    }

    public function setBadLogin(){
        $this->notval['badlogin']=true;
    }

    function getNotVal(){
        return $this->notval;
    }
}