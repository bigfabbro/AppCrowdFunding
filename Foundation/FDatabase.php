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
    private static $UpPath="Upload/";

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
            case(get_class($eobj)=="EMediaCamp"):
               $fobj="FMediaCamp";
               break;
            case(get_class($eobj)=="EMediaRew"):
               $fobj="FMediaRew";
               break;
            case(get_class($eobj)=="EMediaUser"):
               $fobj="FMediaUser";
               break;
            case(get_class($eobj)=="EDonazione"):
               $fobj="FDonazione";
               break;
            case(get_class($eobj)=="ECartaCredito");
               $fobj="FCartaCredito";
               break;
            case(get_class($eobj)=="EUtente");
               $fobj="FUtente";
               break;
            case(get_class($eobj)=="EIndirizzo");
               $fobj="FIndirizzo";
               break;
            case(get_class($eobj)=="EMailCheck");
               $fobj="FMailCheck";
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
    
    public function loadCampByFounder($id){
            $sql="SELECT * FROM ".FCampagna::getTables()." WHERE founder=".$id.";";
            $camps=array();
            try{
                $stmt=$this->db->prepare($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                for($i=0; $i<count($rows); $i++){
                    $camps[]=new ECampagna($rows[$i]['founder'],$rows[$i]['name'], $rows[$i]['description'], $rows[$i]['category'],$rows[$i]['country'],$rows[$i]['startdate'], $rows[$i]['enddate'],$rows[$i]['bankcount'],$rows[$i]['goal']);
                    $camps[$i]->setId($rows[$i]['id']);
                    $camps[$i]->setFunds($rows[$i]['funds']);
                }
                return $camps;
            }
            catch(PDOException $e){
                echo "Attenzione errore: ".$e->getMessage();
                die;
            }
        }

    public function delete($class, $field,$id):bool{
        $fobj="F".$class;
        $sql="DELETE FROM ".$fobj::getTables()." WHERE ".$field."=".$id.";";
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $this->db->commit();
            return true;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return false;
        }
    }
    
    public function update($class, $id, $field, $newvalue):bool {
        $fobj="F".$class;
        if($field=="data"){
            $path=FDatabase::$UpPath.$newvalue; //nel caso in cui si voglia modificare un'immagine $newvalue è il nome del file
            $file=fopen($path,'rb') or die ("Attenzione! Impossibile da aprire!");
            $sql="UPDATE ".$fobj::getTables()." SET data=:data WHERE id=".$id.";";
        }
        else{
            $sql="UPDATE ".$fobj::getTables()." SET ".$field."="."'".$newvalue."'"." WHERE id=".$id.";";
            try {
               $this->db->beginTransaction();
               $stmt=$this->db->prepare($sql);
               if($field=="data"){
                $stmt->bindValue(':data', fread($file,filesize($path)), PDO::PARAM_LOB);
               }
               $stmt->execute();
               $this->db->commit();
               return true;
            }
            catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return false;
            }
        }
    }

    public function exist($class,$field,$val){
        $fobj="F".$class;
        $id=$fobj::exist($this->db,$field,$val);
        return $id;
    }

    public static function getUpPath(){
        return static::$UpPath;
    }

    public function closeDbConnection(){
        unset($this->db);
    }
    
    
    
}

