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
           $camp->setMedia(FMediaCamp::load($db,$camp->getId()));
           if($row['visibility']) $camp->setVis(); 
           return $camp;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }
    
    public static function getTables(){
        return static::$tables;
    }

    
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

