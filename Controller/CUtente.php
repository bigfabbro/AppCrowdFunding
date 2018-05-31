<?php

require_once 'include.php';

  class CUtente{

  static function EnterIn(){
        $view=new VUtente();
        if($view->ValFormLogin()){
           $db=FDatabase::getInstance();
           $id=$db->exist('Utente',array('username','password'),array($_POST['username'],$_POST['password']));
           if($id){
               session_start();
               $user=$db->load('Utente',$id);
               $_SESSION['id']= $user->getId();
               $_SESSION['username']=$user->getUserName();
               $_SESSION['permits']=$user->getPermits();
               $view->showHomePage();
           }
           else{
            $view->setBadLogin();
            $view->showFormLogin();
           }
        }
        else{   
            $view->setBadLogin();
            $view->showFormLogin();
        }
    }

    static function Login(){
        $view=new VUtente();
        $view->showFormLogin();
    }

    static function HomePage(){
        $view=new VUtente();
        $view->showHomePage();
    }

    static function Registration(){
        $view=new VUtente();
        $view->showFormRegistration();
    }

    static function logout(){
        session_start();
        session_unset();
        session_destroy();
        $view=new VUtente();
        $view->showHomePage();
    }

    static function isLogged(){
       if (session_status() == PHP_SESSION_NONE) {
            session_start();
       }
      if(isset($_SESSION['username'])) return true;
      else return false;
    }
  }