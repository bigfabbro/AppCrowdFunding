<?php

require_once 'include.php';

/**
 * La classe FMailCheck fornisce query per gli oggetti EMailCheck
 * @author Gruppo 3
 * @package Foundation
 */

class FMailCheck
{

    private static $tables="mailcheck";
    private static $values="(:iduser,:pin)";
    
    public function __construct(){}
    
    /**
     * Questo metodo lega gli attributi della mail check da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EMailCheck $mc 
     */

    public static function bind($stmt,EMailCheck $mc){
        $stmt->bindValue(':iduser', $mc->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(':pin', $mc->getPin(), PDO::PARAM_STR);
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
     * questo metodo restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    public static function getValues(){
        return static::$values;
    }

    /**
     * Metodo che permette la store della mail sul db
     * @param object $mail
     * @return int $id della mail salvata nel db
     */

    public static function store($mail){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FMailCheck",$mail);
        if($id) return $id;
        else return null;
    }

    /**
     * Metodo che permette la load della mail in base all'id dell'user
     * @param int $id dell'user
     * @return object $mc mail dell'user
     */
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

    /**
     * Metodo che permette la cancellazione della mail in base all'id dell'user
     * @param int $id dell'user per il quale si vuole eliminare la mail
     * @return bool
     */

    public static function deleteByIdUser($id){
        $sql="DELETE FROM ".static::getTables()." WHERE iduser=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}
