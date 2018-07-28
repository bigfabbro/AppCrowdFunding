<?php

require_once 'include.php';

class FMailCheck
{

    private static $tables="mailcheck";
    private static $values="(:iduser,:pin)";
    
    public function __construct(){}
    
    public static function bind($stmt,EMailCheck $mc){
        $stmt->bindValue(':iduser', $mc->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(':pin', $mc->getPin(), PDO::PARAM_STR);
    }

  
    /*public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE iduser=".$id.";";
        try{
           $stmt=$db->prepare($sql);
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);
           $mc=new EMailCheck($row['iduser'],$row['pin']);
           return $mc;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }*/


    public static function getTables(){
        return static::$tables;
    }
    
    public static function getValues(){
        return static::$values;
    }

    public static function store($mail){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FMailCheck",$mail);
        if($id) return $id;
        else return null;
    }

    public static function loadByIdUser($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE iduser=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $mc=new EMailCheck($result['iduser'],$result['pin']);
            return $mc;
        }
        else return null;
    }

    public static function deleteByIdUser($id){
        $sql="DELETE FROM ".static::getTables()." WHERE iduser=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}
