<?php
require_once 'include.php';
   $db=FDatabase::getInstance();
   $camp=$db->load("Campagna",5);
   echo $camp."\n";
   $ut=new EUtente("bigfabbro93", "fd22041993", "Fabrizio", "D'Ascenzo", "bigfabbro93@gmail.com", "3312934943","Via Gabriele Morelli,12", "path", "bio", "privato");
   $ut->EliminaCampagna($camp);
   $camp=$db->load("Campagna",5);
   echo $camp."\n";
   $rew=$ut->CreaReward("Campagna di prova da cancellare ", 200, "Reward da cancellare", "path", 13);
   $rew->setId(14);
   echo $rew."\n";
   $ut->EliminaReward($rew);

