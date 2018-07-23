<?php

require_once 'include.php';

// /AppCrowdFunding/controller/function/parameter...

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
                    $param[]=$request[$i];
                }
                if(count($param)==1) $controller::$function($param[0]);
                else if (count($param)==2) $controller::$function($param[0],$param[1]);
                else if (count($param)==3) $controller::$function($param[0],$param[1],$param[2]);
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