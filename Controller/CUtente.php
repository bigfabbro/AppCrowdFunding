<?php

require_once 'include.php';

  class CUtente{

  static function EnterIn(){
        $view=new VUtente();
         if($view->ValFormLogin()){
           $db=FDatabase::getInstance();
           $id=$db->exist('Utente',array('username','password'),array($_POST['username'],$_POST['password']));
           if($id){
            if (session_status() == PHP_SESSION_NONE) session_start();
               $user=$db->load('Utente',$id);
               $db->closeDbConnection();
               $_SESSION['id']= $user->getId();
               $_SESSION['username']=$user->getUserName();
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

    static function profile(){
        $db=FDatabase::getInstance();
        $photos=array();
        $user=$db->load('Utente',$_SESSION['id']);
        $pic1=$db->load('MediaUser',$_SESSION['id']);
        $camps=$db->loadCampByFounder($_SESSION['id']);
        foreach($camps as $camp){
            $pics=$db->load('MediaCamp',$camp->getId());
            if(count($pics)){
            $photos[$camp->getId()]=base64_encode($pics[0]->getData());
            }
            else $photos[$camp->getId()]=null;
        }
        $view=new VUtente();
        $view->showProfile($user,$pic1,$camps,$photos);
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

    static function SignIn(){
        $view=new VUtente();
        if($view->ValFormRegistration()){
            $db=FDatabase::getInstance();
            $unameval=$db->exist('Utente','username',$_POST['username']);
            $emailval=$db->exist('Utente','email',$_POST['email']);
            $numberval=$db->exist('Utente','telephon',$_POST['telephon']);
            if($unameval || $emailval || $numberval){
                echo 'errore';
                $view->showFormRegistration();
            }
            else{
                $user=new EUtente($_POST['username'],$_POST['password1'],$_POST['name'],$_POST['surname'],$_POST['date'],$_POST['email'],$_POST['telephon'],$_POST['description']);
                $db=Fdatabase::getInstance();
                $db->store($user);
                $iduser= $db->exist('Utente','username',$user->getUserName());
                $address=new EIndirizzo($_POST['city'],$_POST['street'],$_POST['number'],$_POST['zipcode'],$_POST['country'],$iduser);
                if(isset($_FILES['upicture'])){
                   $up=new Upload();
                   $up->start($_FILES['upicture']);
                   $picture=new EMediaUser($_FILES['upicture']['name'],$iduser);
                   $user->CreaUtente($address,$picture);
                }
                else $user->CreaUtente($address);
            }
            if (session_status() == PHP_SESSION_NONE) session_start();
            $_SESSION['id']= $user->getId();
            $_SESSION['username']=$user->getUserName();
            $view->showHomePage();
        }
        else $view->showFormRegistration();
    }
  }