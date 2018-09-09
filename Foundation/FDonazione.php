<?php

require_once 'include.php';

/**
 * La classe FDonazione fornisce query per gli oggetti EDonazione
 * @author Gruppo 3
 * @package Foundation
 */

class FDonazione
{
    private static $tables="donazioni";
    private static $values="(:id,:amount,:date,:reward,:idutente, :idcamp, :donationoccurred, :idcc)";
   
    public function __construct(){
        
    }

     /**
     * Questo metodo lega gli attributi della donazione da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EDonazione $don donazione i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt, EDonazione $don){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':amount', $don->getAmount(), PDO::PARAM_STR);
        $stmt->bindValue(':date', $don->getDate(), PDO::PARAM_STR);
        $stmt->bindValue(':reward', $don->getReward(), PDO::PARAM_INT);
        $stmt->bindValue(':idutente', $don->getIdUtente(), PDO::PARAM_INT);
        $stmt->bindValue(':idcamp', $don->getIdCamp(), PDO::PARAM_INT);
        $stmt->bindValue(':donationoccurred', $don->getDonationOccurred(), PDO::PARAM_INT);
        $stmt->bindValue(':idcc', $don->getIdCc(), PDO::PARAM_INT);}
        
    
    
    
    public static function store($don){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FDonazione",$don);
        if($id) return $id;
        else return null;
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


    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $don=new EDonazione($result['amount'],$result['date'], $result['reward'], $result['idutente'],$result['idcamp'],$result['idcc']);
            $don->setId($result['id']);
            $don->setDonationOccurred($result['donationoccurred']);
            return $don;
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
                $dons[]=new EDonazione($result[$i]['amount'],$result[$i]['date'], $result[$i]['reward'], $result[$i]['idutente'],$result[$i]['idcamp'],$result[$i]['idcc']);
                $dons[$i]->setId($result[$i]['id']);
            }
            return $dons;
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
                $dons[]=new EDonazione($result[$i]['amount'],$result[$i]['date'], $result[$i]['reward'], $result[$i]['idutente'],$result[$i]['idcamp'],$result[$i]['idcc']);
                $dons[$i]->setId($result[$i]['id']);
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


}