<?php
  require_once 'include.php';
  $methods=$_SERVER['REQUEST_METHOD'];
  if($methods=='GET')
     CUtente::Registration();
  else if($methods=='POST')
     CUtente::SignIn();