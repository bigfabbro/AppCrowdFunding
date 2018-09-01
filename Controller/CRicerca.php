<?php
require_once 'include.php';
/**
 * La classe CRicerca implementa, appunto, la funzionalità di 'Ricerca'. La ricerca è basata sulla tecnica 
 * chiave-valore, dove le chiavi sono le risorse da ricercare e i valori sono gli indici rispetto a cui 
 * cercare. È presente una ricerca base, permessa a tutti gli utenti, e una ricerca avanzata permessa 
 * solo agli utenti registrati.
 * @author Gruppo3
 * @package Controller
 */
class CRicerca
{
    /**
     * Metodo di 'Ricerca base' e fornisce una ricerca delle
     * campagne rispetto alla categoria e nome, e una ricerca degli utenti rispetto all'username.
     *  Tale ricerca puo' essere effettuata da qualsiasi utente.
     */
    static function ricerca()
    {
        $vRicerca = new VRicerca();
        $string = $vRicerca->getValue(); //prendo la stringa inserita dall'utente
        $contatore = 0;
        if($string) // se l'utente ha inviato tramite GET un valore, si cerca nel DB
        { 
            while($contatore<3)
            {
                if($contatore==0)
                    $array1 = FDatabase::getInstance()->cerca($contatore, $string);
                else if($contatore==1)
                    $array2 = FDatabase::getInstance()->cerca($contatore, $string);
                else if($contatore==2)
                    $array3 = FDatabase::getInstance()->cerca($contatore, $string);
                $contatore++;
            }
            $vRicerca->showResult($array1, $array2, $array3, $string);       
        }
        else // se l'utente non ha inserito nessun valore si torna alla home page
            header('Location: /AppCrowdFunding/index');
        
    }

    /**
     * Metodo di'Ricerca Avanzata' fornisce una ricerca delle campagne per categoria, per nome, per country o per 
     * founder e una ricerca degli utenti tramite username. La differenza rispetto a quella base si ha che i risultati sono
     * divisi in base ai parametri di ricerca. Tale funzione può essere effettuata solo dagli utenti registrati.
     */
    static function ricercaAv()
    {
        $vRicerca = new VRicerca();
        $utente = CUtente::isLogged();
        
        if ($utente) // se l'utente è loggato 
        {   // si ricava la stringa inserita dall'utente per la ricerca
            $string = $vRicerca->getValue();
            
            if ($string) // se la stringa e' stata inserita
            { // si ricava il valore di ricerca scelto dall'utente
                list($key, $value)=$vRicerca->getKeyAndValue();
                $objects = FDatabase::getInstance()->cercaAv($key, $value, $string);
                $vRicerca->showSearchResult($objects, $key, $value, $string);
            } 
            else // se una stringa non e' inserita, l'utente viene reindirizzato alla pagina della ricerca avanzata
            {
                $vRicerca->showAdvancedSearch();
            }
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vRicerca->showErrorPage('Devi essere loggato per usare la ricerca avanzata!');
    }
}
