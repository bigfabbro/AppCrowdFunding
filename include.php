<?php

 /**
 * La funzione require_once non consente di includere più volte lo stesso file; in particolare, 
 * in caso di doppia inclusione, non consente di includere più volte lo stesso file.
 * Mentre, in caso di file non trovato, genera un parse error che interrompe l'esecuzione dello script.
 */

     
   /**
    * Inclusione del file che permette  la configurazione di Smarty
    */
    require_once 'ConfSmarty.php';
  
   /**
    * Inclusione dei file contenuti nella cartella Entity
    */
   require_once 'Entity/ECampagna.php';
   require_once 'Entity/ECartadicredito.php';
   require_once 'Entity/ECommento.php';
   require_once 'Entity/EDonazione.php';
   require_once 'Entity/EIndirizzo.php';
   require_once 'Entity/EMailCheck.php';
   require_once 'Entity/EMedia.php';
   require_once 'Entity/EMediaCamp.php';
   require_once 'Entity/EMediaUser.php';
   require_once 'Entity/EReward.php';
   require_once 'Entity/EUtente.php';
  
  
   /**
    * Inclusione dei file contenuti nella cartella Foundation
    */
   require_once 'Foundation/FCampagna.php';
   require_once 'Foundation/FCartadicredito.php';
   require_once 'Foundation/FCommento.php';
   require_once 'Foundation/FDatabase.php';
   require_once 'Foundation/FDonazione.php';
   require_once 'Foundation/FIndirizzo.php';
   require_once 'Foundation/FMailCheck.php';
   require_once 'Foundation/FMediaCamp.php';
   require_once 'Foundation/FMediaUser.php'; 
   require_once 'Foundation/FReward.php';
   require_once 'Foundation/FUtente.php';

    
   /**
    * Inclusione dei file contenuti nella cartella View
    */
   require_once 'View/VCampagna.php';
   require_once 'View/VDonazione.php';
   require_once 'View/VInfo.php';
   require_once 'View/VRicerca.php';
   require_once 'View/VUtente.php';
   require_once 'View/VErrore.php';

    
   /**
    * Inclusione dei file contenuti nella cartella Utility
    */
   require_once 'Utility/upload.php';
   require_once 'Utility/mailcheck.php';
   require_once 'Utility/Installation.php';

    
   /**
    * Inclusione dei file contenuti nella cartella Controller
    */
   require_once 'Controller/CCampagna.php';
   require_once 'Controller/CDonazione.php';
   require_once 'Controller/CInfo.php';
   require_once 'Controller/CRicerca.php';
   require_once 'Controller/CUtente.php';
   require_once 'Controller/CErrore.php';
   require_once 'Controller/FrontController.php';

   
   //in alternativa si puo' utilizzare include autoload

?>