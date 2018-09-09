<?php
  require_once 'include.php';
  

  if(Installation::VerifyInstallation()){ //si verifica se l'installazione è stata già fatta
    $fcontroller=new FrontController(); 
    $fcontroller->dispatch($_SERVER['REQUEST_URI']); //se è stata già fatta si invia al front controller la richiesta
  }
  /**
   * Nel caso di una richiesta AJAX fatta da uno script si invia direttamente al front controller
   * altrimenti non sarebbe verificato il requisito di installazione e non andrebbero a buon fine (possibile falla di sicurezza...)
   */
  else if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $fcontroller=new FrontController();
    $fcontroller->dispatch($_SERVER['REQUEST_URI']);
  }

  // se l'installazione non è stata già fatta viene effettuata
  else{
    Installation::begin();
  }
