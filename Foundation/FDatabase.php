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



}