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
     * Questo metodo seleziona tutti i media relativi  ad una certa campagna 
     * @param PDO &$db 
     * @param int $id numero identificativo della campagna della quale si vogliono selezionare i media
     * @return $media restituisce un array di media relativi ad una certa campagna
     * 
     */
    
    /*public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE idcamp=".$id.";";
        $media=array();
        try{
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $medias=$stmt->fetchAll(PDO::FETCH_ASSOC);
            for($i=0; $i<count($medias); $i++){
                $media[]=new EMediaCamp($medias[$i]['filename'], $medias[$i]['idcamp']);
                $media[$i]->setId($medias[$i]['id']);
                $media[$i]->setData($medias[$i]['data']);
            }
            return $media;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }*/

    public static function getTables(){
        return static::$tables;
    }
    
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

