<?php

require_once 'include.php';

 
 class VUtente{

     private $smarty;
     private $notval;


     function __construct(){
         $this->smarty=ConfSmarty::configuration();
         $this->notval=array (
            'username' => false,
            'password' => false,
            'name'=> false,
            'surname'=> false,
            'email'=> false,
            'date'=>false,
            'telnumber'=> false,
            'profpic'=> false,
            'badlogin'=>false,
            'city'=>false,
            'street'=>false,
            'number'=>false,
            'country'=>false,
            'zipcode'=>false
        );
    }
}