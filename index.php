<?php
  require_once 'include.php';
  

  if(Installation::VerifyInstallation()){
    $fcontroller=new FrontController();
    $fcontroller->dispatch($_SERVER['REQUEST_URI']);
  }
  else if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $fcontroller=new FrontController();
    $fcontroller->dispatch($_SERVER['REQUEST_URI']);
  }
  else{
    Installation::begin();
  }

 // if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
 // && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')