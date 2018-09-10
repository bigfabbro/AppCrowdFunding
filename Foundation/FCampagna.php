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
        $stmt->bindValue(':founder', $camp->getFounder(), PDO::PARAM_INT); 
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
    
    //Metodo che restituisce il nome della tabella nel database
    
    public static function getTables(){
        return static::$tables;
    }

    // Metodo che restitusice la struttura della tabella nel database

    public static function getValues(){
        return static::$values;
    }

    /** Metodo che genera la query per l'insert di una campagna all'interno del database e richiama l'instanza di FDatabase per la store */

    public static function store($camp){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FCampagna",$camp);
        if($id) return $id;
        else return null;
    }

    /** Metodo che genera la query per la load di una campagna sulla base dell'id della stessa, richiama l'instanza di FDatabase per la load 
     * e ricevuto il risultato della query crea il relativo oggetto ECampagna.
    */
    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $camp=new ECampagna($result['founder'],$result['name'], $result['description'], $result['category'], $result['country'],$result['startdate'], $result['enddate'], $result['bankcount'],$result['goal']);
            $camp->setId($result['id']);
            $camp->setFunds($result['funds']); //aggiorna l'informazione coerentemente con il db infatti il costruttore setterebbe  founds a zero e visibility a false
            $camp->setRew(FReward::loadByIdCamp($camp->getId()));
            $camp->setComm(FCommento::loadByIdCamp($camp->getId()));
            $camp->setMedia(FMediaCamp::loadByIdCamp($camp->getId()));
            if($result['visibility']) $camp->setVis(); 
            return $camp;
        }
        else return null;
    }

    /** Metodo che genera la query per la load delle campagne create da un certo founder, richiama l'instanza di FDatabase per la load 
     * e ricevuto il risultato della query crea un array contenente tutte le campagne.
    */

    public static function loadByFounder($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE founder=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
                $camps=array();
                for($i=0; $i<count($result); $i++){
                    $camps[]=new ECampagna($result[$i]['founder'],$result[$i]['name'], $result[$i]['description'], $result[$i]['category'], $result[$i]['country'],$result[$i]['startdate'], $result[$i]['enddate'], $result[$i]['bankcount'],$result[$i]['goal']);
                    $camps[$i]->setId($result[$i]['id']);
                    $camps[$i]->setFunds($result[$i]['funds']); //aggiorna l'informazione coerentemente con il db infatti il costruttore setterebbe  founds a zero e visibility a false
                    $camps[$i]->setRew(FReward::loadByIdCamp($camps[$i]->getId()));
                    $camps[$i]->setComm(FCommento::loadByIdCamp($camps[$i]->getId()));
                    $camps[$i]->setMedia(FMediaCamp::loadByIdCamp($camps[$i]->getId()));
                    if($result[$i]['visibility']) $camps[$i]->setVis(); 
                }
                return $camps;
        }
        else return null;
    }

    /** Metodo che verifica se esiste una campagna con un certo nome:
     * 1) se esiste restituisce true;
     * 2) viceversa restituisce false.
     */

    public function ExistName($name){
        $sql="SELECT * FROM ".static::getTables()." WHERE name='".$name."';";
        $db=FDatabase::getInstance();
        $result=$db->exist($sql);
        if($result!=null) return true;
        else return false;
    }

    public static function Top5byFundsPerCategory($category){
        $sql="SELECT * FROM ".static::getTables()." WHERE category='".$category."' ORDER BY funds DESC LIMIT 5;";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $camps=array();
            for($i=0; $i<count($result); $i++){
                $camps[]=new ECampagna($result[$i]['founder'],$result[$i]['name'], $result[$i]['description'], $result[$i]['category'], $result[$i]['country'],$result[$i]['startdate'], $result[$i]['enddate'], $result[$i]['bankcount'],$result[$i]['goal']);
                $camps[$i]->setId($result[$i]['id']);
                $camps[$i]->setFunds($result[$i]['funds']); //aggiorna l'informazione coerentemente con il db infatti il costruttore setterebbe  founds a zero e visibility a false
                $camps[$i]->setRew(FReward::loadByIdCamp($camps[$i]->getId()));
                $camps[$i]->setComm(FCommento::loadByIdCamp($camps[$i]->getId()));
                $camps[$i]->setMedia(FMediaCamp::loadByIdCamp($camps[$i]->getId()));
                if($result[$i]['visibility']) $camps[$i]->setVis(); 
            }
            return $camps;
        }
        else return null;
    }

    public static function Best5ofToday(){
        $sql="SELECT * FROM ".static::getTables()." as c INNER JOIN 
                (SELECT idcamp 
                 FROM donazioni 
                 WHERE date='".date('Y-m-d')."' 
                 GROUP BY idcamp 
                 ORDER BY SUM(amount) DESC LIMIT 5) as b 
                 ON c.id=b.idcamp;";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $camps=array();
            for($i=0; $i<count($result); $i++){
                $camps[]=new ECampagna($result[$i]['founder'],$result[$i]['name'], $result[$i]['description'], $result[$i]['category'], $result[$i]['country'],$result[$i]['startdate'], $result[$i]['enddate'], $result[$i]['bankcount'],$result[$i]['goal']);
                $camps[$i]->setId($result[$i]['id']);
                $camps[$i]->setFunds($result[$i]['funds']); //aggiorna l'informazione coerentemente con il db infatti il costruttore setterebbe  founds a zero e visibility a false
                $camps[$i]->setRew(FReward::loadByIdCamp($camps[$i]->getId()));
                $camps[$i]->setComm(FCommento::loadByIdCamp($camps[$i]->getId()));
                $camps[$i]->setMedia(FMediaCamp::loadByIdCamp($camps[$i]->getId()));
                if($result[$i]['visibility']) $camps[$i]->setVis(); 
            }
            return $camps;
        }
        else return null;
    }

    static function Last5Insert(){
        $sql="SELECT * FROM ".static::getTables()." ORDER BY startdate DESC, id DESC LIMIT 5;";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $camps=array();
            for($i=0; $i<count($result); $i++){
                $camps[]=new ECampagna($result[$i]['founder'],$result[$i]['name'], $result[$i]['description'], $result[$i]['category'], $result[$i]['country'],$result[$i]['startdate'], $result[$i]['enddate'], $result[$i]['bankcount'],$result[$i]['goal']);
                $camps[$i]->setId($result[$i]['id']);
                $camps[$i]->setFunds($result[$i]['funds']); //aggiorna l'informazione coerentemente con il db infatti il costruttore setterebbe  founds a zero e visibility a false
                $camps[$i]->setRew(FReward::loadByIdCamp($camps[$i]->getId()));
                $camps[$i]->setComm(FCommento::loadByIdCamp($camps[$i]->getId()));
                $camps[$i]->setMedia(FMediaCamp::loadByIdCamp($camps[$i]->getId()));
                if($result[$i]['visibility']) $camps[$i]->setVis(); 
            }
            return $camps;
        }
        else return null;
    }

    static function Expiring5Month(){
        $sql="SELECT * FROM ".static::getTables()." WHERE MONTH(enddate)='".date('m')."' AND YEAR(enddate)='".date('Y')."' ORDER BY enddate LIMIT 5;";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            $camps=array();
            for($i=0; $i<count($result); $i++){
                $camps[]=new ECampagna($result[$i]['founder'],$result[$i]['name'], $result[$i]['description'], $result[$i]['category'], $result[$i]['country'],$result[$i]['startdate'], $result[$i]['enddate'], $result[$i]['bankcount'],$result[$i]['goal']);
                $camps[$i]->setId($result[$i]['id']);
                $camps[$i]->setFunds($result[$i]['funds']); //aggiorna l'informazione coerentemente con il db infatti il costruttore setterebbe  founds a zero e visibility a false
                $camps[$i]->setRew(FReward::loadByIdCamp($camps[$i]->getId()));
                $camps[$i]->setComm(FCommento::loadByIdCamp($camps[$i]->getId()));
                $camps[$i]->setMedia(FMediaCamp::loadByIdCamp($camps[$i]->getId()));
                if($result[$i]['visibility']) $camps[$i]->setVis(); 
            }
            return $camps;
        }
        else return null;
    }
	
	static function cercaCampagnaByCategory() : string
    {
        return "SELECT campagne.* , utenti.username
                FROM campagne , utenti
                WHERE LOCATE( :category , category) > 0 AND campagne.founder = utenti.id;";
    }
    
    /**
     * Query che restituisce le campagne in base al nome.
     * @return string la query sql
     */
    static function cercaCampagnaByName() : string
    {
        return "SELECT campagne.*, utenti.username
                FROM campagne, utenti
                WHERE LOCATE( :name , campagne.name) > 0 AND campagne.founder = utenti.id;";
    }

    /**
     * Query che restituisce le campagne in base al founder.
     * @return string la query sql
     */
    static function cercaCampagnaByUsername() : string
    {
        return "SELECT campagne.*, utenti.username
                FROM campagne JOIN utenti ON utenti.id=campagne.founder
                WHERE LOCATE( :username , utenti.username) > 0;";
    }
    
    /**
     * Query che restituisce le campagne in base al country.
     * @return string la query sql
     */
	static function cercaCampagnaByCountry() : string
    {
        return "SELECT campagne.* , utenti.username
                FROM campagne , utenti
                WHERE LOCATE( :country , country) > 0 AND campagne.founder = utenti.id;";
    }

    /**
     * Istanzia l'oggetto campagna dai risultati della query.
     * @param row tupla restituita dal dbms
     * @return camp ritorna l'oggetto campagna 
     */
    static function createObjectFromRow($row) 
    {
        $founder = new EUtente();
        $founder->setUsername($row['username']);
        $camp = new ECampagna();
        $camp->setId($row['id']);
        $camp->setFounder($founder);
        $camp->setName($row['name']);
        $camp->setDescription($row['description']);
        $camp->setCategory($row['category']);
        //$camp->setMedia($row['media']);
        $camp->setCountry($row['country']);
        $camp->setStartDate($row['startdate']);
        $camp->setEndDate($row['enddate']);
        $camp->setBankCount($row['bankcount']);
        $camp->setGoal($row['goal']);
        $camp->setFunds($row['funds']);
        $camp->setVis($row['visibility']);   

        return $camp;
    } 

    static function UpdateFunds($id,$funds){
        $field="funds";
        if(FCampagna::update($id,$field,$funds)) return true;
        else return false;
    }

    static function Update($id,$field,$newvalue){
        $sql="UPDATE ".static::getTables()." SET ".$field."='".$newvalue."' WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->update($sql)) return true;
        else return false;
    }

    static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}

