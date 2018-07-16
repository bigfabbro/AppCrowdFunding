<?php

require_once 'include.php';

// /Controller/function/param

class FrontController{
    
    public function dispatch($paths){
        $controller="C".$paths[2];
        if(class_exists($controller)){
            $function=$paths[3];
            if(method_exists($controller,$function)){
                if(isset($paths[4])) $controller::$function($paths[4]);
                else $controller::$function();
            }
        }
        else{
         $smarty=ConfSmarty::configuration();
         if(!CUtente::isLogged()) $smarty->display('Homepage.tpl');
         else{
         $smarty->assign('userlogged',$_SESSION['username']);
         $smarty->display('HomePage.tpl');
         }
        }
    }
}