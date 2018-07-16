<?php
require_once 'include.php';
 $db=FDatabase::getInstance();
 $address=$db->load('Indirizzo',6);
 echo $address;