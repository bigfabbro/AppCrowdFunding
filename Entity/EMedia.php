<?php

require_once 'include.php';

/**
 * La classe EMedia contiene tutti gli attributi e metodi base riguardanti i media. 
 * Contiene i seguenti attributi (e i relativi metodi):
 * -id: è un identificativo autoincrement, relativo ai media;
 * -filename: nome del media;
 * -data: dati media.
 *  @author Gruppo 3
 *  @package Entity
 */ 
class EMedia {
    /** id media */
    private $id;
    /** nome media */
    private $filename;
    /** dati media */
    private $data; 
    /** costruttore */
    public function __construct($fname){
        $this->filename=$fname;
        $this->data=NULL;
    }
    /**
     * @return int id media
     */
    public function getId(){
        return $this->id;
    }
    /**
     * @param int $id media
     */
    public function setId($id){
        $this->id=$id;
    }
    /**
     * @return string nome media
     */
    public function getFname(){
        return $this->filename;
    }
    /**
     * @param string $fname nome media
     */
    public function setFname($fname){
        $this->filename=$fname;
    }
    /**
     * @return longnlob dati media
     */
    public function getData(){
        return $this->data;
    }
    /**
     * @param longblob $data informazioni media
     */
    public function setData($data){
         $this->data=$data;
    }
    /**
     * Stampa le informazioni dei media
     */
    public function __toString(){
        $st="Id: ".$this->getId()." filename: ".$this->getFname()." Data: ".$this->getData();
        return $st;
    }


}