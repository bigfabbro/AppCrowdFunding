<?php

require_once 'include.php';

 /**
      * Classe che si occupa dell'input-output dei contenuti riguardanti gli utenti. In particolare della "validazione" dei dati inseriti 
      * nelle form richiamando metodi di livello entity e del passaggio degli appositi parametri a Smarty per la costruzione dei template.
      * @package View
      * 
    */

 
 class VUtente{

     private $smarty;
     private $notval;


    public function __construct(){
         $this->smarty=ConfSmarty::configuration();
         $this->notval=array (
            'username' => false,
            'password' => false,
            'name'=> false,
            'surname'=> false,
            'sex'=>false,
            'email'=> false,
            'date'=>false,
            'telnumber'=> false,
            'profpic'=> false,
            'city'=>false,
            'street'=>false,
            'number'=>false,
            'country'=>false,
            'zipcode'=>false
        );
     }

    /*****************************************************SHOW*************************************************************** */

    /** Metodo per mostrare il form di login. Se $badlogin è "true" mostra un errore.
     * @param boolean $badlogin è true se il precedente tentativo di login non è andato a buon fine.
    */

    public function showFormLogin($badlogin=null){
         if(isset($badlogin)) $this->smarty->assign('badlogin',$badlogin);
         $this->smarty->display('login.tpl');
     }

    /**
     *  Metodo che mostra il login con funzione "remind me".
     * 
     * @param EUtente $user utente che può accedere con l'opzione remind me, essendo i suoi dati di accesso memorizzati sul client con un cookie.
     */

     public function showFormLoginRemind(EUtente $user){
         $this->smarty->assign('user',$user);
         $this->smarty->display('login.tpl');
     }

     /** Metodo per mostrare il form di registrazione. L'array $errors è utilizzato per mostrare gli errori effettuati nella compilazione del form,
      * l'array $values per reinserire i valori corretti della precedente compilazione non avvenuta con successo.
      * @param array $errors array dei campi errati della form;
      * @param array $values array dei valori corretti da reinserire nella form.
      */
    public function showFormRegistration($errors=null,$values=null){
         if(isset($errors)){
             $this->smarty->assign('errors',$errors);
             $this->smarty->assign('values',$values);
         }
         
         $this->smarty->display('registration.tpl');
     }

     /** Metodo per mostrare la pagina di benvenuto quando la registrazion va a buon fine. */

    public function showWelcome(){
        
         $this->smarty->display('welcome.tpl');
     }

     /** Metodo per mostrare la pagina di attivazione dell'account.*/
     function showActivation(){
         $this->navbar();
         
         $this->smarty->display('activation.tpl');
     }

     /**
      * Metodo per mostrare la pagina del profilo utente
      * 
      * @param EUtente $user utente da visualizzare;
      * @param EMediaUser $pic immagine del profilo;
      * @param array $camps array delle campagne pubblicate dall'utente;
      * @param array $donations array delle donazione effettuate dall'utente;
      * @param array $camppledged array delle campagne supportate;
      * @param array $rewards array delle ricompense ricevute;
      * @param array $photos array delle immagini delle proprie campagne;
      * @param EIndirizzo $address indirizzo dell'utente;
      * @param boolean $myProf è true se il visitatore del profilo è il proprietario del profilo stesso --> in modo da abilitare alcune
      * funzionalità (Es. la modifica del profilo).
      */

    public function showProfile(EUtente $user,EMediaUser $pic,$camps,$donations,$camppledged,$rewards,$photos,EIndirizzo $address,$myProf){
        $this->navbar();
        $pic64=base64_encode($pic->getData());
        $this->smarty->assign('myProf',$myProf);
        $this->smarty->assign('photos',$photos);
        $this->smarty->assign('pic64',$pic64);
        $this->smarty->assign('camps',$camps);
        $this->smarty->assign('donations',$donations);
        $this->smarty->assign('camppledged',$camppledged);
        $this->smarty->assign('address',$address);
        $this->smarty->assign('rewards',$rewards);
        $this->smarty->assign('user',$user);
        $this->smarty->display('profile.tpl');
    }

    /** Metodo utilizzato per assegnare lo username da inserire nella navbar se l'utente è loggato */
    
    public function navbar(){
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
    }

    /*******************************************************VALIDATION******************************************************** */

    /**Funzione che verifica la correttezza dei dati inseriti nel form di login.
     * Prima si verifica se la relativa componenete dell'array $_POST settata
     * ed in tal caso si richiamam il metodo statico dell'entità corrispondente 
     * per verificarne la correttezza. Restituisce un booleano.
     */

    public function valFormLogin() :bool {
         if(isset($_POST['username']) && isset($_POST['password'])){
            if(!EUtente::valUsername($_POST['username']) || !EUtente::valPassword($_POST['password'])){
                 return false;
            }
         }
         return true;
    }

    /** Funzione che verifica la correttezza dei dati inseriti nel form di registrazione.
     * Prima si verifica se la relativa componente  dell'array $_POST è settata
     * ed in tal caso si richiama il metodo statico dell'entità corrispondente per 
     * verificarne la correttezza. Per i campi non necessari (numero di telefono e foto del profilo) 
     * non è previsto che il not validate sia posto a true anche nel caso in cui non siano inseriti
     * nel form. Per i campi che devono essere univoci si verifica anche l'univocità. La funzione
     * restituisce l'array $notval che specifica per ogni campo del form se è valido o meno.
     * 
     * @return $notval array dei campi della form. Un elemento è true se è il relativo campo della form è valido o viceversa.
     */
    public function valFormRegistration(){

        if(isset($_POST['name'])){
            $this->notval['name']=!EUtente::valName($_POST['name']); 
        }
        else   $this->notval['name']=true;

        if(isset($_POST['surname'])){
            $this->notval['surname']=!EUtente::valSurname($_POST['surname']); 
        }
        else   $this->notval['surname']=true;

        if(isset($_POST['username'])){
            if(!EUtente::valUsername($_POST['username']) || FUtente::ExistUsername($_POST['username'])){
                $this->notval['username']=true;
            }
        }
        else   $this->notval['username']=true;

        if(isset($_POST['sex'])){
            $this->notval['sex']=!EUtente::valSex($_POST['sex']); 
        }
        else  $notval['sex']=true;

        if(isset($_POST['email'])){
            if(!EUtente::valEmail($_POST['email']) || FUtente::ExistMail($_POST['email'])){
                $this->notval['email']=true;
            }
        }
        else   $this->notval['email']=true;

        if(isset($_POST['telnumber'])){
            $this->notval['telnumber']=!EUtente::valTelnum($_POST['telnumber']); 
        }

        if(isset($_POST['date'])){
            $this->notval['date']=!EUtente::valDatan($_POST['date']); 
        }
        else   $this->notval['date']=true;

        if($_POST['password1']==$_POST['password2']){
            $this->notval['password']=!EUtente::valPassword($_POST['password1']);
        }
        else  $this->notval['password']=true;

        if(isset($_FILES['upicture']['errors']) && $_FILES['upicture']['errors']!=0){
            $this->notval['upicture']=!EMediaUser::valPic($_FILES['upicture']['type']);
        }

        if(isset($_POST['city'])){
            $this->notval['city']=!EIndirizzo::valCity($_POST['city']);
        }
        else $notval['city']=true;

        if(isset($_POST['street'])){
            $this->notval['street']=!EIndirizzo::valStreet($_POST['street']);
        }
        else  $this->notval['street']=true;

        if(isset($_POST['number'])){
            $this->notval['number']=!EIndirizzo::valNumber($_POST['number']);
        }
        else  $this->notval['number']=true;

        if(isset($_POST['zipcode'])){
            $this->notval['zipcode']=!EIndirizzo::valZipcode($_POST['zipcode']);
        }
        else  $this->notval['zipcode']=true;

        if(isset($_POST['country'])){
            $this->notval['country']=!EIndirizzo::valCountry($_POST['country']);
        }
        else  $this->notval['country']=true;

        return $this->notval;
    }

    /**
     * Funzione utilizzata per verificare la validità del singolo campo della form di modifica del profilo
     *  (viene utilizzato per il controllo client-side AJAX)
     * 
     * @return boolean true se è corretto, false viceversa
     */
    public function ValModify() :bool {
        $val=key($_POST);
        if($val=="city") return EIndirizzo::valCity($_POST['city']);
        else if($val=="street") return EIndirizzo::valStreet($_POST['street']);
        else if($val=="number") return EIndirizzo::valNumber($_POST['number']);
        else if($val=="zipcode") return EIndirizzo::valZipcode($_POST['zipcode']);
        else if($val=="country") return EIndirizzo::valCountry($_POST['country']);
        else if($val=="telnumber") return EUtente::valTelnum($_POST['telnumber']);
        else if($val=="datan") return EUtente::valDatan($_POST['datan']);
        else if($val=="description") return true;
    }

     /**
     * Funzione utilizzata per verificare la validità del singolo campo della form di registrazione
     * (viene utilizzato per il controllo client-side AJAX)
     * 
     * @return boolean true se è corretto, false viceversa
     */

    public function ValRegistration() :bool {
        $val=key($_POST);
        if($val=="name") return EUtente::valName($_POST['name']);
        else if($val=="surname") return EUtente::valSurname($_POST['surname']);
        else if($val=="sex") return EUtente::valSex($_POST['sex']);
        else if($val=="city") return EIndirizzo::valCity($_POST['city']);
        else if($val=="street") return EIndirizzo::valStreet($_POST['street']);
        else if($val=="number") return EIndirizzo::valNumber($_POST['number']);
        else if($val=="zipcode") return EIndirizzo::valZipcode($_POST['zipcode']);
        else if($val=="country") return EIndirizzo::valCountry($_POST['country']);   
        else if($val=="telnumber") return EUtente::valTelnum($_POST['telnumber']);
        else if($val=="date") return EUtente::valDatan($_POST['date']);
        else if(isset($_FILES['upicture'])) {return EMediaUser::valPic($_FILES['upicture']['type']);}
        else if($val=="email"){
            if(EUtente::valEmail($_POST['email'])){
                if(!FUtente::ExistMail($_POST['email'])) return true;
            }
            else return false;
        }
        else if($val=="username"){
            if(EUtente::valUsername($_POST['username'])){
                if(!FUtente::ExistUsername($_POST['username'])) return true;
            }
            else return false;
        }
        else if($val=="password1") return EUtente::valPassword($_POST['password1']);
    }

    /** Funzione che restituisce il vettore degli errori 
     * 
     * @return $notval array dei campi della form
    */

    public function getNotVal(){
        return $this->notval;
    }

}