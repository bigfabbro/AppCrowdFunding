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
               $_SESSION['activate']=$user->getActivate();
               if($user->getActivate()) header('Location: /AppCrowdFunding/HomePage');
               else $view->showActivation();
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

    static function activation(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
             $view=new VUtente();
              $view->showActivation();
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            CUtente::activate();
        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }

    }

    static function activate(){
        if (session_status() == PHP_SESSION_NONE) session_start();
        $view= new VUtente();
        $iduser=$_SESSION['id'];
        $pinsert=$_POST['activate'];
        $mc=new EMailCheck($iduser,$pinsert);
        if($mc->VerifyCode()) header('Location: /AppCrowdFunding/HomePage');
        else $view->showActivation();
    }

    static function Login(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            if(CUtente::isLogged()) header('Location: /AppCrowdFunding/HomePage');
            else{
                $view=new VUtente();
                $view->showFormLogin();
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            CUtente::EnterIn();
        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }

    static function Registration(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
           if(CUtente::isLogged()) header('Location: /AppCrowdFunding/HomePage');
           else{
               $view=new VUtente();
               $view->showFormRegistration();
           }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            CUtente::SignIn();
        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }

    static function profile($username=null){
        $db=FDatabase::getInstance();
        $id=null;
        $myProf=false;
        if(isset($username)){
            $id=$db->exist('Utente','username',$username);
        }
        else {
           if(CUtente::isLogged()) $id=$_SESSION['id'];
        }
        if(isset($id)){
            $photos=array();
            $user=$db->load('Utente',$id);
            $pic1=$db->load('MediaUser',$id);
            $camps=$db->loadCampByFounder($id);
            $address=$db->load('Indirizzo',$id);
            foreach($camps as $camp){
                $pics=$db->load('MediaCamp',$camp->getId());
                if(count($pics)){
                    $photos[$camp->getId()]=base64_encode($pics[0]->getData());
                }
                else $photos[$camp->getId()]=null;
            }
            if($_SESSION['id']==$id) $myProf=true;
            $view=new VUtente();
            $view->showProfile($user,$pic1,$camps,$photos,$address,$myProf);
        }
        else header('Location: /AppCrowdFunding/HomePage');
    }

    static function removeUser():bool{
        if(CUtente::isLogged()){
            $db=FDatabase::getInstance();
            if($db->delete('Utente','id',$_SESSION['id'])){
                 CUtente::logout();
                 header('Location: /AppCrowdFunding/HomePage');
            }
            else header('Location: /AppCrowdFunding/Utente/profile');
        }
        else header('Location: /AppCrowdFunding/Utente/login');
    }

    static function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /AppCrowdFunding/HomePage');
    }

    static function NotActivated(){
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        if(isset($_SESSION['activated'])&&(!$_SESSION['activated'])) return true;
        else return false;
    }

    static function isLogged(){
       if (session_status() == PHP_SESSION_NONE) {
            session_start();
       }
      if(isset($_SESSION['username'])) return true;
      else return false;
    }

    /** Funzione che dopo aver verificato il form rimanda al form di registrazione segnalando gli errori (controllo server side)
     * e reinserendo nel form i valori corretti; oppure provvede, attraverso i metodi di livello foundation, ad inserire i dati dell'utente 
     * creato nel database e invia la mail di attivazione alla mail indicata.
     */
    static function SignIn(){
        $val=true;
        $view=new VUtente();
        $notval=$view->ValFormRegistration();
        foreach($notval as $errore => $valore){
            if ($valore==true) {
                $val=false; 
                break;
            }
        }
        if(!$val) {
            $view->showFormRegistration($notval,$_POST);
        }
        else{
            $user=new EUtente($_POST['username'],$_POST['password1'],$_POST['name'],$_POST['surname'],$_POST['sex'],$_POST['date'],$_POST['email'],$_POST['telnumber'],$_POST['description']);
            $db=Fdatabase::getInstance();
            $db->store($user);
            $iduser= $db->exist('Utente','username',$user->getUserName());
            $address=new EIndirizzo($_POST['city'],$_POST['street'],$_POST['number'],$_POST['zipcode'],$_POST['country'],$iduser);
            $db->store($address);
            $up=new Upload();
            if(!$notval['profpic']){
                $picture=$up->myphoto($_FILES['upicture'],$iduser);
                $db->store($picture);
            }
            else {
                $picture=$up->standard($iduser);
                $db->store($picture);
            }
            $mail=new EMailCheck();
            if($mail->sendActivEmail($user->getEmail(),$user->getUserName())){;
                $mail->setIdUser($iduser);
                $db->store($mail);
            }
            $view->showWelcome();
        }
    }
  }