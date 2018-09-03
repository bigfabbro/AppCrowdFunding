<?php

require_once "include.php";

$camp=FDonazione::loadByIdCamp(2);
var_dump($camp);
echo $camp[1]->getIdUtente();

/*If(FUtente::delete(92)) echo "SI";
else echo "NO";*/

/*if(FUtente::UpdateDatan(90,"1993-04-23")) echo "SI";
else echo "NO";*/

