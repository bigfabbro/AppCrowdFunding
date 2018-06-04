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
            'telnumber'=> false,
            'address'=> false,
            'profpic'=> false,
            'bio'=> false,
            'tipo'=> false,
            'badlogin'=>false
        );
     }

     function showFormLogin(){
         $this->smarty->assign('badlogin',$this->notval['badlogin']);
         $this->smarty->display('login.tpl');
     }
     function navbar(){
         if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
     }
     function showFormRegistration(){
         $this->navbar();
         $this->smarty->display('registration.tpl');
     }

     function showHomePage(){
         if(!CUtente::isLogged()) $this->smarty->display('Homepage.tpl');
         else{
         $this->navbar();
         $this->smarty->assign('permits',$_SESSION['permits']);
         $this->smarty->display('HomePage.tpl');
         }
     }

     function showProfile(EUtente $user,EMediaUser $pic){
        $this->navbar();
        $pic64=base64_encode($pic->getData());
        $this->smarty->assign('pic64',$pic64);
        $this->smarty->registerObject('user',$user);
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

    public function setBadLogin(){
        $this->notval['badlogin']=true;
    }

    function getNotVal(){
        return $this->notval;
    }
}