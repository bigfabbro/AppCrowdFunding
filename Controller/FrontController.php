<?php

require_once 'include.php';

// /AppCrowdFunding/controller/function?chiave1=valore1&chiave2=valore2 ecc.

class FrontController{
    
    public function dispatch($url){
        $request = preg_split("#[][&?/]#", $url);
        var_dump($request);
        $controller="C".$request[2];
        if(class_exists($controller)){
            $function=$request[3];
            if(method_exists($controller,$function)){
                $param=array();
                for($i=4; $i<count($request); $i++){
                    $split=explode("=",str_replace("%20"," ",$request[$i]));
                    $param[$split[0]]=$split[1];
                }
                if(count($param)){
                    $controller::$function($param);
                }
                else $controller::$function();
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