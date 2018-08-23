<?php
  require_once 'include.php';
  $db=FDatabase::getInstance();
  $ex=$db->exist('Utente',array('username','password'),array('bigfabbro93','root'));
  echo $ex;