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
    /** Chiave base: Ricerca di campagne */
    const KEY_DEFAULT = 'Campagna';
    /** Valore base: Ricerca per categoria */
    const VALUE_DEFAULT = 'Category';
    /** Valore avanzato: Ricerca per name */
    const VALUE_ADVANCED = 'Name';

    /**
     * Metodo di 'Ricerca base' e fornisce una ricerca delle
     * campagne rispetto alla categoria. Tale ricerca puo' essere effettuata da qualsiasi utente.
     */
    static function rBase()
    {
        $vRicerca = new VRicerca();
        
        $string = $vRicerca->getValue();
<<<<<<< HEAD
        //var_dump($string);
=======
        var_dump($string);
>>>>>>> 22f274f08d73eecabe8aba70e97de4e0c50262e2
        if($string)
        { // se l'utente ha inviato tramite GET un valore, si cerca nel DB
            $oggetto = FDatabase::getInstance()->cerca(CRicerca::KEY_DEFAULT, CRicerca::VALUE_DEFAULT, $string);
            //var_dump($oggetto);
            $vRicerca->showSearchResult($oggetto, CRicerca::KEY_DEFAULT, CRicerca::VALUE_DEFAULT, $string);
         
        }
        else
            header('Location: /AppCrowdFunding/index');
        
    }
    /**
     * Metodo di'Ricerca Avanzata' e fornisce una ricerca delle campagne per categoria o per founder
     * e una ricerca degli utenti tramite username. Tale funzione può essere effettuata solo dagli utenti
     * registrati.
     */
    static function rAvanzata()
    {
        $vRicerca = new VRicerca();
        $utente = CUtente::isLogged();
        
        if ($utente) // se l'utente è loggato 
        {   // si ricava la stringa inserita dall'utente per la ricerca
            $string = $vRicerca->getValue();
            
            if ($string) // se la stringa e' stata inserita
            { // si ricava il valore di ricerca scelti dall'utente
                list($key, $value)=$vRicerca->getValueType();
                // se i valori corrispondono alle costanti...
                if($value == CRicerca::VALUE_DEFAULT || $value == CRicerca::VALUE_ADVANCED)
                { // si prelevano gli oggetti
                    $objects = FDatabase::getInstance()->cerca($key, $value, $string);
<<<<<<< HEAD
                    //var_dump($objects, $key, $value, $string);
                    $vRicerca->showSearchResult($objects, $key, $value, $string);
=======
                    var_dump($objects, $key, $value, $string);
                    //$vRicerca->showSearchResult($objects, $key, $value, $string);
>>>>>>> 22f274f08d73eecabe8aba70e97de4e0c50262e2
                }
                else //...altrimenti si mostra un errore
                    $vRicerca->showErrorPage('Seems like  value is not corrected...');
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
