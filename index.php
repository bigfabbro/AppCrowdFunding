<?php
  require_once 'include.php';
  $method = $_SERVER['REQUEST_METHOD'];
  $path = $_SERVER['REQUEST_URI'];
  $paths=explode("/",$path);
  $resource=$paths[2];
  $fcontroller=new FrontController();
  $fcontroller->dispatch($resource,$method);
