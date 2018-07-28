<?php
require_once 'include.php';
FIndirizzo::UpdateCity(40,"Teramum");
$camps=FIndirizzo::loadByIdUser(90);
var_dump($camps);