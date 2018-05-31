<?php
$d=Date("M D");
echo $d;
$today=strtotime(Date("M D"));
$expirationday=strtotime("2019-05");
if($today>$expirationday)
  echo "VERO";
else echo "FALSO";