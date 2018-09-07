<?php 

require_once 'include.php';


/**
 * La classe CDonazione implementa la funzionalità riguardante la donazione
 * @author Gruppo 3
 * @package Controller
 */


class CErrore{

    static function NoJavascript(){
        $view= new VErrore;
        $view->showErrorPageNoJS();
    }
}