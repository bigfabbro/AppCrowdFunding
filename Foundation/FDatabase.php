<?php
require_once 'include.php';

if(file_exists('config.inc.php')) require_once 'config.inc.php';
/*  Singleton: rappresenta un tipo particolare di classe che garantisce
 *  che soltanto un'unica istanza della classe stessa possa essere creata 
 *  all'interno di un programma
 */

/**
 * Lo scopo di questa classe e' quello di fornire un accesso unico al DBMS, incapsulando
 * al proprio interno i metodi statici di tutte le altre classi Foundation, cosi che l'accesso
 * ai dati persistenti da parte degli strati superiore dell'applicazione sia piu' intuitivo.
 * @author gruppo 3
 * @package Foundation
 */
class FDatabase
{
    /** l'unica istanza della classe */
    private static $instance=null;
    /** oggetto PDO che effettua la connessione al dbms */
    private $db;
    /** percorso */
    private static $UpPath="Upload/";
    /** costruttore privato, l'unico accesso è dato dal metodo getInstance() */
    private function __construct()
    {                              
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
     /**
     * Metodo che restituisce l'unica istanza dell'oggetto.
     * @return FPersistantManager l'istanza dell'oggetto.
     */
    public static function getInstance(){ //restituisce l'unica istanza (creandola se non esiste gi�)
        if(static::$instance==null){  
            static::$instance=new FDatabase(); 
        }
        return static::$instance;
    }
     /**
     * Metodo che permette di salvare informazioni contenute in un oggetto
     * Entity sul database.
     */
    public function store($sql,$class,$eobj){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $class::bind($stmt,$eobj);
            $stmt->execute();
            $id=$this->db->lastInsertId();
            $this->db->commit();
            $this->closeDbConnection();
            return $id;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return null;
        }
    }

    public function loadMultiple($sql){
        try{
            $rows=array();
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row=$stmt->fetch()){
                $rows[]=$row;
            }
            $this->closeDbConnection();
            return $rows;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
            return null;
        }
    }

    public function loadSingle($sql){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $this->closeDbConnection();
            return $row;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
            return null;
        }
    }

    public function delete($sql){
        try{
            $this->db->beginTransaction();
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $this->db->commit();
            $this->closeDbConnection();
            return true;
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return false;
        }
    }

    public function update($sql){
        try{
             $this->db->beginTransaction();
              $stmt=$this->db->prepare($sql);
              $stmt->execute();
              $this->db->commit();
              $this->closeDbConnection();
              return true;
            }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            $this->db->rollBack();
            die;
            return false;
        }
    }

    public function exist($sql){
        try{
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows)==1) return $rows[0];
            else if(count($rows)>1) return $rows;
            $this->closeDbConnection();
        }
        catch(PDOException $e){
            echo "Attenzione errore: ".$e->getMessage();
            die;
            return null;
        }
    }


    public static function getUpPath(){
        return static::$UpPath;
    }

    public function closeDbConnection(){
        static::$instance=null;
    }


 /******************************************RICERCA***************************************************/
   
 /**
     * Effettua una ricerca sul database secondo i parametri selezionati. 
     * Tale metodo e' scaturito a seguito della ricerca avanzata da parte dell'utente.
     * @param key la table da cui prelevare i dati
     * @param value il valore per cui cercare i valori
     * @param str il dato richiesto dall'utente
     * @return array|NULL i risultati ottenuti dalla ricerca. Se la richiesta non ha match, ritorna NULL.
     */
    function cercaAv(string $key, string $value, string $str) 
    {
        $sql = '';
        $className = 'F'.$key;
        
        if(class_exists($className))
        {
            $method = 'cerca'.$key.'By'.$value;
            if(method_exists($className, $method))
                $sql = $className::$method();
        }

        if($sql)
            return $this->exeCerca('F'.$key, $value, $str, $sql);
        else return NULL;
    }
    
    /**
     * Funzione privata che prepara ed esegue la query.
     * @return obj torna l'oggetto (Utente o Campagna) ricercato
     */
    private function exeCerca(string $className, string $value, string $str, string $sql)
    {
        try
        {
            $stmt = $this->db->prepare($sql); // creo PDOStatement
            $stmt->bindValue(":".lcfirst($value), $str, PDO::PARAM_STR); //si associa l'id al campo della query
            $stmt->execute();   //viene eseguita la query
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // i risultati del db verranno salvati in un array con indici le colonne della table
           
            $obj = NULL; // l'oggetto di ritorno viene definito come NULL
            
            while($row = $stmt->fetch())
            { // per ogni tupla restituita dal db...
                $obj[] = FDatabase::createObjectFromRow($className, $row); //...istanzio l'oggetto
            }
   
            return $obj;
        }
        catch (PDOException $e)
        {
            return null; // ritorna null se ci sono errori
        }
    }
    

    /**
     * Da una tupla ricevuta di una query istanzia l'oggetto corrispondente
     * @param class il nome della classe 
     * @param row array la tupla restituita dal dbms
     * @return obj l'oggetto risultato dell'elaborazione
     */
    private function createObjectFromRow(string $class, $row)
    {
        $obj = NULL; //oggetto che conterra' l'istanza dell'elaborazione
        
        if ( class_exists( $class ) ) 
        {
            $obj = $class::createObjectFromRow($row);         
        }
        
        return $obj;
    }

    /**
     * Effettua una ricerca sul database secondo i parametri selezionati. 
     * Tale metodo e' scaturito a seguito della ricerca base da parte dell'utente.
     * @param cont parametro che indica quale gruppo di istruzioni eseguire
     * @param str il dato richiesto dall'utente
     * @return array|NULL i risultati ottenuti dalla ricerca. Se la richiesta non ha match, ritorna NULL.
     */
    function cerca($cont, string $str) 
    {
        $sql = '';
        if($cont == 0){
            $method= 'cercaUtenteByUsername';
            $sql = FUtente::$method();
            $className='Utente';
            $value='Username';
        }
        else if($cont == 1){
            $method= 'cercaCampagnaByCategory';
            $sql = FCampagna::$method(); 
            $className='Campagna';
            $value='Category';
        }
        else if($cont == 2){
            $method= 'cercaCampagnaByName';
            $sql = FCampagna::$method(); 
            $className='Campagna';
            $value='Name';
        }

        if($sql)
            return $this->exeCerca('F'.$className, $value, $str, $sql);
        else return NULL;
    }


}