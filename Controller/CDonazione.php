<?php 

require_once 'include.php';

class CDonazione{
 /**
 * make sta per make a donation
  */
    static function Make($idcamp){
    $Campagna=FDatabase::getInstance()->load('Campagna',$idcamp);
    /**
     * controllo se l'utente è loggato e se la campagna esiste
     */
   
    if(CUtente::isLogged() && $Campagna )
    {  if($_SERVER['REQUEST_METHOD']=="GET"){
        $view=new VDonazione();
        $view->showFormDonazione($Campagna);
   }
   else if($_SERVER['REQUEST_METHOD']=="POST"){
       $view=new VDonazione();
       $view->createDonation();
       if($view->validateDonazione($donazione))
       FDatabase::getInstance()->store($donazione);
    
    /**
     * creo la view
     * richiamo il metodo crea donazione dalla view
     * controllo che l'ogg sia valido
     * se valido salvo nel db
     */
   }
   else {
       header('HTTP/1.1 405 Method Not Allowed');
       header('Allow: GET, POST');
   }
}
  }
}