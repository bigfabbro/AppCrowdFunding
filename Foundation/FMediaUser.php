<?php

require_once 'include.php';

class FMediaUser
{

    private static $tables="mediauser";
    private static $values="(:id,:filename,:data,:iduser)";
     
    
    public function __construct(){}

     /**
     * Questo metodo lega gli attributi dell'oggetto multimediale da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EMedia $md media i cui dati devono essere inseriti nel DB
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

    public static function getTables(){
        return static::$tables;
    }
    
    public static function getValues(){
        return static::$values;
    }

    public static function store($media){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FMediaUser",$media);
        if($id) return $id;
        else return null;
    }

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

    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }

    public static function deleteByIdUser($id){
        $sql="DELETE FROM ".static::getTables()." WHERE iduser=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}

