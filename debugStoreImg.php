<?php

require_once 'include.php';
$db=FDatabase::getinstance();
$t=$db->exist('MediaUser','id',2);
if($t) echo "si";
else echo "no";

