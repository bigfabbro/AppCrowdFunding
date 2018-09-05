<?php

require_once 'include.php';

class FCommento
{

    private static $tables="commenti";
    private static $values="(:id,:user,:text,:date,:idcamp)";
    
    public function __construct(){}
    
    /**
     * Questo metodo lega gli attributi del commento  da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param ECommento $comm commento i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt,ECommento $comm){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':user', $comm->getUser(), PDO::PARAM_INT);
        $stmt->bindValue(':text', $comm->getText(), PDO::PARAM_STR);
        $stmt->bindValue(':date', $comm->getDate(), PDO::PARAM_STR);
        $stmt->bindValue(':idcamp', $comm->getIdCamp(), PDO::PARAM_INT);
    }

   
    public static function getTables(){
        return static::$tables;
    }
    
    public static function getValues(){
        return static::$values;
    }

    public static function store($comm){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FCommento",$comm);
        if($id) return $id;
        else return null;
    }

    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $comm=new ECommento($result['iduser'],$result['text'], $result['date'], $result['idcamp']);
            $comm->setId($result['id']);
            return $comm;
        }
        else return null;
    }

    public static function loadByIdCamp($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE idcamp=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $comms=array();
            for($i=0; $i<count($result); $i++){
                $comms[]=new ECommento($result[$i]['iduser'], $result[$i]['text'], $result[$i]['date'], $result[$i]['idcamp']);
                $comms[$i]->setId($result[$i]['id']);
            }
            return $comms;
        }
        return null;
    }

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}

