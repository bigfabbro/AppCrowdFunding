<?php

/**
  * La classe ECampagna contiene tutti gli attributi e metodi base riguardanti le campagne. 
 *  Contiene i seguenti attributi (e i relativi metodi):
 * - id: è un identificativo autoincrement, relativo alla campagna;
 * - founder: id del user che ha creato la campagna;
 * - name: nome della campagna;
 * - description: descrizione della campgna;
 * - category: Settore che riguarda la campagna(es. Ricerca, Tecnologia,...);
 * - media: immagini o video riguardante la campagna;
 * - rewards: ricompense
 * - country: nazione dove avr  luogo la campagna
 * - startdate: data inizio raccolta fondi
 * - enddate: data fine raccolta fondi
 * - bankcount: deposito relativo alla campagna
 * - goal: obbiettivo
 * - funds: fondi raccolti 
 * - visibility: variabile di approvazione campagna
 * - comments: commenti
 * @author Gruppo 3
 * @package Entity
 */
class ECampagna
{
    /** numero identificativo campagna */
    private $id; 
    /** id creatore campagna */
    private $founder; 
    /** nome campagna */
    private $name; 
    /** descrizione della campagna */
    private $description; 
    /** settore che riguarda la campagna */
    private $category; 
    /** immagini o video riguardante la campagna */
    private $media; 
    /** ricompense */
    private $rewards; 
    /** nazione dove avrà luogo la campagna  */
    private $country; 
    /** data inizio raccolta fondi */
    private $startdate; 
    /** data fine raccolta fondi */
    private $enddate; 
    /** deposito relativo alla campagna */
    private $bankcount; 
    /** obbiettivo */
    private $goal; 
    /** fondi raccolti */
    private $funds;  
    /** variabile di approvazione campagna */
    private $visibility; 
    /** commenti */
    private $comments; 
    /** costruttore */
    public function  __construct($founder=null,$na=null, $de=null, $cat=null, $cou=null, $stad=null, $endd=null, $bc=null,$gl=null){
        $this->founder=$founder;
        $this->name=$na;
        $this->description=$de;
        $this->category=$cat;
        $this->media=array();
        $this->rewards=array();
        $this->country=$cou;
        $this->startdate=$stad;
        $this->enddate=$endd;
        $this->bankcount=$bc;
        $this->goal=$gl;
        $this->funds=0; //il totale fondi raccolti inizialmente e' posto a zero
        $this->visibility=false; //la visibilita' e' posta a true soltanto quando la campagna viene effettivamente pubblicata
        $this->comments=array();
         }
         
