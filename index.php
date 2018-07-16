<?php
  require_once 'include.php';
  $path = $_SERVER['REQUEST_URI'];
  $paths=explode("/",$path); 
  $fcontroller=new FrontController();
  $fcontroller->dispatch($paths);
