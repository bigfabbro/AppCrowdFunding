<?php

require_once 'include.php';

/**
 * La classe VDonazione si occupa di creare e far visualizzare la form riguardante la donazione
 * @author Sof
 * @package View
 */
 
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

    //** Metodo che consente di visualizzare la form della donazione (fa uso di smarty) */

       function showFormDonazione($campagna){
        $this->smarty->assign('NomeCampagna',$campagna->getName());
        $this->smarty->assign('IdCampagna',$campagna->getId());
        $this->smarty->display('donation.tpl');
    }


    function createDonation(){
        if(isset($_POST['amount']) && isset($_POST['date']) && isset($_POST['ownername']) && isset($_POST['ownersurname']) && isset($_POST['ccnumber'])&& isset($_POST['expirationdate'])&& isset($_POST['cvv'])) {
            $donazione= new EDonazione ($_POST['amount'], $_POST['date'], $_POST['ownername'], $_POST['ownersurname'], $_POST['ccnumber'], $_POST['expirationdate'], $_POST['cvv']);
            return $donazione;
        }

        
        
        else
        
        return null;
    }

    /** Funzione che verifica la correttezza del form di registrazione.
     * Prima si verifica se la relativa componente  dell'array $_POST è settato 
     * ed in tal caso si richiama il metodo statico presente in EDonazione  per 
     * verificare la correttezza. La funzione
     * restituisce l'array $notval che specifica per ogni campo del form se è valido o meno.
     */
    


    function valFormDonation(){

        if(isset($_POST['ownername'])){
            $this->notval['ownername']=!EDonazione::valOwnername($_POST['ownername']); 
        }
        else   $this->notval['ownername']=true;

        if(isset($_POST['ownersurname'])){
            $this->notval['ownersurname']=!EDonazione::valOwnersurname($_POST['ownersurname']); 
        }
        else   $this->notval['ownersurname']=true;

        if(isset($_POST['ccnumber'])){
            $this->notval['ccnumber']=!EDonazione::valCcnumber($_POST['ccnumber']); 
        }
        else   $this->notval['ccnumber']=true;

        if(isset($_POST['expirationdate'])){
            $this->notval['expirationdate']=!EDonazione::valExpdate($_POST['expirationdate']); 
        }
        else  $notval['expirationdate']=true;

        if(isset($_POST['cvv'])){
            $this->notval['cvv']=!EDonazione::valCvv($_POST['cvv']); 
        }
        else   $this->notval['cvv']=true;


        if(isset($_POST['amount'])){
            $this->notval['amount']=!EDonazione::valAmount($_POST['amount']); 
        }
        else   $this->notval['amount']=true;

        
        

        return $this->notval;
    }

}