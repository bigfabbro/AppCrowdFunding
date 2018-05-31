<?php

require_once 'include.php';


class FCampagna
{
    private static $tables="campagne";
    private static $values="(:id,:founder,:name,:description,:category,:country,:startdate,:enddate,:bankcount,:goal,:funds,:visibility)";
    
    public function __construct(){}

    /**
     * Questo metodo lega gli attributi della campagna da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param ECampagna $camp campagna i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt,ECampagna $camp){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':founder', $camp->getFounder(), PDO::PARAM_STR); 
        $stmt->bindValue(':name', $camp->getName(), PDO::PARAM_STR); //ricorda di "collegare" la giusta variabile al bind
        $stmt->bindValue(':description', $camp->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':category', $camp->getCategory(), PDO::PARAM_STR);
        $stmt->bindValue(':country', $camp->getCountry(), PDO::PARAM_STR);
        $stmt->bindValue(':startdate', $camp->getStartDate(), PDO::PARAM_STR);
        $stmt->bindValue(':enddate', $camp->getEndDate(), PDO::PARAM_STR);
        $stmt->bindValue(':bankcount', $camp->getBankCount(), PDO::PARAM_STR);
        $stmt->bindValue(':goal', $camp->getGoal(), PDO::PARAM_STR);
        $stmt->bindValue(':funds', $camp->getFunds(), PDO::PARAM_STR);
        $stmt->bindValue(':visibility', $camp->getVis(), PDO::PARAM_STR);
    }

    /**
     * 
     * Questo metodo seleziona la campagna con un certo id
     * @param PDO &$db 
     * @param int $id numero identificativo della campagna da selezionare
     * @return ECampagna $camp restituisce un oggetto ECampagna creato con i dati restituiti dal DBMS 
     * 
     */
    
    public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE id=".$id.";";
        try{
           $stmt=$db->prepare($sql);
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);
           $camp=new ECampagna($row['founder'],$row['name'], $row['description'], $row['category'], $row['country'],$row['startdate'], $row['enddate'], $row['bankcount'],$row['goal']);
           $camp->setId($row['id']);
           $camp->setFunds($row['funds']); //aggiorna l'informazione coerentemente con il db infatti il costruttore setterebbe  founds a zero e visibility a false
           $camp->setRew(FReward::load($db, $camp->getId()));
           $camp->setComm(FCommento::load($db, $camp->getId()));
           $camp->setMedia(FMedia::load($db,$camp->getId()));
           if($row['visibility']) $camp->setVis(); 
           return $camp;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }

    /**
     * 
     * Questo metodo rimuove dal database una campagna con un certo id
     * 
     * @param PDO &$db
     * @param int $id numero identificativo della campagna da eliminare 
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
     * Questo metodo effettua la modifica del valore di uno specifico campo di una campagna nel database
     * 
     * @param PDO &$db 
     * @param int $id numero identificativo della campagna da modificare
     * @param string $field campo da modificare
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
     * questo metodo restituisce la stringa dei campi della tabella sul DB per la costruzione delle Query
     * @return string $values campi della tabella
     */
    
    public static function getValues(){
        return static::$values;
    }
    
    
}

