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
    private static $values="(:id,:amount,:date,:reward,:idutente, :idcamp, :donationoccurred, :idcc)";

    public function __construct()
    {}

     /**
     * Questo metodo lega gli attributi della donazione da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EDonazione $don donazione i cui dati devono essere inseriti nel DB
     */

        public static function bind($stmt, EDonazione $don){
            $stmt->bindValue(':id',NULL, PDO::PARAM_INT);
            $stmt->bindValue(':amount', $don->getAmount(), PDO::PARAM_INT);
            $stmt->bindValue(':date', $don->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':reward', $don->getReward(), PDO::PARAM_STR);
            $stmt->bindValue(':idutente', $don->getIdUtente(), PDO::PARAM_INT);
            $stmt->bindValue(':idcamp', $don->getIdCamp(), PDO::PARAM_INT);
            $stmt->bindValue(':donationoccured',$don->getOcc(), PDO::PARAM_BOOL);
            $stmt->bindValue(':idcc', $don->getCreditCard(), PDO::PARAM_INT);
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
            $don->setDonEffettuata($result['donationoccured']); 
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
                $dons[$i]->setDonEffettuata($result[$i]['donationoccured']);
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
}