<?php

require_once 'include.php';

class FCartaDiCredito
{   
    private static $tables="cartedicredito";
    private static $values="(:ownername,:ownersurname,:expirationdate,:ccnumber,:cvv)";
  
    public function __construct(){}
    
        /**
         * Questo metodo lega gli attributi della carta di credito  da inserire con i parametri della INSERT
         * @param PDOStatement $stmt 
         * @param ECartaDiCredito $cc carta di credito i cui dati devono essere inseriti nel DB
         */
    
    
     public static function bind($stmt, ECartaDiCredito $cc){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':ownername', $cc->getOwnname(), PDO::PARAM_INT); 
        $stmt->bindValue(':ownersurname', $cc->getOwnsurname(), PDO::PARAM_INT);
        $stmt->bindValue(':expirationdate', $cc->getExdate(), PDO::PARAM_INT); 
        $stmt->bindValue(':ccnumber', $cc->getCcnumber(), PDO::PARAM_INT); 
        $stmt->bindValue(':cvv', $cc->getCvv(), PDO::PARAM_INT); 
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
     * @return string $values useri della tabella
    */ 

    public static function getValues(){
        return static::$values;
    }

    public static function store($cc){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FCartaDiCredito",$cc);
        if($id) return $id;
        else return null;
    }

    
    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $cc=new ECartaDiCredito($result['ownername'],$result['ownersurname'], $result['epirationdate'], $result['ccnumber'],$result['cvv']);
            $cc->setId($result['id']);
            return $cc;
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
   

