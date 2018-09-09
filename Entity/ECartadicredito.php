<?php

require_once 'include.php';


/**
 * La classe ECartadicredito contiene tutti gli attributi e metodi base riguardanti la carta di credito. 
 *  Contiene i seguenti attributi (e i relativi metodi):
 * - id: è un identificativo autoincrement, relativo alla carta di credito;
 * - ownername: nome del proprietario della carta di credito;
 * - ownersurname: cognome del proprietario della carta di credito;
 * - expirationdate: data di scadenza della carta di credito;
 * - ccnumber: numero della carta di credito (sono 11 cifre);
 * - ccv: Card Security Code, ultime tre cifre scritte nel retro della carta di credito.
 * @author Gruppo 3
 * @package Entity
 */
  
  class ECartadicredito{
    /** id della carta di credito  */
    private $id;

    /** nome del proprietario della carta di credio*/
    private $ownername;

    /** cognome del proprietario della carta di credito */
    private $ownersurname;

    /** data di scadenza della carta di credio */
    private $expirationdate;

    /** numero della carta di credito */
    private $ccnumber;

    /** ccv */
    private $ccv;

    public function __construct($ownername,$ownersurname,$expirationdate,$ccnumber,$ccv){
         $this->ownername=$ownername;
         $this->ownersurname=$ownersurname;
         $this->expirationdate=$expirationdate;
         $this->ccnumber=$ccnumber;
         $this->ccv=$ccv;
    }


     /**
     * 
     * @return string nome del proprietario della carta di credito
     */


    public function getOwnerName(){
        return $this->ownername;
    }


     /**
     * 
     * @return string cognome del proprietario della carta di credito
     */


    public function getOwnerSurname(){
        return $this->ownersurname;
    }

     /**
     * 
     * @return date data di scadenza della carta di credito
     */

    public function getExpirationDate(){
        return $this->expirationdate;
    }

     /**
     * 
     * @return string numero della carta di credito
     */

    public function getCcNumber(){
        return $this->ccnumber;
    }


     /**
     * 
     * @return string ccv della carta di credito
     */


    public function getCcv(){
        return $this->ccv;
    }

     /**
     * 
     * @return int id relativo alla carta di credito
     */

    public function getId(){
        return $this->id;
    }

    /**
     * 
     * @param string $ownername nome del proprietario della carta di credito
     */


    public function setOwnerName($ownername){
        $this->ownername=$ownername;
    }

    /**
     * 
     * @param string $ownersurname cognome del proprietario della carta di credito
     */

    public function setOwnnerSurname($ownersurname){
        $this->ownersurname=$ownersurname;
    }

    /**
     * 
     * @param date $expirationdate data di scadenza della carta di credito
     */

    public function setExpirationDate($expirationdate){
        $this->expirationdate=$expirationdate;
    }

    /**
     * 
     * @param string $ccnumber numero della carta di credito 
     */

    public function setCcNumber($ccnumber){
        $this->ccnumber=$ccnumber;
    }


    /**
     * 
     * @param int $ccv della carta di credito
     */


    public function setCcv($ccv){
        $this->ccv=$ccv;
    }

    /**
     * 
     * @param int $id della carta di credito
     */


    public function setId($id){
        $this->id=$id;
    }
    
    
    /**
     * 
     * @param date $expirationdate data di scadenza della carta di credito
     * @return bool controlla se la carta di credito è scaduta
     */

   public function CheckScadenza($expirationdate)
   {
    $oggi = date("Y-m-d");
    $dateoggi=explode("-", $oggi);
    $datescad=explode("-", $expirationdate);
    if ($dateoggi < $datescad) $valido=true;
    else $valido=false;
    
    return $valido;
   }

      
 
    //Validate
    
     /**
     *  @return bool controlla se il nome  ha un numero di caratteri compreso tra 3 e 30

     */
     
    static function valOwnerName($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

     /**
     * @return bool  controlla se il cognome  ha un numero di caratteri compreso tra 3 e 30

     */
    
    static function valOwnerSurname($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

     /**
     * @return bool controlla se sono 16 i caratteri relativi al numero della carta di credito
     */
    
    static function valCcNumber($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([0-9]{16})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

    static function valExpirationDate($val):bool{
        $date=explode('-',$val);
        $oggi = date("Y-m-d");
        $dateoggi=explode("-", $oggi);
     

        if(!checkdate($date[1],$date[2],$date[0]) && $dateoggi > $date){
            return false;
        }
        else return true;
    } 
    
     /**
     * @return bool  controlla se il ccv ha esattamente 3 caratteri

     */

    static function valCcv($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([0-9]{3})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
}