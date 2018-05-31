<?php


class ECampagna
{
    private $id; //numero identificativo 
    private $founder; //creatore campagna
    private $name; //nome campagna
    private $description; //descrizione della campagna
    private $category; //settore che riguarda la campagna (es. Ricerca, Tecnologia, Arte ecc.)
    private $media; //immagini o video riguardante la campagna
    private $rewards; //ricompense
    private $country; //nazione dove avr� luogo la campagna
    private $startdate; //data inizio raccolta fondi
    private $enddate; //data fine raccolta fondi
    private $bankcount; //deposito relativo alla campagna
    private $goal; //obbiettivo
    private $funds; //fondi raccolti 
    private $visibility; //variabile di approvazione campagna
    private $comments; //commenti
    
    public function  __construct($founder,$na, $de=null, $cat, $cou, $stad, $endd, $bc,$gl){
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
        $this->funds=0; //il totale fondi raccolti inizialmente � posto a zero
        $this->visibility=false; //la visibilit�� � posta a true soltanto quando la campagna viene effettivamente pubblicata
        $this->comments=array();
         }
         
        
     public function setFounder($founder){
        $this->founder=$founder;
    }
    
    public function getFounder(){
        return $this->founder;
    }
    public function setId($id){
        $this->id=$id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getName () {
    return $this->name;
    }
    
    public function setName ($na){
    $this->name=$na;
    }

    public function getDescription () {
    return $this->description;
    }
    
    public function setDescription ($de){
    $this->description=$de;
    }
    
    public function getCategory () {
        return $this->category;
    }
    
    public function setCategory ($ca){
        $this->category=$ca;
    }
    
    public function getMedia () {
        return $this->media;
    }
    
    public function setMedia ($med){
        $this->media=$med;
    }
    
    public function getCountry () {
        return $this->country;
    }
    
    public function setCountry ($cou){
        $this->country=$cou;
    }
    
    public function getStartDate () {
        return $this->startdate;
    }
    
    public function setStartDate ($stad){
        $this->startdate=$endd;
    }
    
    public function getEndDate () {
        return $this->enddate;
    }
    
    public function setEndDate ($endd){
        $this->enddate=$endd;
    }
    
    public function getBankCount () {
        return $this->bankcount;
    }
    
    public function setBankCount ($bc){
        $this->bankcount=$bc;
    }
    
    public function getGoal(){
       return $this->goal;
    }
    
    public function setGoal($gl){
        $this->goal=$gl;
    }
    
    public function getVis(){
        return $this->visibility;
    }
    
    public function setFunds($fnd){
        $this->funds=$fnd;
    }
    
    public function getFunds(){
        return $this->funds;
    }
    
    public function setVis(){
        $this->visibility=true;
    }
    
    public function setHid(){
        $this->visibility=false;
    }
    
    public function setRew($rew){
        $this->rewards=$rew;
    }
    
    public function getRew(){
        return $this->rewards;
    }

    public function setComm($comm){
        $this->comments=$comm;
    }
    
    public function getComm(){
        return $this->comments;
    }


    
    public function __toString(){
        $st="Founder: ".$this->getFounder()." ID: ".$this->getId()." Name: ".$this->getName()." Description: ".$this->getDescription()." Goal: ".$this->getGoal()." End Date: ".$this->enddate."\n";
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