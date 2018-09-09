<?php

require_once 'include.php';

/**
 * La classe VDonazione si occupa di creare e far visualizzare la form riguardante la donazione
 * @author Gruppo 3
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
           'ccv'=>false

       );
    }

    //** Metodo che consente di visualizzare la form della donazione (fa uso di smarty) */

       function showFormDonazione($campagna){
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        $this->smarty->assign('NomeCampagna',$campagna->getName());
        $this->smarty->assign('idcamp',$campagna->getId());
        $this->smarty->assign('Founder',$campagna->getFounder());
        $this->smarty->assign('today',date('Y-m-d'));
        $this->smarty->display('donation.tpl');
    }

    //** Metodo che consente di visualizzare la form della donazione (fa uso di smarty) */

    function showGrazie(EDonazione $donazione, ECampagna $campagna, EReward $reward, EUtente $user){
        $this->smarty=ConfSmarty::configuration();
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        $this->smarty->assign('Helper',$_SESSION['username']);
        $this->smarty->assign('Campaign',$campagna->getName());
        $this->smarty->assign('Dreamer',$user->getUserName());
        $this->smarty->assign('Amount',$donazione->getAmount());
        $this->smarty->assign('Date',$donazione->getDate());
        $this->smarty->assign('Reward',$reward->getName());
        $this->smarty->assign('Description',$reward-> getDescriptionRe ());
        $this->smarty->display('grazie.tpl');
    }
    function showGrazie1(EDonazione $donazione, ECampagna $campagna, EUtente $user){
        $this->smarty=ConfSmarty::configuration();
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        $this->smarty->assign('Helper',$_SESSION['username']);
        $this->smarty->assign('Campaign',$campagna->getName());
        $this->smarty->assign('Dreamer',$user->getUserName());
        $this->smarty->assign('Amount',$donazione->getAmount());
        $this->smarty->assign('Date',$donazione->getDate());
        $this->smarty->assign('Reward', "Sorry :" );
        $this->smarty->assign('Description', "( there isn't any reward for you" );
        $this->smarty->display('grazie.tpl');
    }

    function showErroreDon(){
        $this->smarty=ConfSmarty::configuration();
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        $this->smarty->display('erroredon.tpl');
    }

    /** Funzione che verifica la correttezza del form di donazione
     * Prima si verifica se la relativa componente  dell'array $_POST è settato 
     * ed in tal caso si richiama il metodo statico presente in EDonazione  per 
     * verificare la correttezza. La funzione
     * restituisce l'array $notval che specifica per ogni campo del form se è valido o meno.
     */
    


    function valFormDonation(){

        if(isset($_POST['ownername'])){
            $this->notval['ownername']=!ECartadicredito::valOwnerName($_POST['ownername']); 
        }
        else   $this->notval['ownername']=true;

        if(isset($_POST['ownersurname'])){
            $this->notval['ownersurname']=!ECartadicredito::valOwnerSurname($_POST['ownersurname']); 
        }
        else   $this->notval['ownersurname']=true;

        if(isset($_POST['ccnumber'])){
            $this->notval['ccnumber']=!ECartadicredito::valCcNumber($_POST['ccnumber']); 
        }
        else   $this->notval['ccnumber']=true;

        if(isset($_POST['expirationdate'])){
            $this->notval['expirationdate']=!ECartadicredito::valExpirationDate($_POST['expirationdate']); 
        }
        else  $notval['expirationdate']=true;

        if(isset($_POST['ccv'])){
            $this->notval['ccv']=!ECartadicredito::valCcv($_POST['ccv']); 
        }
        else   $this->notval['ccv']=true;


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
        else if($val=="ccv") return ECartadicredito::valCcv($_POST['ccv']);
        else if($val=="expirationdate") return ECartadicredito::valExpirationDate($_POST['expirationdate']);
        else if($val=="amount") return EDonazione::valAmount($_POST['amount']);
    }
        
  
}