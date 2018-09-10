<?php

require_once 'include.php';

/**
 * La classe FCartadicredito fornisce query per gli oggetti ECartadicredito.
 * @author Gruppo 3
 * @package Foundation
 */
class FCartadicredito
{   
    /** tabella con la quale opera */
    private static $tables="creditcard";
    /** valori della tabella */
    private static $values="(:id,:ownername,:ownersurname,:expirationdate,:ccnumber,:ccv)";
    /** costruttore */
    public function __construct(){   
    }

     /**
      * Questo metodo lega gli attributi della carta di credito  da inserire con i parametri della INSERT
      * @param PDOStatement $stmt 
      * @param ECartadicredito $cc carta di credito i cui dati devono essere inseriti nel DB
      */
     public static function bind($stmt, ECartadicredito $cc){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':ownername', $cc->getOwnerName(), PDO::PARAM_STR); 
        $stmt->bindValue(':ownersurname', $cc->getOwnerSurname(), PDO::PARAM_STR);
        $stmt->bindValue(':expirationdate', $cc->getExpirationDate(), PDO::PARAM_STR); 
        $stmt->bindValue(':ccnumber', $cc->getCcNumber(), PDO::PARAM_STR); 
        $stmt->bindValue(':ccv', $cc->getCcv(), PDO::PARAM_STR); 
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
    public static function store($cc){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FCartadicredito",$cc);
        if($id) return $id;
        else return null;
    }


    /**
     * Permette la load sul db 
     * @param int l'id dell'oggetto carta di credito
     * @return object $cc l'oggetto carta di credito 
     */
    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $cc=new ECartadicredito($result['ownername'],$result['ownersurname'], $result['epirationdate'], $result['ccnumber'],$result['ccv']);
            $cc->setId($result['id']);
            return $cc;
        }
        else return null;
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
   

