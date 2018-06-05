<?php
require_once 'include.php';
$db=FDatabase::getInstance();
$camp=$db->loadCampByFounder(15);
echo count($camp);
for($i=0; $i<count($camp);$i++){
    echo $camp[$i];
}
echo $db->load('Campagna',29);
