<?php
  require_once 'include.php';
  $methods=$_SERVER['REQUEST_METHOD'];
  if($methods=='GET')
     CUtente::login();
  else if($methods=='POST')
     CUtente::EnterIn();