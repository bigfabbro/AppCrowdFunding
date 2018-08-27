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
    const KEY1 = 'Campagna';
    /** Chia */
    const KEY2 = 'Utente';
    /** Valore base: Ricerca per categoria */
    const VALUE1 = 'Category';
    /** Valore avanzato: Ricerca per name */
    const VALUE2 = 'Name';
    /** */
    const VALUE3 = 'Username';

    /**
     * Metodo di 'Ricerca base' e fornisce una ricerca delle
     * campagne rispetto alla categoria. Tale ricerca puo' essere effettuata da qualsiasi utente.
     */
    static function rBase()
    {
        $vRicerca = new VRicerca();
        
        $string = $vRicerca->getValue();
        
        if($string)
        { // se l'utente ha inviato tramite GET un valore, si cerca nel DB
            $oggetto = FDatabase::getInstance()->cerca(CRicerca::KEY_DEFAULT, CRicerca::VALUE_DEFAULT, $string);
            //var_dump($string,$oggetto);
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
            { // si ricava il valore di ricerca scelto dall'utente
                $value=$vRicerca->getValueType();
                // se le chiavi corrispondono alle costanti...
                if($value == CRicerca::VALUE_DEFAULT || $value == CRicerca::VALUE_ADVANCED)
                { // si prelevano gli oggetti
                    $objects = FDatabase::getInstance()->cerca(CRicerca::KEY_DEFAULT, $value, $string);
                    $vRicerca->showSearchResult($objects, CRicerca::KEY_DEFAULT, $value, $string);
                }
                else //...altrimenti si mostra un errore
                    $vRicerca->showErrorPage('Seems like key and value are not corrected...');
            } 
            else // se una stringa non e' inserita, l'utente viene reindirizzato alla pagina della ricerca avanzata
            {
                $vRicerca->showAdvancedSearch();
            }
        }
        else // se l'utente e' guest, viene reindirizzato ad una pagina di errore
            $vRicerca->showErrorPage('Devi essere loggato per usare la ricerca avanzata!');
    }

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
            //var_dump($array1, $array2);
            $vRicerca->showResult($array1, $array2, $array3, $string);       
        }
        else // se l'utente non ha inserito nessun valore si torna alla home page
            header('Location: /AppCrowdFunding/index');
        
    }

    /**
     * Metodo di'Ricerca Avanzata' e fornisce una ricerca delle campagne per categoria o per founder
     * e una ricerca degli utenti tramite username. Tale funzione può essere effettuata solo dagli utenti
     * registrati.
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