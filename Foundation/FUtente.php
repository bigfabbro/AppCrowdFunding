<?php

require_once 'include.php';


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
     * Questo metodo seleziona lo user con un certo id
     * @param PDO &$db 
     * @param int $id numero identificativo dello user da selezionare
     * @return EUtente $user restituisce un oggetto EUtente creato con i dati restituiti dal DBMS 
     * 
     */
    
    public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE id=".$id.";";
        try{
           $stmt=$db->prepare($sql);
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);
           $user=new EUtente($row['username'],$row['password'], $row['name'], $row['surname'],$row['sex'],$row['datan'], $row['email'],$row['telnumber'],$row['description']);
           $user->setId($row['id']);
           $user->setActivate($row['activate']);
           return $user;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }

    /**
     * 
     * Questo metodo rimuove dal database un user con un certo id
     * 
     * @param PDO &$db
     * @param int $id numero identificativo della user da eliminare 
     * @return bool restituisce true se la delete e' andataa buon fine, false viceversa
     */
    
    /*public static function delete(PDO &$db, $id):bool{
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
        }
    }
    */

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

    public static function exist(PDO &$db,$field,$val) {
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
    }

    public static function store($user){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FUtente",$user);
        if($id) return $id;
        else return null;
    }

    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            echo "SI";
            $user=new EUtente($result['username'],$result['password'], $result['name'], $result['surname'],$result['sex'],$result['datan'], $result['email'],$result['telnumber'],$result['description']);
            $user->setId($result['id']);
            $user->setActivate($result['activate']);
            return $user;
        }
        else return null;
    }

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

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

    public static function UpdateTelNum($id,$telnum){
        $field="telnumber";
        if(FUtente::update($id,$field,$telnum)) return true;
        else return false;
    }

    public static function UpdateDatan($id,$datan){
        $field="datan";
        if(FUtente::update($id,$field,$datan)) return true;
        else return false;
    }

    public static function UpdateDescription($id,$description){
        $field="description";
        if(FUtente::update($id,$field,$description)) return true;
        else return false;
    }

    public static function UpdateActivate($id,$activate){
        $field="activate";
        if(FUtente::update($id,$field,$activate)) return true;
        else return false;
    }

    public static function Update($id,$field,$newvalue){
        $sql="UPDATE ".static::getTables()." SET ".$field."='".$newvalue."' WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }

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

    public static function ExistUsername($username){
        $sql="SELECT * FROM ".static::getTables()." WHERE username='".$username."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }

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
                WHERE LOCATE( :name , username) > 0;";
    }

    static function createObjectFromRow($row) 
    {
        $utente = new EUtente(); //costruisce la classe da dove istanziare l'oggetto
        $utente->setId($row['id']);
        $utente->setUserName($row['username']);
        $utente->setPass($row['password']);
        $utente->setName($row['nome']);
        $utente->setSurname($row['surname']);
        //$utente->setSex($row['sex']);
        $utente->setDatan($row['datan']);
        $utente->setEmail($row['email']);
        $utente->setTel($row['telnumber']);
        $utente->setBio($row['bio']);
        
        return $utente;
    }
    
}

