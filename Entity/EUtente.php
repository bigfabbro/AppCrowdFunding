<?php

require_once 'include.php';

class EUtente
{
    private $id;
    private $username;
    private $password;
    private $name;
    private $surname;
    private $email;
    private $telnumber;
    private $address;
    private $profpic;
    private $bio;
    private $tipo; //privato,pubblico, azienda
    private $permits; //guest,registered or administrator
    
    public function __construct($un,$pass=null,$name=null,$surname=null,$em=null,$tel=null, $add=null,$pic=null,$b=null,$tipo=null,$permits=null){
        $this->username=$un;
        $this->password=$pass;
        $this->name=$name;
        $this->surname=$surname;
        $this->email=$em;
        $this->telnumber=$tel;
        $this->address=$add;
        $this->profpic=$pic;
        $this->bio=$b;
        $this->tipo=$tipo;
        $this->permits=$permits;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    
    public function getSurname(){
        return $this->surname;
    }
   
    public function getUserName(){
        return $this->username;
    }
    
    public function getPass(){
        return $this->password;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function getAddress(){
        return $this->address;
    }
    
    public function getTel(){
        return $this->telnumber;
    }
    
    public function getPic(){
        return $this->profpic;
    }
    
    public function getBio(){
        return $this->bio;
    }
    
    public function getTipo(){
        return $this->tipo;
    }

    public function getPermits(){
        return $this->permits;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setUserName($un){
        $this->username=$un;
    }
    
    public function setPass($pass){
        $this->password=$pass;
    }
    
    public function setEmail($em){
        $this->email=$em;
    }
    
    public function setTel($tel){
        $this->telnumber=$tel;
    }
    
    public function setName($name){
        $this->name=$name;
    }
    
    public function setSurname($surname){
        $this->surname=$surname;
    }
    
    public function setAddress($add){
        $this->address=$add;
    }
    
    public function setPic($pic){
        $this->profpic=$pic;
    }
    
    public function setBio($b){
        $this->bio=$b;
    }
    
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    
    public function CreaReward($name,$pled,$desc,$media,$idcamp){
        $rew=new EReward($name, $pled, $desc, $media, $idcamp);
        $db=FDatabase::getInstance();
        $db->store($rew);
        return $rew;
    }
    
    public function EliminaReward(EReward $rew){
        $db=FDatabase::getInstance();
        if($db->delete("Reward",$rew->getId())){
            echo "Reward Cancellata!";
            unset($rew);
        }
        else echo "Errore!";
    }
    
    
    public function CreaCampagna($na, $de, $cat, $cou, $startd,$endd, $bc, $gl){
        $cr=new ECampagna($this->getUserName(),$na, $de, $cat, $cou, $startd,$endd, $bc, $gl);
        echo $cr;
        $db=FDatabase::getInstance();
        $db->store($cr);
    }
    
    public function EliminaCampagna(ECampagna $camp){
        $db=FDatabase::getInstance();
        if($db->delete("Campagna",$camp->getId())) {
            echo "Campagna Cancellata!";
            unset($camp);
        }
        else echo "Errore!";
    }

    public function AddImgCampagna($filename,$idcamp)
    {
        $img=new EMedia($filename,$idcamp);
        $db=FDatabase::getInstance();
        $db->store($img);
    }

    public function ElimImgCampagna(EMedia $img){
        $db=FDatabase::getInstance();
        if($db->delete("Media",$img->getId())) {
            echo "Immagine Cancellata!";
            unset($img);
        }
        else echo "Errore!";
    }
    
    //Update Campagna
    public function UpdImgCampagna($id,$newvalue){
        $db=FDatabase::getInstance();
        $db->update("Media",$id,"data",$newvalue);
    }
    
    public function UpdNomeCampagna ($id, $newvalue){
        $db=FDatabase::getInstance();
        $db->update("Campagna",$id,"name",$newvalue);
    }
    
    public function UpdDescrCampagna ($id, $newvalue){
        $db=FDatabase::getInstance();
        $db->update("Campagna",$id,"description",$newvalue);
    }
    
    public function UpdCountryCampagna ($id, $newvalue){
        $db=FDatabase::getInstance();
        $db->update("Campagna",$id,"country",$newvalue);
    }
    
    //Update Reward
    
    public function UpdNameReward ($id, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("Reward", $id, "namereward", $newvalue);
    }
    
    public function UpdPledged ($id, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("Reward", $id, "pledged", $newvalue);
    }
    
    public function UpdDescriptRew ($id, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("Reward", $id, "descriptionrew", $newvalue);
    }
    
    public function UpdMediaRew ($id, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("Reward", $id, "mediarew", $newvalue);
  
    }

    //Update Carta di Credito

    public function UpdOwnerName ($ccnumber, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("CartaCredito", $ccnumber, "ownername", $newvalue);
  
    }

    public function UpdOwnerSurname ($ccnumber, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("CartaCredito", $ccnumber, "ownersurname", $newvalue);
  
    }

    public function UpdCvv ($ccnumber, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("CartaCredito", $ccnumber, "cvv", $newvalue);
  
    }

    public function UpdExpirationDate ($ccnumber, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("CartaCredito", $ccnumber, "expirationdate", $newvalue);
  
    }

    public function UpdCcNumber ($ccnumber, $newvalue) {
        $db=FDatabase::getInstance();
        $db->update("CartaCredito", $ccnumber, "ccnumber", $newvalue);
  
    }

    

}




