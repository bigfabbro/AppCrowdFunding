<?php

require_once "include.php";


$camp=FCampagna::loadById(9);
echo $camp->getFounder();
$rew=new EReward("Contributo base",50,"Prototipo cuffie",9);
if(FReward::store($rew)) echo "si";
echo "no";

/*if(FUtente::UpdateDatan(90,"1993-04-23")) echo "SI";
else echo "NO";*/

