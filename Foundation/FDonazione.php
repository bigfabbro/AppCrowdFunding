<?php

require_once 'include.php';


class FDonazione
{
    private static $tables="donazioni";
    private static $values="(:id,:amount,:date,:reward,:username, :idcamp, :donationoccurred, :creditcard)";

    public function __construct()
    {}

     /**
     * Questo metodo lega gli attributi della donazione da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EDonazione $don donazione i cui dati devono essere inseriti nel DB
     */

        public static function bind($stmt, EDonazione $don){
            $stmt->bindValue(':id',NULL, PDO::PARAM_STR);
            $stmt->bindValue(':amount', $don->getAmount(), PDO::PARAM_STR);
            $stmt->bindValue(':date', $don->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':reward', $don->getReward(), PDO::PARAM_STR);
            $stmt->bindValue(':username', $don->getIdUser(), PDO::PARAM_STR);
            $stmt->bindValue(':idcamp', $don->getIdCamp(), PDO::PARAM_STR);
            $stmt->bindValue(':creditcard', $don->getCreditCard(), PDO::PARAM_STR);
        }

    public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE idcamp=".$id.";";
        $don=array();
        try{
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $dons=$stmt->fetchAll(PDO::FETCH_ASSOC);
            for($i=0; $i<count($dons); $i++){
                $don[]=new EDonazione($dons[$i]['amount'], $dons[$i]['date'], $dons[$i]['reward'], $dons[$i]['username'], $dons[$i]['idcamp']);
                $don[$i]->setId($dons[$i]['id']);
            }
            return $don;
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
                
            }

        public static function getTables(){
            return static::$tables;
        }
        
        public static function getValues(){
            return static::$values;
        }

    }