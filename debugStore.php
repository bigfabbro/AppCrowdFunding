<?php
require_once 'include.php';
     $ut=new EUtente("bigfabbro93", "root", "Fabrizio", "D'Ascenzo", "bigfabbro93@gmail.com", "3312934943","Via Gabriele Morelli,12", null, "bio","registered");
     $db=FDatabase::getInstance();
     $db->store($ut);
     $ut->CreaCampagna("Campagna di prova3", "Questa e' una campagna di prova", "debug", "Italia","2018-05-01" , "2019-04-22", 1, 50000);

     
    