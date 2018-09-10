<?php 

require_once 'include.php';


/**
 * La classe CErrore implementa la funzionalità riguardanti l'errore
 * @author Gruppo 3
 * @package Controller
 */


class CErrore{

    static function NoJavascript(){
        $view= new VErrore;
        $view->showErrorPageNoJS();
    }
}