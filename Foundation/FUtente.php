<?php

require_once 'include.php';

/**
 * La classe FUtente fornisce query per gli oggetti EUtente
 * @author Gruppo 3
 * @package Foundation
 */

class FUtente
{
    private static $tables="utenti";
    private static $values="(:id,:username,:password,:name,:surname,:sex,:datan,:email,:telnumber,:description,:activate)";
    
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi dell'user da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EUtente $user user i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt,EUtente $user){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':username', $user->getUserName(), PDO::PARAM_STR); 
        $stmt->bindValue(':password', $user->getPass(), PDO::PARAM_STR); //ricorda di "collegare" la giusta variabile al bind
        $stmt->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':surname', $user->getSurname(), PDO::PARAM_STR);
        $stmt->bindValue(':sex', $user->getSex(), PDO::PARAM_STR);
        $stmt->bindValue(':datan', $user->getDatan(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':telnumber', $user->getTel(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $user->getBio(), PDO::PARAM_STR);
        $stmt->bindValue(':activate', $user->getActivate(), PDO::PARAM_STR);
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
     * questo metodo restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    public static function getValues(){
        return static::$values;
    }


    public static function store($user){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FUtente",$user);
        if($id) return $id;
        else return null;
    }
 
    /**
     * Funzione ch permette la load dell'utente in base all'id
     * @param int $id dell'user
     * @return object $user 
     */
    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $user=new EUtente($result['username'],$result['password'], $result['name'], $result['surname'],$result['sex'],$result['datan'], $result['email'],$result['telnumber'],$result['description']);
            $user->setId($result['id']);
            $user->setActivate($result['activate']);
            return $user;
        }
        else return null;
    }

    /**
     * Funzione ch permette la load dell'utente in base all'username
     * @param string $username dell'user
     * @return object $user 
     */

    public static function loadByUsername($username){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $user=new EUtente($result['username'],$result['password'], $result['name'], $result['surname'],$result['sex'],$result['datan'], $result['email'],$result['telnumber'],$result['description']);
            $user->setId($result['id']);
            $user->setActivate($result['activate']);
            return $user;
        }
        else return null;
    }

    /** 
     * Funzione che permette la delete dell'utente in base all'id
     * @param int $id dell'utente che si vuole eliminare
     * @return bool 
     */

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

     /** 
     * Funzione che permette di modificare il numero di telefono 
     * di un certo utente
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param string $telnum numero di telefono
     * @return bool 
     */

    public static function UpdateTelNum($id,$telnum){
        $field="telnumber";
        if(FUtente::update($id,$field,$telnum)) return true;
        else return false;
    }
     /** 
     * Funzione che permette di modificare la data di nascita
     * di un certo utente
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param date $datan data di nascita "nuova"
     * @return bool 
     */


    public static function UpdateDatan($id,$datan){
        $field="datan";
        if(FUtente::update($id,$field,$datan)) return true;
        else return false;
    }

     /** 
     * Funzione che permette di modificare la descrizione
     * di un certo utente
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param string $description "nuova"
     * @return bool 
     */

    public static function UpdateDescription($id,$description){
        $field="description";
        if(FUtente::update($id,$field,$description)) return true;
        else return false;
    }

     /** 
     * Funzione che permette di modificare la variabile di 
     * di un certo utente
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param bool $activate 
     * @return bool 
     */

    public static function UpdateActivate($id,$activate){
        $field="activate";
        if(FUtente::update($id,$field,$activate)) return true;
        else return false;
    }

    /** 
     * Funzione che permette di modificare una generico attributo dell'utente
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param string $field campo da modificare
     * @param  string $newvalue nuovo valore
     * @return bool 
     */


    public static function Update($id,$field,$newvalue){
        $sql="UPDATE ".static::getTables()." SET ".$field."='".$newvalue."' WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }

     /** 
     * Funzione che verifica l'esistenza di un utente con quell'username e password
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param string $username 
     * @param  string $password
     * @return object $user
     */


    public static function ExistUserPass($username,$password){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."' AND "."password='".$password."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null){
             $user=new EUtente($result['username'],$result['password'], $result['name'], $result['surname'],$result['sex'],$result['datan'], $result['email'],$result['telnumber'],$result['description']);
             $user->setId($result['id']);
             $user->setActivate($result['activate']);
             return $user;
        }
        else return null;
    }

     /** 
     * Funzione che permette di verificare se esiste un utente con quell'username
     * @param int $id dell'utente che vuole effettuare la modifica
     * @param string $username da cercare
     * @return bool 
     */

    public static function ExistUsername($username){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }

     /** 
     * Funzione che permette di verificare se esite un utente con quella mail
     * @param string $mail da cercare
     * @return bool 
     */


    public static function ExistMail($mail){
        $sql="SELECT * FROM ".static::getTables()." WHERE email='".$mail."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }
	
	/**
     * Query che restituisce gli utenti in base al nome
     * @return string la query sql
     */
    static function cercaUtenteByUsername() : string
    {
        return "SELECT *
                FROM utenti
                WHERE LOCATE( :username , username) > 0;";
    }

    /**
     * Istanzia l'oggetto utente dai risultati della query.
     * @param row tupla restituita dal dbms
     * @return l'oggetto utente 
     */
    static function createObjectFromRow($row) 
    {
        $utente = new EUtente(); //costruisce la classe da dove istanziare l'oggetto
        $utente->setId($row['id']);
        $utente->setUserName($row['username']);
        $utente->setPass($row['password']);
        $utente->setName($row['name']);
        $utente->setSurname($row['surname']);
        //$utente->setSex($row['sex']);
        $utente->setDatan($row['datan']);
        $utente->setEmail($row['email']);
        $utente->setTel($row['telnumber']);
        $utente->setBio($row['description']);
        
        return $utente;
    }
    
    
}

