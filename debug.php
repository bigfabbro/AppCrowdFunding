<?php

require_once "include.php";

$db = new PDO("mysql:host=localhost; dbname=appcrowdfunding", "root",""); 
            $db->beginTransaction();
            $insert=file_get_contents('insert.sql');
            $db->exec($insert);
            $db->commit();
            $db=null;

/*if(FUtente::UpdateDatan(90,"1993-04-23")) echo "SI";
else echo "NO";*/

