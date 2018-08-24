<?php
require_once 'include.php';
$db=FDatabase::getInstance();
if($db->update('Indirizzo',18,'city','Piano della lenta')) echo "si";
else "no";

?>