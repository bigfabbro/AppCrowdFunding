<?php

require_once 'include.php';


class FUtente
{
    private static $tables="utenti";
    private static $values="(:id,:username,:password,:name,:surname,:email,:telnumber,:address,:profpic,:bio,:tipo,:permits)";
    
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
        $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':telnumber', $user->getTel(), PDO::PARAM_STR);
        $stmt->bindValue(':address', $user->getAddress(), PDO::PARAM_STR);
        $stmt->bindValue(':profpic', $user->getPic(), PDO::PARAM_STR);
        $stmt->bindValue('bio', $user->getBio(), PDO::PARAM_STR);
        $stmt->bindValue(':tipo', $user->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':permits', $user->getPermits(), PDO::PARAM_STR);
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
           $user=new EUtente($row['username'],$row['password'], $row['name'], $row['surname'], $row['email'],$row['telnumber'], $row['address'], $row['profpic'],$row['bio'],$row['tipo'],$row['permits']);
           $user->setId($row['id']);
           return $user;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }

    /**
     * 
     * Questo metodo rimuove dal database una useragna con un certo id
     * 
     * @param PDO &$db
     * @param int $id numero identificativo della useragna da eliminare 
     * @return bool restituisce true se la delete e' andataa buon fine, false viceversa
     */
    
    public static function delete(PDO &$db, $id):bool{
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
    }

    /**
     * 
     * Questo metodo effettua la modifica del valore di uno specifico usero di una useragna nel database
     * 
     * @param PDO &$db 
     * @param int $id numero identificativo della useragna da modificare
     * @param string $field usero da modificare
     * @param mixed $newvalue nuovo valore da attribuire 
     * @return bool restituisce true se la modifica e' andata a buon fine, false viceversa
     */
    
    public static function update(PDO &$db, $id, $field, $newvalue):bool {
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
    
    
}

