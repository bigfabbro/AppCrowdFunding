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

    
    /*public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE iduser=".$id.";";
        try{
           $stmt=$db->prepare($sql);
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);
           $address=new EIndirizzo($row['city'],$row['street'], $row['number'], $row['zipcode'],$row['country'],$row['iduser']);
           $address->setId($row['id']);
           return $address;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }*/

    /**
     * 
     * Questo metodo rimuove dal database un user con un certo id
     * 
     * @param PDO &$db
     * @param int $id numero identificativo della user da eliminare 
     * @return bool restituisce true se la delete e' andataa buon fine, false viceversa
     */
    
   /* public static function delete(PDO &$db, $id):bool{
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        try{
            $db->beginTransaction(); //avvia la transazione; se la tipologia di database non supporta le transazioni darà come return FALSE, metre ci darà TRUE negli altri casi
            $stmt=$db->prepare($sql);  //prepara la query in attesa dell'esecuzione
            $stmt->execute(); //esegue la query
            $db->commit(); //esegue le operazioni che fanno parte della transazione
            return true;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $db->rollBack(); //annulla le operazioni eseguite nell'ambito della transazione
            die;
            return false;
        }
    }*/

    /**
     * 
     * Questo metodo effettua la modifica del valore di uno specifico valore di un user nel database
     * 
     * @param PDO &$db 
     * @param int $id numero identificativo dello user da modificare
     * @param string $field campo da modificare
     * @param mixed $newvalue nuovo valore da attribuire 
     * @return bool restituisce true se la modifica e' andata a buon fine, false viceversa
     */
    
    /*public static function update(PDO &$db, $id, $field, $newvalue):bool {
        $sql="UPDATE ".static::getTables()." SET ".$field."="."'".$newvalue."'"." WHERE id=".$id.";";
        try {
            $db->beginTransaction();
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $db->commit();
            return true;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $db->rollBack();
            die;
            return false;
        }*/

    /**
     * 
     * questo metodo restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

   

    /*public static function exist(PDO &$db,$field,$val) {
        if(is_array($field))
        {
            $sql="SELECT id"." FROM ".static::getTables()." WHERE ".$field[0]."= '".$val[0]."' AND ".$field[1]."='".$val[1]."';";
        }
        else $sql="SELECT id"." FROM ".static::getTables()." WHERE ".$field."='".$val."';";
        try{
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            return $row['id'];
         }
         catch(PDOException $e){
             echo "Attenzione errore: ".$e->getMessage();
             die;
         }
    }*/

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

