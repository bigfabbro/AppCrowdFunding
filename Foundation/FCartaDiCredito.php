<?php

require_once 'include.php';

class FCartaDiCredito
{   
    private static $tables="cartedicredito";
    private static $values="(:ownername,:ownersurname,:expirationdate,:ccnumber,:cvv)";
  
    public function __construct(){}
    
        /**
         * Questo metodo lega gli attributi della carta di credito  da inserire con i parametri della INSERT
         * @param PDOStatement $stmt 
         * @param ECartaDiCredito $cc carta di credito i cui dati devono essere inseriti nel DB
         */
    
    
     public static function bind($stmt, ECartaDiCredito $cc){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); //l'id � posto a NULL poich� viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':ownername', $cc->getOwnname(), PDO::PARAM_INT); 
        $stmt->bindValue(':ownersurname', $cc->getOwnsurname(), PDO::PARAM_INT);
        $stmt->bindValue(':expirationdate', $cc->getExdate(), PDO::PARAM_INT); 
        $stmt->bindValue(':ccnumber', $cc->getCcnumber(), PDO::PARAM_INT); 
        $stmt->bindValue(':cvv', $cc->getCvv(), PDO::PARAM_INT); 
     }

      /**
     * 
     * Questo metodo seleziona la carta di credito con un certo id
     * @param PDO &$db 
     * @param int $id numero identificativo della carta di credito da selezionare
     * @return ECartaDiCredito $cc restituisce un oggetto ECartaDiCredito creato con i dati restituiti dal DBMS 
     * 
     */

    public static function load(PDO &$db,$id){
        $sql="SELECT * FROM ".static::$tables." WHERE id=".$id.";";
        try{
           $stmt=$db->prepare($sql);
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);
           $ccr=new ECartaDiCredito($row['ownername'],$row['ownersurname'], $row['epirationdate'], $row['ccnumber'],$row['cvv']);
           $cc->setId($row['id']); 
           return $cc;
        }
       
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
        }
    }



    /**
     * 
     * Questo metodo rimuove dal database una carta di credito con un certo id
     * 
     * @param PDO &$db
     * @param int $id numero identificativo della carta di credito da eliminare 
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
     * questo metodo restituisce la stringa dei useri della tabella sul DB per la costruzione delle Query
     * @return string $values useri della tabella
     */ 

        public static function getValues(){
            return static::$values;
        }
   }
   

