<?php
require_once 'include.php';
require_once 'conf.inc.php';
/*  Singleton: rappresenta un tipo particolare di classe che garantisce
 *  che soltanto un'unica istanza della classe stessa possa essere creata 
 *  all'interno di un programma
 */
class FDatabase
{
    private static $instance=null;
    private $db;

    private function __construct() // viene dichiarato private cos� che l'unico accesso al costruttore 
    {                              //� dato dal metodo getInstance()
        global $host,$database,$username,$password;
        try{
            $this->db=new PDO("mysql:host=$host; dbname=$database", $username,$password);
        }
        catch(PDOException $e)
        {
          echo "Attenzione errore: ".$e->getMessage();
          die;
        }
    }
    
    public static function getInstance(){ //restituisce l'unica istanza (creandola se non esiste gi�)
        if(static::$instance==null){  
            static::$instance=new FDatabase(); 
        }
        return static::$instance;
    }
    
    public function recClass($eobj){
        switch($eobj){
            case(get_class($eobj)=="ECampagna"):
               $fobj="FCampagna";
               break;
            case(get_class($eobj)=="EReward"):
               $fobj="FReward";
               break;
            case(get_class($eobj)=="EMedia"):
               $fobj="FMedia";
               break;
            case(get_class($eobj)=="EDonazione"):
               $fobj="FDonazione";
               break;
            case(get_class($eobj)=="ECartaCredito");
               $fobj="FCartaCredito";
               break;
            case(get_class($eobj)=="EUtente");
               $fobj="FUtenteRegistrato";
               break;
        }
        return $fobj;
    }
    
    public function store($eobj){
        $fobj=$this->recClass($eobj); //viene riconosciuta la classe dell'oggetto i cui dati devono essere inseriti nel Db
        $sql="INSERT INTO ".$fobj::getTables()." VALUES".$fobj::getValues(); //si genera il codice sql attraverso gli attributi statici della determinata classe Foundation
        $this->runQuery($sql,$fobj,$eobj); 
    }
    
    public function runQuery($sql,$fobj,$eobj){
        try{
           $this->db->beginTransaction(); //inizia la transazione 
           $stmt=$this->db->prepare($sql); //viene preparata la query 
           $fobj::bind($stmt,$eobj); //bind dei parametri attraverso metodo statico della determinata classe Foundation
           $stmt->execute(); //esecuzione della query
           $this->db->commit(); // se non ci sono errori le modifiche vengono rese definitive
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage()." [".$e->getCode()."]"; 
            $this->db->rollBack(); //in caso di errori si torna alla situazione precedente 
        }
    }
    
    public function load($class,$id){ // $class contiene il nome della classe Es. Campagna, Utente ecc.
        $fobj="F".$class; //si aggiunge F alla stringa $class cosi da ottenere il nome della classe Foundation
        $eobj=$fobj::load($this->db,$id); // si richiama il metodo statico load della determinata classe Foundation
        return $eobj;
    }
    
    public function delete($class,$id):bool{
        $fobj="F".$class;
        if($fobj::delete($this->db,$id)) return true;
        else return false;
    }
    
    
    public function update($class, $id, $field, $newvalue) //field e'� il nome del campo del valore da modificare
    {
       $fobj="F".$class;
       if($fobj::update($this->db, $id, $field, $newvalue)) return true;
       else return false;
    }

    public function exist($class,$field,$val){
        $fobj="F".$class;
        $id=$fobj::exist($this->db,$field,$val);
        return $id;
    }
    
    
    
}

