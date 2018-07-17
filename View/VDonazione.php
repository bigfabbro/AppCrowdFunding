<?php

require_once 'include.php';

 
 class VDonazione{

     private $smarty;
     private $notval;

     function __construct(){
        $this->smarty=ConfSmarty::configuration();

        $this->notval= array (
           'amount' => false,
           'date'=> false,
           'ownername' =>false,
           'ownersurname' =>false,
           'ccnumber' =>false,
           'expirationdate' =>false,
           'cvv'=>false

       );
    }

       function showFormDonazione($campagna){
        $this->smarty->assign('NomeCampagna',$campagna->getName());
        $this->smarty->assign('IdCampagna',$campagna->getId());
        $this->smarty->display('donation.tpl');
    }


    function createDonation(){
        if(isset($_POST['ownername']) && isset($_POST['ownersurname']) && isset($_POST['ccnumber']) && isset($_POST['expirationdate']) && isset($_POST['cvv'])&& isset($_POST['amount'])) {
            $donazione= new EDonazione ($_POST['ownername'], $_POST['ownersurname'], $_POST['ccnumber'], $_POST['expirationdate'], $_POST['cvv'], $_POST['amount']);
            return $donazione;
        }

        
        
        else
        
        return null;
    }

    /**
    *prende come parametro l'oggetto donazione e ritorna il risultato del metodo validate contenuto in EDonazione, nel frattempo aggiorna gli indici dell'array notval per la form 
     */
    function validateDonazione($donazione){
        return $donazione->validate($this->notval['ownername'], $this->notval['ownersurname'], $this->notval['ccnumber'],$this->notval['expirationdate'], $this->notval['cvv'], $this->notval['amount'] );
    }

}