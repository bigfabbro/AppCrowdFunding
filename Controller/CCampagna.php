<?php 

require_once 'include.php';

class CCampagna{

/**
 * Funzione che viene richiamata per la creazione di una campagna. Si possono avere diverse situazioni:
 * - se l'utente non è loggato viene reindirizzato alla pagina di login (solo gli utenti registrati possono creare nuove campagne);
 * - se l'utente è loggato ma non ha attivato l'account viene reindirizzato alla pagina di attivazione dell'account;
 * - se l'utente è loggato e ha attivato l'account:
 *   1) se il metodo di richiesta HTTP è GET viene visualizzato il form di creazione della campagna;
 *   2) se il metodo di richiesta HTTP è POST viene richiamata la funzione Creation().
 *   3) se il metodo di richiesta HTTP è diverso da uno dei precedenti -->errore.
 */

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
        if(!CUtente::isLogged()) header('Location: /AppCrowdFunding/Utente/login');
        else{
            if(CUtente::NotActivated()) header('Location: /AppCrowdFunding/Utente/activation');
            else{
            static::Creation();
            }
        }
    }
    else {
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, POST');
    }
}

/**
 * Funzione che mostra una pagina nella quale sono elencate per ciascuna categoria le 5 campagne che hanno raccolto più fondi
 * più le ultime 5 campagne inserite, le 5 migliori del giorno e quelle più vicine alla scadenza del mese attuale.
 */

  static function CategoryPage(){
      if($_SERVER['REQUEST_METHOD']=="GET"){
        $category=array("Tecnology", "Art", "Charities", "Music","Food","Fashion","Film & Video");
        $camps=array();
        foreach($category as $cat){
            $camps[$cat]=FCampagna::Top5ByFundsPerCategory($cat);
        }
        $best=FCampagna::Best5ofToday();
        $last=FCampagna::Last5Insert();
        $exp=FCampagna::Expiring5Month();
        $view=new VCampagna();
          $view->showCategoryPage($camps,$best,$last,$exp);
      }
  }

  /**
   * Funzione che provvede alla creazione della campagna a partire dai dati inseriti nel form. Si possono avere diversi casi:
   * - se il form compilato dall'utente è corretto (viene verificato tramite il richiamo della funzione valFormCreaCampagna())
   *   si procede alla creazione della campagna i cui dati vengono quindi memorizzati nel database.
   * - se il form compilato non è corretto viene mostrato nuovamente con la segnalazione degli errori.
   */

  static function Creation(){
    $view=new VCampagna();
    $val=true;
    $notval=$view->valFormCreaCampagna();
    var_dump($notval);
    foreach($notval as $errore => $valore){
        if ($valore==true) {
            $val=false; 
            break;
        }
    }
    if($val){
            $camp= new ECampagna($_SESSION['id'],$_POST['name'],$_POST['description'],$_POST['category'],$_POST['country'],date('Y-m-d'),$_POST['enddate'],$_POST['bankcount'],$_POST['goal']);
            $idcamp=FCampagna::store($camp);
            $up=new Upload();
            $photos=$up->photoCamp($_FILES['picture'],$idcamp);
            foreach($photos as $photo){
                FMediaCamp::store($photo);
            }
            $view->showEndCreation($idcamp);
    }
    else{
      $notval=$view->getNotVal();
      $view->showFormCreation($notval,$_POST);
      
    }
  }

  /**
   * Funzione che mostra il profilo della campagna con l'id passato come parametro.
   * Nel caso non sia passato alcun parametro viene mostrata la homepage.
   * 
   * @param $id identificativo della campagna da visualizzare
   */

  static function profile($id=null){
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if(isset($id)){
            $camp=FCampagna::loadById($id);
            $user=FUtente::loadById($camp->getFounder());
            $userpic=FMediaUser::loadByIdUser($camp->getFounder());
            $donations=FDonazione::loadByIdCamp($id);
            if(date("Y-m-d")==$camp->getEndDate() || $camp->getFunds()==$camp->getGoal()) $end=true;
            else $end=false;
            if($camp && $user && $userpic){
                $view=new VCampagna();
                $view->showCampaignProfile($camp,$user,$userpic,$donations,$end);
            } 
            else header('Location: /AppCrowdFunding/HomePage');
        }
        else header('Location: /AppCrowdFunding/HomePage');
    }
    else{
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, POST');
    }
}

/**
 * Funzione che permette ad un utente loggato di commentare una campagna. (L'invio del form avviene mediante richiesta AJAX)
 */

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

/**
 * Funzione che permette ad un utente di eliminare un commento ad una campagna fatto in precedenza.
 */

  static function DeleteComment(){
      if(($_SERVER['REQUEST_METHOD']=="POST")){
          if(CUtente::isLogged()){
              $comm=FCommento::loadById($_POST['id']);
              if($comm->getUser()==$_SESSION['id']){
                FCommento::delete($_POST['id']);
              }
          }
      }
  }

/**
 * Funzione che permette ad un utente di aggiungere una reward ad una propria campagna (AJAX)
 */
  static function AddReward($idcamp){
      if(($_SERVER['REQUEST_METHOD'])=="POST"){
          $camp=FCampagna::loadById($idcamp);
          if(CUtente::islogged() && $_SESSION['id']==$camp->getFounder()){
              $rew= new EReward($_POST['name'],$_POST['amount'],$_POST['description'],$idcamp);
              FReward::store($rew);
          }
      }
  }
/**
 * Funzione che permette ad un utente di rimuovere una reward da una propria campagna (AJAX)
 */
  static function DeleteReward(){
    if(($_SERVER['REQUEST_METHOD']=="POST")){
        if(CUtente::isLogged()){
            $rew=FReward::loadById($_POST['id']);
            $camp=FCampagna::loadById($rew->getIdCamp());
            if($camp->getFounder()==$_SESSION['id']){
              FReward::delete($_POST['id']);
            }
        }
    }
}

/**
 * Funzione che permette ad un utente di eliminare una campagna (AJAX)
 */

  static function DeleteCamp(){
      if(($_SERVER['REQUEST_METHOD']=="POST")){
          if(CUtente::isLogged()){
              $camp=FCampagna::loadById($_POST['id']);
              if($camp->getFounder()==$_SESSION['id']) FCampagna::delete($_POST['id']);
            }
        }
    }

/** Metodo che viene utilizzato per verificare se l'input inserito dall'utente nel form di creazione della campagna è corretto o meno.
 *  Più precisamente viene effettuata una richiesta AJAX al server e dalla risposta si capisce se l'input è corretto o meno.
*/

  static function VerifyCreation(){
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $view=new VCampagna();
        if($view->ValCreation()) echo "true";
        else echo "false";
    }
    else{
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: POST');
    }
}
}


