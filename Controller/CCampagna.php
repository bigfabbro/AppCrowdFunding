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
        if(CUtente::isLogged()){
            $camp= new ECampagna($_SESSION['id'],$_POST['name'],$_POST['description'],$_POST['category'],$_POST['country'],date('Y-m-d'),$_POST['enddate'],$_POST['bankcount'],$_POST['goal']);
            $idcamp=FCampagna::store($camp);
            $up=new Upload();
            $photos=$up->photoCamp($_FILES['picture'],$idcamp);
            echo $camp;
            foreach($photos as $photo){
                FMediaCamp::store($photo);
            }
        }
    }
    else{
      $notval=$view->getNotVal();
      $view->showFormCreation($notval,$_POST);
      
    }
  }

  static function profile($id=null){
    if(isset($id)){
        $camp=FCampagna::loadById($id);
        $user=FUtente::loadById($camp->getFounder());
        $userpic=FMediaUser::loadByIdUser($camp->getFounder());
        if($camp && $user && $userpic){
            $view=new VCampagna();
            $view->showCampaignProfile($camp,$user,$userpic);
        } 
        else header('Location: /AppCrowdFunding/HomePage');
    }
    else header('Location: /AppCrowdFunding/HomePage');
  }

  static function Comment(){
    if(($_SERVER['REQUEST_METHOD']=="POST")){
        if(CUtente::isLogged()){
           $comm= new ECommento($_SESSION['id'],$_POST['text'],date('Y-m-d'),$_POST['idcamp']);
           FCommento::store($comm);
        }
    }
    else{
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: POST');
    }
  }

  static function DeleteComment(){
      if(($_SERVER['REQUEST_METHOD']=="POST")){
          if(CUtente::isLogged()){
              
          }
      }
  }
}


