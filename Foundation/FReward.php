<?php

require_once 'include.php';

class FReward
{
    private static $tables="rewards";
    private static $values="(:id,:name,:pledged,:description,:reward,:idcamp)";
    
    public function __construct()
    {}

     /**
     * Questo metodo lega gli attributi della reward da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EReward $rew reward i cui dati devono essere inseriti nel DB
     */
    
    public static function bind($stmt, EReward $rew){
        $stmt->bindValue(':id',NULL, PDO::PARAM_STR);
        $stmt->bindValue(':name', $rew->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':pledged', $rew->getPledged(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $rew->getDescriptionRe(), PDO::PARAM_STR);
        $stmt->bindValue(':reward', $rew->getreward(), PDO::PARAM_STR);
        $stmt->bindValue(':idcamp', $rew->getIdCamp(), PDO::PARAM_STR);
    }

    /**
     * 
     * Questo metodo seleziona le reward relative ad una certa campagna
     * @param PDO &$db 
     * @param int $id numero identificativo della campagna della quale si vogliono selezionare le reward
     * @return $rew restituisce un array di reward relative ad una specifica campagna
     * 
     */

    /*public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE idcamp=".$id.";";
        $rew=array();
        try{
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $rews=$stmt->fetchAll(PDO::FETCH_ASSOC);
            for($i=0; $i<count($rews); $i++){
                $rew[]=new EReward($result['name'], $result['pledged'], $result['description'], $result['reward'], $result['idcamp']);
                $rew[$i]->setId($result['id']);
            }
            return $rew;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }
      
    public static function delete(PDO &$db, $id):bool{
        $sql="DELETE FROM ".static::getTables()." WHERE id=".$id.";";
        try{
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
        
    }*/
    
    public static function getTables(){
        return static::$tables;
    }
    
    public static function getValues(){
        return static::$values;
    }

    public static function loadByIdCamp($id){
        $sql="SELECT * FROM ".static::getTables()." WHERE idcamp=".$id.";";
        $db=FDatabase::getInstance();
        $result=$db->loadMultiple($sql);
        if($result!=null){
            if(is_array($result)){
                $rewards=array();
                for($i=0; $i<count($result); $i++){
                    $rewards[]=new EReward($result['name'], $result['pledged'], $result['description'], $result['reward'], $result['idcamp']);
                    $rewards[$i]->setId($result['id']);
                }
                return $rewards;
            }
            else{
                $reward=new EReward($result['name'], $result['pledged'], $result['description'], $result['reward'], $result['idcamp']);
                $reward->setId($result['id']);
                return $reward;
            }
        }
        return null;
    }
    
}
