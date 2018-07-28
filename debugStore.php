<?php
require_once 'include.php';
     $db=FDatabase::getInstance();
     $camp=new ECampagna(90,"campagna di prova","questa è una campagna di prova","tecnology","Italia","2018-07-22","2019-06-02","dfsfsdfsa",50000);
     echo $camp;
     $db->store($camp);
     
    