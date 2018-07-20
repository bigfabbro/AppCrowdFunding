<?php
  require_once 'include.php';
  $url = $_SERVER['REQUEST_URI'];
  $fcontroller=new FrontController();
  $fcontroller->dispatch($url);