    /**
     *  @param int $founder id del creatore
     */    
    public function setFounder($founder){
        $this->founder=$founder;
    }
    /** 
     * @return int id relativo al creatore
    */
    public function getFounder(){
        return $this->founder;
    }
    /** 
     *  @param int $id relativo alla campagna
    */
    public function setId($id){
        $this->id=$id;
    }
    /** 
     * @return int id della campagna
    */
    public function getId(){
        return $this->id;
    }
    /** 
     * @return string nome della campagna
    */
    public function getName () {
    return $this->name;
    }
    /** 
     *  @param string $na nome della campagna
    */
    public function setName ($na){
    $this->name=$na;
    }
    /** 
     * @return string descrizione della campagna
    */
    public function getDescription () {
    return $this->description;
    }
    /** 
     *  @param string $de descrizione della campagna
    */
    public function setDescription ($de){
    $this->description=$de;
    }
    /** 
     * @return string tipo di categoria
    */
    public function getCategory () {
        return $this->category;
    }
    /** 
     *  @param string $ca tipo di categoria
    */
    public function setCategory ($ca){
        $this->category=$ca;
    }
    /** 
     * @return array con i media della campagna
    */
    public function getMedia () {
        return $this->media;
    }
    /** 
     *  @param array $med array con i media della campagna
    */
    public function setMedia ($med){
        $this->media=$med;
    }
    /**
     *  @return string paese dove avrà luogo la campagna
     */
    public function getCountry () {
        return $this->country;
    }
    /**
     *  @param string $cou paese dove avrà luogo la campagna
     */
    public function setCountry ($cou){
        $this->country=$cou;
    }
    /** 
     * @return date data inizio campagna
    */
    public function getStartDate () {
        return $this->startdate;
    }
    /** 
     *  @param date $stad data inizio campagna
    */
    public function setStartDate ($stad){
        $this->startdate=$stad;
    }
    /** 
     * @return date data fine campagna
    */
    public function getEndDate () {
        return $this->enddate;
    }
    /** 
     *  @param date $endd data fine campagna
    */
    public function setEndDate ($endd){
        $this->enddate=$endd;
    }
    /** 
     *  @return int deposito della campagna
    */
    public function getBankCount () {
        return $this->bankcount;
    }
    /** 
     *  @param int $bc deposito della campagna
    */
    public function setBankCount ($bc){
        $this->bankcount=$bc;
    }
    /** 
     * @return int obbiettivo campagna
    */
    public function getGoal(){
       return $this->goal;
    }
    /** 
     *  @param int $gl obbiettivo campagna
    */
    public function setGoal($gl){
        $this->goal=$gl;
    }
    /** 
     * @return int visibilità campagna
    */
    public function getVis(){
        return $this->visibility;
    }
    /** 
     *  @param int $fnd fondi raccolti campagna
    */
    public function setFunds($fnd){
        $this->funds=$fnd;
    }
    /** 
     * @return int fondi raccolti campagna
    */
    public function getFunds(){
        return $this->funds;
    }
    /** 
     *  Setta la visibilità della campagna
    */
    public function setVis(){
        $this->visibility=true;
    }
    /** 
     *  Oscura la campagna
    */
    public function setHid(){
        $this->visibility=false;
    }
    /** 
     *  @param array $rew  array contentente le ricompense
    */
    public function setRew($rew){
        $this->rewards=$rew;
    }
    /** 
     * @return array contenente le ricompense
    */
    public function getRew(){
        return $this->rewards;
    }
    /** 
     *  @param array $comm commenti 
    */
    public function setComm($comm){
        $this->comments=$comm;
    }
    /** 
     * @return array con i commenti relativi alle campagne
    */
    public function getComm(){
        return $this->comments;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool controlla se il nome è utilizzabile
     */
    static function valName($val):bool{
        $replace=array(" ","'");
        if(preg_match('/^[a-zA-Z0-9]{3,50}$/',str_replace($replace,'',$val)) && !FCampagna::ExistName($val)){
            return true;
        }
        else return false;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito 
     * @return bool 
     */
    static function valCountry($val):bool{
        $replace=array(" ","'");
        if(preg_match('/^[a-zA-Z]{0,30}$/',str_replace($replace,'',$val))){
            return true;
        }
        else return false;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool 
     */
    static function valGoal($val):bool{
        if(preg_match('/^[0-9]{1,10}$/',$val)){
            return true;
        } 
        else return false;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool controlla se data sia valida
     */
    static function valDate($val):bool{
        $correct=false;
        $date=explode('-',$val);
        if(checkdate($date[1],$date[2],$date[0])){
          if($date[0]>=date('Y')){
              if($date[0]>date('Y')){
                  $correct=true;
              }
              else{
                  if($date[1]>=date('m')){
                      if($date[1]>date('m')){
                          $correct=true;
                      }
                      else{
                          if($date[2]>date('d')){
                              $correct=true;
                          }
                      }
                  }
              }
          }
        }
        return $correct;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool 
     */
    static function valBankcount($val):bool{
        $replace=array(" ","'");
        if(preg_match('/^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$/i',str_replace($replace,'',$val))){
            return true;
        }
        else return false;
    }
    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool controlla se la categoria è esistente
     */
    static function valCategory($val):bool{
        if($val=="Tecnology" || $val=="Art" || $val=="Charities" || $val=="Music" || $val=="Food" || $val=="Fashion" || $val=="Film & Video"){
            return true;
        }
        else return false;
    }
    /** Stampa le informazioni della campagna */
    public function __toString(){
        $st="Founder: ".$this->getFounder()." ID: ".$this->getId()." Name: ".$this->getName()." Description: ".$this->getDescription()." Goal: ".$this->getGoal()." Bank account: ".$this->bankcount." Start Date: ".$this->startdate." End Date: ".$this->enddate." Funds: ".$this->getFunds()."\n";
        foreach($this->getRew() as $rew){
            $st=$st.$rew."\n";
        }
        foreach($this->getComm() as $comm){
            $st=$st.$comm."\n";
        }
        foreach($this->getMedia() as $media){
            $st=$st.$media."\n";
        }
        
        return $st;
    }
}