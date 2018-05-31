<?php

require_once 'include.php';

class FCommento
{

    private static $tables="commenti";
    private static $values="(:id,:user,:text,:date,:idcamp)";
    
    public function __construct(){}
    
    /**
     * Questo metodo lega gli attributi del commento  da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param ECommento $comm commento i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt,ECommento $comm){
        $stmt->bindValue(':id',NULL, PDO::PARAM_STR); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':user', $camp->getUser(), PDO::PARAM_STR);
        $stmt->bindValue(':text', $camp->getText(), PDO::PARAM_STR);
        $stmt->bindValue(':date', $camp->getDate(), PDO::PARAM_STR);
        $stmt->bindValue(':idcamp', $camp->getIdCamp(), PDO::PARAM_STR);
    }

    /**
     * 
     * Questo metodo seleziona i commenti relativi ad una certa campagna
     * @param PDO &$db 
     * @param int $id numero identificativo della campagna della quale si vogliono selezionare i commenti
     * @return  $camp restituisce un array di commenti relativi ad un certa campagna
     * 
     */
    
    public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE idcamp=".$id.";";
        $comm=array();
        try{
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $comms=$stmt->fetchAll(PDO::FETCH_ASSOC);
            for($i=0; $i<count($comms); $i++){
                $comm[]=new ECommento($comms[$i]['user'], $comms[$i]['text'], $comms[$i]['date'], $comms[$i]['idcamp']);
                $comm[$i]->setId($comms[$i]['id']);
            }
            return $comm;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }

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

    public static function getTables(){
        return static::$tables;
    }
    
    public static function getValues(){
        return static::$values;
    }
}

