<?php
require_once 'include.php';

/**
 * La classe VRicerca si occupa dell'input-output per quanto riguarda la funzionalità 'Ricerca'.
 * @author Gruppo3
 * @package View
 */
class VRicerca 
{
    function __construct()
    {
        $this->smarty=ConfSmarty::configuration();
        // l'array è istanziato con indici i campi delle varie form, i cui valori sono di default a false (no errori)
    }
    
    /**
     * Restituisce il valore inserito dall'utente nella barra da ricerca. E' contenuto 
     * nell'array globale $_GET
     * @return string contenente il valore inserito dall'utente, se presente
     */
    function getValue() : string 
    {
        $string ="";
        if(isset($_GET['str']))
        { // se l'utente ha inviato tramite GET un valore di ricerca, si ricava la stringa
            $string = $_GET['str'];
        }
        return $string;
    }
    
    /**
     * Ritorna la coppia chiave-valore scelta dall'utente nella ricerca avanzata. Tale coppia 
     * e' contenuta nell'array globale $_GET.
     * @return array avente come valori la chiave e il valore
     */
    function getValueType() : string
    {
        $value="";
        
        if($_GET['value'] == 'category' || $_GET['value'] == 'name')
            $value = ucfirst($_GET['value']);
                
        return $value;
    }
    
    /**
     * Mostra i risultati della ricerca
     * @param EUser $user l'utente della sessione
     * @param array $array contenente i risultati della ricerca | NULL se nessun oggetto e' stato costruito
     * @param string $key la chiave di ricerca adoperata
     * @param string $value il valore di ricerca adoperato
     * @param string $string il dato ricercato dall'utente
     */
    function showSearchResult($array, string $key, string $value, string $string)
    {
        $this->smarty->assign('key', $key);
        $this->smarty->assign('value', $value);
        $this->smarty->assign('string', $string);
        
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
  
        $this->smarty->assign('array', $array);
        
        //mostro il contenuto della pagine
        $this->smarty->display('risultati.tpl');
    }
     
    function showAdvancedSearch()
    {
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        
        //mostro il contenuto della pagine
        $this->smarty->display('ricercaAv.tpl');
    }

    function getKeyAndValue() : array
    {
        $key="";
        $value="";
        
        if($_GET['value'] == 'name' || $_GET['value'] == 'category' || $_GET['value'] == 'username')
            $value = ucfirst($_GET['value']);
        if($_GET['key'] == 'utente' || $_GET['key'] == 'campagna')
            $key = ucfirst($_GET['key']);
                
        return array($key, $value);
    }

    function showResult($array1, $array2, $array3, string $string)
    {
        $this->smarty->assign('string', $string);
        
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
  
        $this->smarty->assign('array1', $array1);
        $this->smarty->assign('array2', $array2);
        $this->smarty->assign('array3', $array3);
        
        //mostro il contenuto della pagine
        $this->smarty->display('ricerca.tpl');
    }

    function showErrorPage(string $str){

        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);

        $this->smarty->assign('messaggio', $str);
        
        //mostro il contenuto della pagine
        $this->smarty->display('errore.tpl');
    }

}

