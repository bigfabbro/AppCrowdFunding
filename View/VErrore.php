<?php

require_once 'include.php';

/**
 * La classe VDonazione si occupa di creare e far visualizzare la form riguardante la donazione
 * @author Sof
 * @package View
 */
 
 class VErrore{

    private $smarty;
    private $notval;

    function __construct(){
        $this->smarty=ConfSmarty::configuration();
    }

    public function showErrorPageNoJS(){
        $this->smarty->display('nojavascript.tpl');
    }
 }