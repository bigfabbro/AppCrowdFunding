<?php

require_once 'include.php';
/**
 * La classe FMediaUser fornisce query per gli oggetti EMediaUser (foto riguardanti l'utente)
 * @author Gruppo 3
 * @package Foundation
 */

class FMediaUser
{

    private static $tables="mediauser";
    private static $values="(:id,:filename,:data,:iduser)";
     
    
    public function __construct(){}

     /**
     * Questo metodo lega gli attributi dell'oggetto multimediale da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EMediaUser $md media i cui dati devono essere inseriti nel DB
     */
    
    
    public static function bind($stmt,EMediaUser $md){
        $path=FDatabase::getUpPath().$md->getFname();
        $file=fopen($path,'rb') or die ("Attenzione! Impossibile da aprire!");
        $stmt->bindValue(':id',NULL, PDO::PARAM_STR); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':filename',$md->getFname(), PDO::PARAM_STR);
        $stmt->bindValue(':data', fread($file,filesize($path)), PDO::PARAM_LOB);
        $stmt->bindValue(':iduser', $md->getIdUser(), PDO::PARAM_STR);
        unset($file);
        unlink($path);
    }


   /**
     * 
     * Questo metodo restituisce il nome della tabella sul DB per la costruzione delle Query
     * @return string $tables nome della tabella
     */

    public static function getTables(){
        return static::$tables;
    }

    /**
     * Questo metodo restituisce la stringa dei valori della tabella sul DB per la costruzione delle Query
     * @return string $values valori della tabella
     */
    
    
    
    public static function getValues(){
        return static::$values;
    }

    /** 
     * Funzione che permette la store dell'oggetto media
     * @param object $media da salvare
     * @return int $id dell'oggetto salvato
     */

    public static function store($media){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FMediaUser",$media);
        if($id) return $id;
        else return null;
    }

    /**
     * Funzione che permette la load dell'oggetto media in base all'id
     * @param int $id dell'oggetto 
     * @return object $media
     */

    public static function loadById($id){
        $sql="SELECT * FROM ".static ::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $media= new EMediaUser($result['filename'], $result['iduser']);
            $media->setId($result['id']);
            $media->setData($result['data']);
            return $media;
        }
        else return null;
    }

    /**
     * Funzione che permette la load della foto in base all'id dell'user
     * @param int $id dell'user
     * @return object $media 
     */

    public static function loadByIdUser($id){
        $sql="SELECT * FROM ".static ::getTables()." WHERE iduser=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $media= new EMediaUser($result['filename'], $result['iduser']);
            $media->setId($result['id']);
            $media->setData($result['data']);
            return $media;
        }
        else return null;
    }

    /**
     * Metodo che permette la delete della foto in base all'id
     * @param  int $id della foto
     * @return bool
     */

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

    /**
     * Funzione che permette la cancellazione della foto in base all'id dell'utente
     * @param int $id dell'utente
     * @return bool
     */

    public static function deleteByIdUser($id){
        $sql="DELETE FROM ".static::getTables()." WHERE iduser=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}

