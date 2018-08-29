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
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        $this->smarty->assign('NomeCampagna',$campagna->getName());
        $this->smarty->assign('idcamp',$campagna->getId());
        $this->smarty->assign('info', false);
        $this->smarty->display('donation.tpl');
    }


    /** Funzione che verifica la correttezza del form di donazione
     * Prima si verifica se la relativa componente  dell'array $_POST è settato 
     * ed in tal caso si richiama il metodo statico presente in EDonazione  per 
     * verificare la correttezza. La funzione
     * restituisce l'array $notval che specifica per ogni campo del form se è valido o meno.
     */
    


    function valFormDonation(){

        if(isset($_POST['ownername'])){
            $this->notval['ownername']=!EDonazione::valOwnerName($_POST['ownername']); 
        }
        else   $this->notval['ownername']=true;

        if(isset($_POST['ownersurname'])){
            $this->notval['ownersurname']=!EDonazione::valOwnerSurname($_POST['ownersurname']); 
        }
        else   $this->notval['ownersurname']=true;

        if(isset($_POST['ccnumber'])){
            $this->notval['ccnumber']=!EDonazione::valCcNumber($_POST['ccnumber']); 
        }
        else   $this->notval['ccnumber']=true;

        if(isset($_POST['expirationdate'])){
            $this->notval['expirationdate']=!EDonazione::valExpirationDate($_POST['expirationdate']); 
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


    public function ValDonation() :bool {
        $val=key($_POST);
        if($val=="ownername") return ECartadicredito::valOwnerName($_POST['ownername']);
        else if($val=="ownersurname") return ECartadicredito::valOwnerSurname($_POST['ownersurname']);
        else if($val=="ccnumber") return ECartadicredito::valCcNumber($_POST['ccnumber']);
        else if($val=="cvv") return ECartadicredito::valCvv($_POST['cvv']);
        else if($val=="expirationdate") return ECartadicredito::valExpirationDate($_POST['expirationdate']);
        else if($val=="amount") return EDonazione::valAmount($_POST['amount']);
    }
        
  
}