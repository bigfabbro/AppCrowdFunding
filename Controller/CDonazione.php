<?php 

require_once 'include.php';


/**
 * La classe CDonazione implementa la funzionalità riguardante la donazione
 * @author Gruppo 3
 * @package Controller
 */


class CDonazione{
  /**
   * Metodo che permette di effettuare la donazione
   */
     static function Make($idcamp){
     $Campagna=FCampagna::loadById($idcamp);
     /**
      * Controllo se l'utente è loggato, se la campagna esiste, se non è scaduta e se l'obiettivo non è stato ancora raggiunto;
      * se il server riceve una richiesta di tipo GET,
      * viene creata VDonazione e viene visualizzata la form che permette di effettuare la donazione.
      * Se, invece, il server riceve una richiesta di tipo POST, viene richiamata la funzione Donation() presente in 
      * in CDonazione e poi la funzione thanks() che permette la visualizzazione di una pagine che ringrazia 
      * l'utente per aver effettuato la donazione.
      */
      
       $oggi = date("Y-m-d");
        $dateoggi=explode("-", $oggi);
        $datescad=explode("-", $Campagna->getEndDate());
        if ($dateoggi < $datescad) $valida = true;
       else $valida= false;
        
    
    
  
     if(CUtente::isLogged() &&$Campagna  && $Campagna->getFunds()<=$Campagna->getGoal())
     {  if($_SERVER['REQUEST_METHOD']=="GET"){
         $view=new VDonazione();
         $view->showFormDonazione($Campagna);
    }
    else if($_SERVER['REQUEST_METHOD']=="POST"){
         CDonazione::Donation($Campagna);
         
        }
    
    }
    else {
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: GET, POST');
        $view=new VDonazione();
        $view->showErroreDon();
    }
 }

 
 /**La funzione Donation, dopo aver verificato che il form sia valido (valFormDonation()) e che l'utente sia loggato
  * crea nuova instanza dell'oggetto Carta di Credito, quindi la salva nel Db.
  * Analogamente, crea una nuova instanza dell'oggetto Donazione e la salva nel Db.
  * Vengono quindi aggiornati i fondi della campagna.
  */
  static function Donation($Campagna) {
   $view=new VDonazione();
   if($view->valFormDonation()){
       if(CUtente::isLogged()&& ECartadicredito::CheckScadenza($_POST['expirationdate'])){
         $cc=new ECartadicredito($_POST['ownername'],$_POST['ownersurname'],$_POST['expirationdate'],$_POST['ccnumber'],$_POST['ccv']);
         $idcc=FCartadicredito::store($cc);
         
         $idcamp=$Campagna->getId();
         $donationoccurred=true;
         $amount=$_POST['amount'];
         $rewards=$Campagna->getRew(); //richiamo il metodo contenuto in ECampagna che restituisce l'array contente le reward
         $reward=NULL; //è l'id della reward che viene effettivamente assegnata alla donazione
         $max=0; //importo della massima reward trovata
         /*per ogni reward contenuta nell'array rewards, se la donazione è maggiore del pledge
         * e se il pledge è maggiore di $max (importo della massima reward trovata)
         * allora, il donatore avrà diritto a quella reward (ricompensa)
         */
         foreach ($rewards as $rew) { 
           
           if($amount>=$rew->getPledged() && $rew->getPledged()>$max ){
           $max=$rew->getPledged();
           $reward=$rew->getId(); 
           }
        }


         $don=new EDonazione($_POST['amount'],date('Y-m-d'), $reward, $_SESSION['id'],$idcamp,$idcc);
         FDonazione::store($don); 
         CDonazione::thanks($Campagna, $don);
         FCampagna::UpdateFunds($idcamp,$Campagna->getFunds()+$_POST['amount']);
        }
      }
    else{
    $notval=$view->getNotVal();
    $view->showFormDonation($notval,$_POST);
    }
 }
 
 //** Funzione che permette la visualizzazione della pagina che ringrazia l'utente per aver effettuato la donazione */

 static function thanks($Campagna, $don){
  $view=new VDonazione();
  $user=FUtente::loadById($Campagna->getFounder());
  if($don->getReward() == NULL)
  $view->showGrazie1($don, $Campagna, $user);
  else {
    $Reward=FReward::loadById($don->getReward());
  
   
   $view->showGrazie($don, $Campagna, $Reward, $user);}
   
  
  }
  
  static function VerifyDonation(){
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $view=new VDonazione();
        if($view->ValDonation()) echo "true";
        else echo "false";
    }
    else{
        header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: POST');
    }
}
  

}
  