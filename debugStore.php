<?php
require_once 'include.php';
     $ut=new EUtente("bigfabbro93", "fd22041993", "Fabrizio", "D'Ascenzo", "bigfabbro93@gmail.com", "3312934943","Via Gabriele Morelli,12", "path", "bio", "privato");
     $ut->CreaCampagna("Campagna di prova", "Questa � una campagna di prova", "debug", "Italia","2018-05-01" , "2019-04-22", "coordinate bancarie", 50000);
     $ut->CreaReward("Reward di prova", 100,"Questa � una reward di prova", "path", 20);
     
    