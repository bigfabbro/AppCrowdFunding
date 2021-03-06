<?php

require_once 'include.php';


class FIndirizzo
{
    /** tabella con la quale opera */
    private static $tables="indirizzi";
    /** valori della tabella */
    private static $values="(:id,:city,:street,:number,:zipcode,:country,:iduser)";
    /** costruttore */
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi dell'indirizzo da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EDonazione $address indirizzo i cui dati devono essere inseriti nel DB
     */
    public static function bind($stmt,EIndirizzo $address){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':city', $address->getCity(), PDO::PARAM_STR); 
        $stmt->bindValue(':street', $address->getStreet(), PDO::PARAM_STR); 
        $stmt->bindValue(':number', $address->getNum(), PDO::PARAM_STR);
        $stmt->bindValue(':zipcode', $address->getZipcode(), PDO::PARAM_STR);
        $stmt->bindValue(':country', $address->getCountry(), PDO::PARAM_STR);
        $stmt->bindValue(':iduser', $address->getIduser(), PDO::PARAM_INT);
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
    /**
     * Permette la store sul db
     * @return int $address dell'oggetto salvato
     */
    public static function store($address){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FIndirizzo",$address);
        if($id) return $id;
        else return null;
    }
    /**
     * Permette la load sul db 
     * @param int l'id dell'oggetto indirizzo
     * @return object $address indirizzo
     */
    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $address=new EIndirizzo($result['city'],$result['street'], $result['number'], $result['zipcode'],$result['country'],$result['iduser']);
            $address->setId($row['id']);
            return $address;
        }
        else return null;
    }
    /**
     * Permette la load sul db 
     * @param int l'id dell'oggetto utente
     * @return object $adress indirizzo
     */
    public static function loadByIdUser($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE iduser=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $address=new EIndirizzo($result['city'],$result['street'], $result['number'], $result['zipcode'],$result['country'],$result['iduser']);
            $address->setId($result['id']);
            return $address;
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

    /** Metodi di aggiornamento */

    /** Aggiorna città */
    public static function UpdateCity($id,$city){
        $field="city";
        if(FIndirizzo::update($id,$field,$city)) return true;
        else return false;
    }
    /** Aggiorna via */
    public static function UpdateStreet($id,$street){
        $field="street";
        if(FIndirizzo::update($id,$field,$street)) return true;
        else return false;
    }
    /** Aggiorna numero civico */
    public static function UpdateNumber($id,$number){
        $field="number";
        if(FIndirizzo::update($id,$field,$number)) return true;
        else return false;
    }
    /** Aggiorna codice postale */
    public static function UpdateZipcode($id,$zipcode){
        $field="zipcode";
        if(FIndirizzo::update($id,$field,$zipcode)) return true;
        else return false;
    }
    /** Aggiorna paese */
    public static function UpdateCountry($id,$country){
        $field="country";
        if(FIndirizzo::update($id,$field,$country)) return true;
        else return false;
    }
    /** Aggiorna*/
    public static function Update($id,$field,$newvalue){
        $sql="UPDATE ".static::getTables()." SET ".$field."='".$newvalue."' WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }
}

