<?php

require_once 'include.php';
$img=new EMedia("campagnaprova.jpg",20);
$db=FDatabase::getinstance();
$db->store($img);