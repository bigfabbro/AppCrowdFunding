<?php

require_once 'include.php';
$db=FDatabase::getinstance();
$img=new EMediaUser("faber.jpg",51);
$t=$db->store($img);


