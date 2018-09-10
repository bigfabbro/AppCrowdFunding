<?php

require_once 'include.php';

class FMediaCamp
{

    private static $tables="mediacamp";
    private static $values="(:id,:filename,:data,:idcamp)";
     
    
    public function __construct(){}

     /**
     * Questo metodo lega gli attributi dell'oggetto multimediale da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EMedia $md media i cui dati devono essere inseriti nel DB
     */
    
    
    public static function bind($stmt,EMediaCamp $md){
        $path=FDatabase::getUpPath().$md->getFname();
        $file=fopen($path,'rb') or die ("Attenzione! Impossibile da aprire!");
        $stmt->bindValue(':id',NULL, PDO::PARAM_STR); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':filename',$md->getFname(), PDO::PARAM_STR);
        $stmt->bindValue(':data', fread($file,filesize($path)), PDO::PARAM_LOB);
        $stmt->bindValue(':idcamp', $md->getIdCamp(), PDO::PARAM_STR);
        unset($file);
        unlink($path);
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
    public static function store($media){
        $sql="INSERT INTO ".static::getTables()." VALUES ".static::getValues();
        $db=FDatabase::getInstance();
        $id=$db->store($sql,"FMediaCamp",$media);
        if($id) return $id;
        else return null;
    }

    public static function loadById($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadSingle($sql);
        if($result!=null){
            $media=new EMediaCamp($result[$i]['filename'], $result[$i]['idcamp']);
            $media->setId($result['id']);
            $media->setData($result['data']);
            return $media;
        }
        else return null;
    }

    public static function loadByIdCamp($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE idcamp=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            if(is_array($result)){
                $medias=array();
                for($i=0; $i<count($result); $i++){
                    $medias[]=new EMediaCamp($result[$i]['filename'], $result[$i]['idcamp']);
                    $medias[$i]->setId($result[$i]['id']);
                    $medias[$i]->setData($result[$i]['data']);
                }
                return $medias;
            }
            else{
                $media=new EMediaCamp($result[$i]['filename'], $result[$i]['idcamp']);
                $media->setId($result['id']);
                $media->setData($result['data']);
                return $media;
            }
        }
        return null;
    }
    
    public static function delete($id){
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        $db=FDatabase::getInstance();
        if($db->delete($sql)) return true;
        else return false;
    }
}

