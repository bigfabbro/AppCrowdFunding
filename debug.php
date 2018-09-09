<?php

require_once "include.php";


$user= new EUtente('bigfabbro93','fd22041993','fabrizio','dascenzo','M','1993-04-22','bigfabbro93@gmail.com','3312934943',null);
FUtente::store($user);

/*if(FUtente::UpdateDatan(90,"1993-04-23")) echo "SI";
else echo "NO";*/

