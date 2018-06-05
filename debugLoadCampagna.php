<?php
require_once 'include.php';
$db=FDatabase::getInstance();
$camp=$db->loadCampByFounder(15);
echo count($camp);
for($i=0; $i<count($camp);$i++){
    echo $camp[$i];
}
if(count($db->load('MediaCamp',30))) echo "yes";
else echo "no";

