<?php

require_once 'include.php';

class FMailCheck
{

    private static $tables="mailcheck";
    private static $values="(:iduser,:pin)";
    
    public function __construct(){}
    
    public static function bind($stmt,ECommento $comm){
        $stmt->bindValue(':iduser', $camp->getUser(), PDO::PARAM_INT);
        $stmt->bindValue(':pin', $camp->getText(), PDO::PARAM_STR);
    }

  
    public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE iduser=".$id.";";
        try{
           $stmt=$db->prepare($sql);
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);
           $mc=new EMailCheck($row['iduser'],$row['pin']);
           $mc->setId($row['id']);
           return $address;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }


    public static function getTables(){
        return static::$tables;
    }
    
    public static function getValues(){
        return static::$values;
    }
}
