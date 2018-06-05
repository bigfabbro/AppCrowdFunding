<?php

require_once 'include.php';
$db=FDatabase::getinstance();
$img=new EMediaCamp('campagnaprova.jpg',29);
$t=$db->store($img);


