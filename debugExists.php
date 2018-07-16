<?php
  require_once 'include.php';
  $db=FDatabase::getInstance();
  $ex=$db->exist('Utente','username','bigfabbro93');
  echo $ex;