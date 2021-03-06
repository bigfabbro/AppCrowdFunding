<?php

require_once 'include.php';

/**
 * La classe FCommento fornisce query per gli oggetti ECommento.
 * @author Gruppo 3
 * @package Foundation
 */
class FCommento
{
    /** tabella con la quale opera */
    private static $tables="commenti";
    /** valori della tabella */
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

   /**
     * 
     * questo metodo restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */
    public static function getTables(){
        return static::$tables;
    }
     /**
     *  
     * questo metodo restituisce la stringa dei useri della tabella sul DB per la costruzione delle Query
     * @return string $values user della tabella
    */ 
    public static function getValues(){
        return static::$values;
    }
     /**
     * Permette la store sul db
     * @return int $id dell'oggetto salvato
     */
    public static function store($comm){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FCommento",$comm);
        if($id) return $id;
        else return null;
    }
     /**
     * Permette la load sul db 
     * @param int l'id dell'oggetto commento
     * @return object $comm commento
     */
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
     /**
     * Permette la load sul db 
     * @param int l'id dell'oggetto campagna
     * @return object $comms commento
     */
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
    /**
     * Permette la delete sul db in base all'id
     * @param int l'id dell'oggetto da eliminare dal db
     * @return bool 
     */
    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}

