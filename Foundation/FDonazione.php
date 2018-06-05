<?php

require_once 'include.php';


class FDonazione
{
    private static $tables="donazioni";
    private static $values="(:id,:amount,:date,:reward,:idutente, :idcamp, :donationoccurred, :idcc)";

    public function __construct()
    {}

     /**
     * Questo metodo lega gli attributi della donazione da inserire con i parametri della INSERT
     * @param PDOStatement $stmt 
     * @param EDonazione $don donazione i cui dati devono essere inseriti nel DB
     */

        public static function bind($stmt, EDonazione $don){
            $stmt->bindValue(':id',NULL, PDO::PARAM_INT);
            $stmt->bindValue(':amount', $don->getAmount(), PDO::PARAM_STR);
            $stmt->bindValue(':date', $don->getDate(), PDO::PARAM_STR);
            $stmt->bindValue(':reward', $don->getReward(), PDO::PARAM_STR);
            $stmt->bindValue(':idutente', $don->getIdUtente(), PDO::PARAM_INT);
            $stmt->bindValue(':idcamp', $don->getIdCamp(), PDO::PARAM_INT);
            $stmt->bindValue(':donationoccurred',$don->getOcc(), PDO::PARAM_BOOL);
            $stmt->bindValue(':idcc', $don->getCreditCard(), PDO::PARAM_INT);
        }

    

     /**
     * 
     * Questo metodo seleziona la donazione con un certo id
     * @param PDO &$db 
     * @param int $id numero identificativo della donazione da selezionare
     * @return EDonazione $don restituisce un oggetto EDonazione creato con i dati restituiti dal DBMS 
     * 
     */
    
    public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE id=".$id.";";
        try{
           $stmt=$db->prepare($sql);
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);
           $don=new EDonazione($row['amount'],$row['date'], $row['reward'], $row['idutente'], $row['idcamp'],$row['donationoccurred'], $row['idcc']);
           $don->setId($row['id']);
           $don->setCc(FReward::load($db, $don->getId()));
           
           
           return $cc;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }





    
    /**
     * 
     * Questo metodo rimuove dal database una donazione con un certo id
     * 
     * @param PDO &$db
     * @param int $id numero identificativo della donazione da eliminare 
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





        public static function getTables(){
            return static::$tables;
        }
        
        public static function getValues(){
            return static::$values;
        }

    }