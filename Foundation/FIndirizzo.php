<?php

require_once 'include.php';


class FIndirizzo
{
    private static $tables="indirizzi";
    private static $values="(:id,:city,:street,:number,:zipcode,:country,:iduser)";
    
    public function __construct(){}

    
    public static function bind($stmt,EIndirizzo $address){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':city', $address->getCity(), PDO::PARAM_STR); 
        $stmt->bindValue(':street', $address->getStreet(), PDO::PARAM_STR); 
        $stmt->bindValue(':number', $address->getNum(), PDO::PARAM_STR);
        $stmt->bindValue(':zipcode', $address->getZipcode(), PDO::PARAM_STR);
        $stmt->bindValue(':country', $address->getCountry(), PDO::PARAM_STR);
        $stmt->bindValue(':iduser', $address->getIduser(), PDO::PARAM_INT);
    }

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
    
    public static function store($address){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FIndirizzo",$address);
        if($id) return $id;
        else return null;
    }

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

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

    public static function UpdateCity($id,$city){
        $field="city";
        if(FIndirizzo::update($id,$field,$city)) return true;
        else return false;
    }

    public static function UpdateStreet($id,$street){
        $field="street";
        if(FIndirizzo::update($id,$field,$street)) return true;
        else return false;
    }

    public static function UpdateNumber($id,$number){
        $field="number";
        if(FIndirizzo::update($id,$field,$number)) return true;
        else return false;
    }

    public static function UpdateZipcode($id,$zipcode){
        $field="zipcode";
        if(FIndirizzo::update($id,$field,$zipcode)) return true;
        else return false;
    }
    
    public static function UpdateCountry($id,$country){
        $field="country";
        if(FIndirizzo::update($id,$field,$country)) return true;
        else return false;
    }

    public static function Update($id,$field,$newvalue){
        $sql="UPDATE ".static::getTables()." SET ".$field."='".$newvalue."' WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }
}

