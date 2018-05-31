<?php
  require_once 'include.php';
  $method = $_SERVER['REQUEST_METHOD'];
  $path = $_SERVER['REQUEST_URI'];
  $paths=explode("/",$path);
  array_shift($paths);
  array_shift($paths);
  $resource=array_shift($paths);
  if($resource == "login"){
    if($method=="GET") CUtente::login();
    else if($method=="POST") CUtente::EnterIn();
    else {
      header('HTTP/1.1 405 Method Not Allowed');
      header('Allow: GET, POST');
    }
  }
  else if($resource == "registration"){
    if($method=="GET") CUtente::registration();
    else if($method=="POST") CUtente::SignIn();
    else {
      header('HTTP/1.1 405 Method Not Allowed');
      header('Allow: GET, POST');
    }
  }
  else if($resource == "logout"){
    if($method=="GET") CUtente::logout();
    else if($method=="POST") CUtente::SignIn();
    else {
      header('HTTP/1.1 405 Method Not Allowed');
      header('Allow: GET, POST');
    }
  }
  else{
    if($method=="GET") CUtente::HomePage();
    else{
      header('HTTP/1.1 405 Method Not Allowed');
      header('Allow: GET, POST');
    }
  }
