<?php
require_once 'include.php';
$db=FDatabase::getInstance();
$camp=$db->load("Campagna",20);
echo $camp."\n";
