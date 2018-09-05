<?php 

require_once 'include.php';


/**
 * La classe CDonazione implementa la funzionalità riguardante la donazione
 * @author Gruppo 3
 * @package Controller
 */


class CDonazione{
  /**
   * metodo che permette di effettuare la donazione
   */
     static function Make($idcamp){
     $Campagna=FCampagna::loadById($idcamp);
     /**
      * controllo se l'utente è loggato e se la campagna esiste
      */
  
     if(CUtente::isLogged() && $Campagna )
     {  if($_SERVER['REQUEST_METHOD']=="GET"){
         $view=new VDonazione();
         $view->showFormDonazione($Campagna);
    }
    else if($_SERVER['REQUEST_METHOD']=="POST"){
         CDonazione::Donation($Campagna);
         CDonazione::thanks();
        }
    
    }
    else {
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, POST');
    }
 }
 
 static function Donation($Campagna){
   $view=new VDonazione();
   if($view->valFormDonation()){
       if(CUtente::isLogged()){
         $cc=new ECartaDiCredito($_POST['ownername'],$_POST['ownersurname'],$_POST['expirationdate'],$_POST['ccnumber'],$_POST['ccv']);
         $idcc=FCartaDiCredito::store($cc);
         
         
     
         
         $idcamp=$Campagna->getId();
         $donationoccurred=true;
     
         $don=new EDonazione($_POST['amount'],date('Y-m-d'), $reward, $_SESSION['id'],$idcamp,$idcc);
         FDonazione::store($don); 
 
         
        }
      }
    else{
    $notval=$view->getNotVal();
    $view->showFormDonation($notval,$_POST);
    }
 }


 static function thanks(){
     
   $view=new VDonazione();
   $view->showGrazie();
  
  }
  
  

}
  