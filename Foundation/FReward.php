<?php

require_once 'include.php';

class FReward
{
    private static $tables="rewards";
    private static $values="(:id,:name,:pledged,:description,:reward,:idcamp)";
    
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
            $rewards=array();
            for($i=0; $i<count($result); $i++){
                $rewards[]=new EReward($result[$i]['name'], $result[$i]['pledged'], $result[$i]['description'], $result[$i]['idcamp']);
                $rewards[$i]->setId($result[$i]['id']);
            }
            return $rewards;
        }
        return null;
    }
}
