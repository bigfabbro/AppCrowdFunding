<?php
require_once 'include.php';
$db=FDatabase::getInstance();
$db->update('Campagna',22,'category','debugUpdate');

?>