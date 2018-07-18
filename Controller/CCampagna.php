<?php 

require_once 'include.php';

class CCampagna{



  static function StartProject(){
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if(!CUtente::isLogged()) header('Location: /AppCrowdFunding/Utente/login');
        else{
            if(CUtente::NotActivated()) header('Location: /AppCrowdFunding/Utente/activation');
            else{
            $view=new VCampagna();
            $view->showFormCreation();
            }
        }
    }
    else if($_SERVER['REQUEST_METHOD']=="POST"){
           CCampagna::Creation();
    }
    else {
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, POST');
    }
}

  static function Creation(){
    $view=new VCampagna();
    if($view->valFormCreaCampagna()){
        $db=FDatabase::getInstance();
        CUtente::isLogged();
        $user=$db->load('Utente',$_SESSION['id']);
        $idcamp=$user->CreaCampagna($_POST['name'],$_POST['description'],$_POST['category'],$_POST['country'],date('Y-m-d'),$_POST['enddate'],$_POST['bankcount'],$_POST['goal']); 
        $up=new Upload();
        $photos=$up->photoCamp($_FILES['picture'],$idcamp);
        foreach($photos as $photo){
            $db->store($photo);
        }
    }
    else{
      $notval=$view->getNotVal();
      foreach($notval as $errore =>$valore){
          echo $errore."=".$valore." ";
      }
      $view->showFormCreation($notval,$_POST);
      
    }
  }
}
