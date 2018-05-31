<?php 

require_once 'include.php';

class CCampagna{

  static function Creazione(){
    $view=new VCampagna();
    if($view->valFormCreaCampagna()){
        $db=FDatabase::getInstance();
        $user=$db->load('Utente',$_SESSION['id']);
        $user->CreaCampagna($_POST['name'],$_POST['description'],$_POST['category'],$_POST['country'],$_POST['startdate'],$_POST['enddate'],$_POST['goal']); 
    }
    else{
      $view->showFormCreaCampagna($view->getNotVal());
    }
  }
}
