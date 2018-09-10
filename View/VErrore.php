<?php

require_once 'include.php';

/**
 * La classe VErrore si occupa di creare e far visualizzare la form riguardante l'errore
 * @author Gruppo 3
 * @package View
 */
 
 class VErrore{

    private $smarty;
    private $notval;

    function __construct(){
        $this->smarty=ConfSmarty::configuration();
    }

    /**Permette la visualizzazione dell'errore in caso di javascript
     * disabilitato o non supportato dal browser
     */
    public function showErrorPageNoJS(){
        $this->smarty->display('nojavascript.tpl');
    }
 }