<?php

require_once "include.php";

$camp=FCampagna::Top5ByFundsPerCategory('Tecnology');
var_dump($camp);

/*If(FUtente::delete(92)) echo "SI";
else echo "NO";*/

/*if(FUtente::UpdateDatan(90,"1993-04-23")) echo "SI";
else echo "NO";*/

