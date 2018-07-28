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
          $db=FDatabase::getInstance();
          if($db->exist('Campagna','id',$id)){
              $camp=$db->load('Campagna',$id);
              $medias=$db->load('MediaCamp',$id);
              $donations=$db->load('Donazione',$id,'idutente');
          }
      }
  }
}


