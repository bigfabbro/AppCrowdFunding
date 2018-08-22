<?php

require_once 'include.php';

/**
 * La classe FDonazione fornisce query per gli oggetti EDonazione
 * @author Sof
 * @package Foundation
 */

class FDonazione
{
    private static $tables="donazioni";
    private static $values="(:amount,:date,:idutente, :idcamp);";

    public function __construct()
    {
        
    }

     /**
     * Questo metodo lega gli attributi della donazione da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EDonazione $don donazione i cui dati devono essere inseriti nel DB
     */

        public static function bind(&$stmt, EDonazione $don){
            $stmt->bindValue(':amount', $don->getAmount(), PDO::PARAM_INT);
            $stmt->bindValue(':date', $don->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':idutente', $don->getIdUtente(), PDO::PARAM_INT);
            $stmt->bindValue(':idcamp', $don->getIdCamp(), PDO::PARAM_INT);
        
        }

    public static function getTables(){
        return static::$tables;
    }

 
        
    public static function getValues(){
        return static::$values;
    }


    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $don=new EDonazione($result['amount'],$result['date'], $result['reward'], $result['idutente'], $result['idcamp'], $result['idcc']);
            $don->setId($result['id']); 
            return $don;
        }
        else return null;
    }

    public static function loadByIdUser($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE idutente=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $dons=array();
            for($i=0; $i<count($result); $i++){
                $dons[]=new EDonazione($result[$i]['amount'], $result[$i]['date'], $result[$i]['reward'], $result[$i]['idutente'],$result[$i]['idcamp'],$result[$i]['idcc']);
                $dons[$i]->setId($result[$i]['id']);
            }
            return $dons;
        }
        else return null;
    }

    public static function loadByIdCamp($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE idcamp=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $dons=array();
            for($i=0; $i<count($result); $i++){
                $dons[]=new EDonazione($result[$i]['amount'], $result[$i]['date'], $result[$i]['reward'], $result[$i]['idutente'],$result[$i]['idcamp'],$result[$i]['idcc']);
                $dons[$i]->setId($result[$i]['id']);
                $dons[$i]->setDonEffettuata($result[$i]['donationoccured']);
            }
            return $dons;
        }
        else return null;
    }

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

      /** Metodo che genera la query per l'insert di una donazione all'interno del database e richiama l'instanza di FDatabase per la store */

      public static function store($don){
        $sql="INSERT INTO donazioni VALUES ".static::getValues();
        
        $db=FDatabase::getInstance();
        $db->store($sql,"FDonazione",$don);
        
    }
}