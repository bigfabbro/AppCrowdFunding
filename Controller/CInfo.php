<?php 

require_once 'include.php';


/**
 * La classe CInfo implementa la funzionalità riguardanti le informazioni
 * @author Gruppo 3
 * @package Controller
 */


class CInfo{
    static function Info(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
           
            $view=new VInfo();
             $view->showInfo();
        
        }
        
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }
}