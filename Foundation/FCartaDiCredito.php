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
        $stmt->bindValue(':founder', $cc->getFounder(), PDO::PARAM_INT); 
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
        }
    //devo finire ho sonnooooo