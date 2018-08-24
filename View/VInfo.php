<?php

require_once 'include.php';

 
 class VInfo{

    private $smarty;

    function showInfo(){
        $this->smarty=ConfSmarty::configuration();
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        $this->smarty->assign('info', true);
        $this->smarty->display('info.tpl');
    }
 }