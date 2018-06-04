<?php
require_once 'include.php';
$db=FDatabase::getInstance();
$camp=$db->load("Campagna",3);
echo $camp."\n";
