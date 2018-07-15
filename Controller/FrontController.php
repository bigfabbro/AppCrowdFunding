<?php
   
   require_once 'include.php';

   class FrontController{

    public function dispatch($resource,$method){
        if($resource == "login" && !CUtente::isLogged()){
            if($method=="GET") CUtente::login();
            else if($method=="POST") CUtente::EnterIn();
            else {
               header('HTTP/1.1 405 Method Not Allowed');
               header('Allow: GET, POST');
             }
       }
       else if($resource == "registration" && !CUtente::isLogged()){
         if($method=="GET") CUtente::registration();
         else if($method=="POST") CUtente::SignIn();
         else {
           header('HTTP/1.1 405 Method Not Allowed');
           header('Allow: GET, POST');
         }
       }
       else if($resource == "logout"){
         if($method=="GET") CUtente::logout();
         else {
           header('HTTP/1.1 405 Method Not Allowed');
           header('Allow: GET');
         }
       }
       else if($resource == "activation" && CUtente::NotActivated()){
        if($method=="GET") CUtente::activation();
        else if($method=="POST") CUtente::activate();
        else {
          header('HTTP/1.1 405 Method Not Allowed');
          header('Allow: GET, POST');
        }
      }
       else if($resource == "profile"){
         if($method=="GET"){
           if(CUtente::isLogged()) CUtente::profile();
           else header ('Location: /AppCrowdFunding/login');
         }
         else {
           header('HTTP/1.1 405 Method Not Allowed');
           header('Allow: GET, POST');
         }
       }
       else{
         CUtente::HomePage();
         }
    }
   }