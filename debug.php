<?php

require_once "include.php";

$c=hash("md5","{\?/}");
$cookie="bigfabbro93539b7bd58c100b58009ff1a4cd8446815235ddd343dafbf87ce4131efc7c6cfe";
$data=explode($c,$cookie);
$user=FUtente::loadByUsername($data[0]);
echo hash("md5",$user->getPass());
echo " ";
echo $user->getPass();
echo " ";
echo $data[1];
echo " ";
echo hash("md5","bigfabbro93fd22041993");

/*If(FUtente::delete(92)) echo "SI";
else echo "NO";*/

/*if(FUtente::UpdateDatan(90,"1993-04-23")) echo "SI";
else echo "NO";*/

