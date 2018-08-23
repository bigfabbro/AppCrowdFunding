<?php
require_once 'include.php';
     $ut=new EUtente("bigfabbro93", "root", "Fabrizio", "D'Ascenzo", "bigfabbro93@gmail.com", "3312934943","Via Gabriele Morelli,12", null, "bio","registered");
     $db=FDatabase::getInstance();
     $db->store($ut);
     $ut->CreaCampagna("Aiutiamo Luchino a viaggiare", "Per condividere con tutti gli altri segreti e curiosità dei posti visitati", "Viaggi mistici", "Italia","2018-06-05" , "2019-12-05", 1, 100000);

     
    