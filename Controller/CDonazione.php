<?php 

require_once 'include.php';


/**
 * La classe CDonazione implementa la funzionalità riguardante la donazione
 * @author Sof
 * @package Controller
 */


class CDonazione{
 /**
  * metodo che permette di effettuare la donazione
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
     * metodo che crea la view, quindi richiama il metodo presente in VDonazione
     * controlla che l'oggetto sia valido;
     * se valido salvo nel db.
     */
   }
   else {
       header('HTTP/1.1 405 Method Not Allowed');
       header('Allow: GET, POST');
   }
}
  }
}