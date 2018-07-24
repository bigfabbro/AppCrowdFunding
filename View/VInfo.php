<?php

require_once 'include.php';

 
 class VInfo{

    private $smarty;

    function showInfo(){
        $this->smarty=ConfSmarty::configuration();
        $this->smarty->display('info.tpl');
    }
 }