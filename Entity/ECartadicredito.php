<?php
  
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

    /** cvv */
    private $cvv;

    public function __constructor($ownername,$ownersurname,$expirationdate,$ccnumber,$cvv){
         $this->ownername=$ownername;
         $this->ownersurname=$ownersurname;
         $this->expirationdate=$expirationdate;
         $this->ccnumber=$ccnumber;
         $this->cvv=$cvv;
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
     * @return int cvv della carta di credito
     */


    public function getCvv(){
        return $this->cvv;
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
     * @param sting $ccnumber numero della carta di credito 
     */

    public function setCcNumber($ccnumber){
        $this->ccnumber=$ccnumber;
    }


    /**
     * 
     * @param int $cvv della carta di credito
     */


    public function setCvv($cvv){
        $this->ccv=$ccv;
    }

    /**
     * 
     * @param string $id della carta di credito
     */


    public function setId($id){
        $this->id=$id;
    }


      
 
    //validate

    
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
        if(!checkdate($date[1],$date[2],$date[0])){
            return false;
        }
        else return true;
    } 
    
     /**
     * @return bool  controlla se il cvv ha esattamente 3 caratteri

     */

    static function valCvv($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([0-9]{3})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }
}