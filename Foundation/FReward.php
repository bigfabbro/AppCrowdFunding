<?php

require_once 'include.php';

/**
 * La classe FReward fornisce query per gli oggetti EReward
 * @author Gruppo 3
 * @package Foundation
 */

class FReward
{
    private static $tables="rewards";
    private static $values="(:id,:name,:pledged,:description,:idcamp)";
    
    public function __construct()
    {}

     /**
     * Questo metodo lega gli attributi della reward da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EReward $rew reward i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt, EReward $rew){
        $stmt->bindValue(':id',NULL, PDO::PARAM_STR);
        $stmt->bindValue(':name', $rew->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':pledged', $rew->getPledged(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $rew->getDescriptionRe(), PDO::PARAM_STR);
        $stmt->bindValue(':idcamp', $rew->getIdCamp(), PDO::PARAM_STR);
    }
    
    /**
     * 
     * Questo metodo restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTables(){
        return static::$tables;
    }

    /**
     * Questo metodo restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    
    
    public static function getValues(){
        return static::$values;
    }

    /** 
     * Funzione che permette la load di una reward in base all'id della campagna
     * @param int $id della campagna
     * @return object $rewards
     */

    public static function loadByIdCamp($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE idcamp=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $rewards=array();
            for($i=0; $i<count($result); $i++){
                $rewards[]=new EReward($result[$i]['name'], $result[$i]['pledged'], $result[$i]['description'], $result[$i]['idcamp']);
                $rewards[$i]->setId($result[$i]['id']);
            }
            return $rewards;
        }
        return null;
    }

    /**
     * Funzione che permette la load di una reward in base al proprio id
     * @param int $id della reward da cercare
     * @return object $rew
     */

    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $rew=new EReward($result['name'],$result['pledged'], $result['description'], $result['idcamp']);
            $rew->setId($result['id']);
            return $rew;
        }
        else return null;
    }

    /**
     * Metodo che permette la store di una reward
     * @param $rew da salvare
     * @return $id della reward salvata
     */
    public static function store($rew){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FReward",$rew);
        if($id) return $id;
        else return null;
    }

    /**
     * Metodo che permette la delete della reward in base all'id
     * @param int $id della reward da cancellare
     * @return bool
     */

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}
