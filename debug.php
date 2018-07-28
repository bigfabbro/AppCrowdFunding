<?php

require_once "include.php";

$user=new EUtente("bigfabbro","fd22041993","Fabrizio","D'Ascenzo","M","1993-04-22","bigfabbro@hotmail.it","3312934943","Ciao sono Fabrizio");
echo FUtente::store($user);

/*If(FUtente::delete(92)) echo "SI";
else echo "NO";*/

/*if(FUtente::UpdateDatan(90,"1993-04-23")) echo "SI";
else echo "NO";*/

