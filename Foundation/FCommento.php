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
        $stmt->bindValue(':user', $camp->getUser(), PDO::PARAM_INT);
        $stmt->bindValue(':text', $camp->getText(), PDO::PARAM_STR);
        $stmt->bindValue(':date', $camp->getDate(), PDO::PARAM_STR);
        $stmt->bindValue(':idcamp', $camp->getIdCamp(), PDO::PARAM_INT);
    }

   
    public static function getTables(){
        return static::$tables;
    }
    
    public static function getValues(){
        return static::$values;
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
}

