<?php

require_once 'include.php';

/**
 * La classe VInfo si occupa di creare e far visualizzare la pagina delle info
 * @author Gruppo 3
 * @package View
 */
 
 class VInfo{

    private $smarty;

    function showInfo(){
        $this->smarty=ConfSmarty::configuration();
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        $this->smarty->display('info.tpl');
    }
 }