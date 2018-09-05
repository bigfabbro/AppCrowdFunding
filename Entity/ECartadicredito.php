<?php
  
  class ECartaDiCredito{
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

//************************************************SET************************************************************** */
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
     * @param int $ccv della carta di credito
     */


    public function setCcv($ccv){
        $this->ccv=$ccv;
    }

    /**
     * 
     * @param string $id della carta di credito
     */


    public function setId($id){
        $this->id=$id;
    }


      
 
//****************************************************VALIDATE****************************************************** */
    
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
        if(!preg_match("/^([0-9]{11})$/",str_replace($replace,'',$val))){
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