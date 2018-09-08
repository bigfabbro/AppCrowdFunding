<?php
  require_once 'include.php';
  

  if(Installation::VerifyInstallation()){
    $fcontroller=new FrontController();
    $fcontroller->dispatch($_SERVER['REQUEST_URI']);
  }
  else{
    Installation::Begin();
  }
