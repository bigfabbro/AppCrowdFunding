<?php

require_once 'include.php';

  class CUtente{

/*********************************************LOGIN**************************************************** */

/**
 * Funzione che consente il login di un utente registrato. Si possono avere diversi casi:
 * 1) se il metodo della richiesta HTTP è GET:
 *   - se l'utente è già loggato viene reindirizzato alla homepage;
 *   - se l'utente non è loggato si richiama la funzione Remindme() per verificare se l'utente ha selezionato l'opzione "ricordami"
 *     nel qual caso si visualizza un form di login nel quale gli è possibile accedere direttamente senza reinserire i suoi dati; 
 *     viceversa viene visualizzato il form di login e l'utente deve inserire i propri dati.
 * 2) se il metodo della richiesta HTTP è POST viene richiamata la funzione EnterIn().
 * 3) se il metodo è diverso da quelli sopra -->errore.
 */

   static function Login(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            if(static::isLogged()) header('Location: /AppCrowdFunding/Homepage');
            else{
                $user=static::Remindme();
                $view=new VUtente();
                if($user) $view->showFormLoginRemind($user);
                else $view->showFormLogin();
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            static::EnterIn();
        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }

    /**
     * Funzione che viene utilizzata per l'accesso con l'opzione ricordami. Si possono avere diverse situazioni:
     * 1) se i dati del cookie sono corretti richiama EnterIn() e passa l'utente;
     * 2) se i dati del cookie non sono corretti provvede ad eliminarlo e mostra nuovamente la pagina di login.
     */
    static function LoginRemind(){
        $user=static::Remindme();
        if($user) static::EnterIn($user);
        else{
            unset($_COOKIE['remindme']);
            setcookie("remindme",'', time() - 3600);
            $view=new VUtente();
            $view->showFormLogin(true);
        }
    }

    /**
     * Funzione che verifica la presenza del cookie contente i dati dell'utente. Si possono avere diverse situazioni:
     * 1) se è presente si vefica la correttezza dei dati del cookie e nel caso siano corretti viene restituito l'utente;
     * 2) se il cookie non è presente si restituisce null.
     *  
     */

    static function Remindme(){
        if(isset($_COOKIE['remindme'])){
            $data=explode(hash("md5","{\?/}"),$_COOKIE['remindme']);
            $user=FUtente::loadByUsername($data[0]);
            if($user){
                if(hash("md5",$user->getUsername().$user->getPass())==$data[1]) return $user;
            }
        }
        else return null;
    }

/**
 * Funzione che si occupa di verifica l'esistenza di un utente con username e password inseriti nel form di login. Si possono avere diverse situazioni:
 * 1) se viene passato $user allora vuol dire che l'utente ha sfruttato l'opzione remind me e si può avviare la sessione.
 * 2) se non viene passato $user si verifica prima che i dati inseriti nel form rispettino i criteri richiesti e se sono corretti 
 *    si verifica l'esistenza di un utente con username e password inseriti.
 *   - nel caso in cui esiste si avvia la sessione utente;
 *   - nel caso contrario si restituisce la pagina di login con la segnalazione di username o password errati.
 */

  static function EnterIn($user=null){
      if(!isset($user)){
         $view=new VUtente();
         if($view->ValFormLogin()){
           $user=FUtente::ExistUserPass($_POST['username'],hash('md5',$_POST['password']));
           if($user!=null){
               if(isset($_POST['remindme']) && $_POST['remindme']=="yes"){
                   setcookie("remindme",$_POST['username'].hash("md5","{\?/}").hash('md5',$_POST['username'].hash('md5',$_POST['password'])));
               }
            if (session_status() == PHP_SESSION_NONE) session_start();
               $_SESSION['id']= $user->getId();
               $_SESSION['username']=$user->getUserName();
               $_SESSION['activate']=$user->getActivate();
               if($user->getActivate()){
                   if(isset($_SESSION['redirect'])) header('Location: '.$_SESSION['redirect']);
                   else header('Location: /AppCrowdFunding/Homepage');
               }
               else $view->showActivation();
            }
            else{
                $view->showFormLogin(true);
            } 
        }
        else{   
            $view->showFormLogin(true);
        }
    }
    else{
        if (session_status() == PHP_SESSION_NONE) session_start();
               $_SESSION['id']= $user->getId();
               $_SESSION['username']=$user->getUserName();
               $_SESSION['activate']=$user->getActivate();
               if($user->getActivate()){
                   if(isset($_SESSION['redirect'])) header('Location: '.$_SESSION['redirect']);
                   else header('Location: /AppCrowdFunding/Homepage');
               }
               else $view->showActivation();
    }
    }

    /*********************************************ACTIVATION************************************************************** */

    /**Metodo che in base al metodo di richiesta HTTP provvede:
 * 1) nel caso in cui il metodo di richiesta sia GET:
 *   1a) se l'utente non ha ancora attivato l'account a mostrare la pagina di attivazione;
 *   1b) se l'utente ha già attivato l'account a mostrare la homepage (non può attivarlo nuovamente!);
 * 2) nel caso in cui il metodo di richiesta sia POST rinvia alla metodo che effettua il controllo sull'attivazione
 * 3) se il metodo di richiesta è diverso da GET e POST restituisce un errore di metodo non permesso.
 */
    static function activation(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            if(CUtente::NotActivated()){
             $view=new VUtente();
              $view->showActivation();
            }
            else header('Location: /AppCrowdFunding/Homepage');
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            CUtente::activate();
        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }

    }

    /** Metodo che provvede a verificare che il pin di attivazione inserito dall'utente nell'apposito form
     * corrisponde a quello inviato tramite mail e:
     * 1) nel caso in cui il metodo VerifyCode() (che provvede a verificare tramite DB se il pin corrisponde ed eventualmente a contrassegnare
     *    come attivato l'account) restituisca "true" mostra la homepage;
     * ") nel caso in cui il metodo VerifyCode() restituisca "false" mostra nuovamente la pagina di attivazione.
     */

    static function activate(){
        if (session_status() == PHP_SESSION_NONE) session_start();
        $view= new VUtente();
        $iduser=$_SESSION['id'];
        $pinsert=$_POST['activate'];
        $mc=FMailCheck::loadByIdUser($iduser);
        if($mc->getPin()==$pinsert){
            if(FUtente::UpdateActivate($iduser,true)){
                if(FMailCheck::deleteByIdUser($iduser)) header('Location: /AppCrowdFunding/Homepage');
                else $view->showActivation();
            }
            else $view->showActivation();
        }
        else $view->showActivation();
    }

    /*************************************************************REGISTRATION******************************************* */

     /**Metodo che in base al metodo di richiesta HTTP provvede:
 * 1) nel caso in cui il metodo di richiesta sia GET:
 *   1a) se l'utente non è loggato a mostrare la pagina di registrazione;
 *   1b) se l'utente è loggato a mostrare la homepage (non può registrarsi!);
 * 2) nel caso in cui il metodo di richiesta sia POST rinvia alla metodo che effettua il controllo del form di registrazione 
 *    nonché di richiamare i metodi per l'inserimento dei dati nel DB;
 * 3) se il metodo di richiesta è diverso da GET e POST restituisce un errore di metodo non permesso.
 */

    static function Registration(){
        if($_SERVER['REQUEST_METHOD']=="GET"){
           if(CUtente::isLogged()) header('Location: /AppCrowdFunding/Homepage');
           else{
               $view=new VUtente();
               $view->showFormRegistration();
           }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            CUtente::SignIn();
        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }
    }

    /**Metodo che dopo aver verificato il form attraverso il metodo ValFormRegistration() provvede a:
     * 1) nel caso in cui il form sia corretto a inserire nel DB l'utente e tutti i suoi dati (Indirizzo e Foto profilo),
     *    ad inviare l'email di attivazione/verifica dell'account e a mostrare la pagina di benvenuto;
     * 2) nel caso in cui il form non è corretto (Es. per inserimento di dati che non rispettano il formato richiesto, oppure
     *    per esistenza di un altro account con stessa email e/o stesso username) rinvia alla pagina di registrazione specificando 
     *    anche gli eventuali errori.
     */
    static function SignIn(){
        $val=true;
        $view=new VUtente();
        $notval=$view->ValFormRegistration();
        foreach($notval as $errore => $valore){
            if ($valore==true) {
                $val=false; 
                break;
            }
        }
        if(!$val) {
            $view->showFormRegistration($notval,$_POST);
        }
        else{
            $user=new EUtente($_POST['username'],hash('md5',$_POST['password1']),$_POST['name'],$_POST['surname'],$_POST['sex'],$_POST['date'],$_POST['email'],$_POST['telnumber'],$_POST['description']);
            $iduser=FUtente::store($user);
            $address=new EIndirizzo($_POST['city'],$_POST['street'],$_POST['number'],$_POST['zipcode'],$_POST['country'],$iduser);
            FIndirizzo::store($address);
            $up=new Upload();
            if(!$notval['profpic']){
                $picture=$up->myphoto($_FILES['upicture'],$iduser);
                FMediaUser::store($picture);
            }
            else {
                $picture=$up->standard($iduser);
                FMediaUser::store($picture);
            }
            $mail=new EMailCheck();
            if($mail->sendActivEmail($user->getEmail(),$user->getUserName())){;
                $mail->setIdUser($iduser);
                FMailCheck::store($mail);
            }
            $view->showWelcome();
        }
    }

    /********************************************PROFILE E MANAGEMENT ************************************************************* */

    /** Metodo che mostra il profilo dell'utente loggato o il profilo di un altro utente a seconda del tipo di URL:
     * 1) URL: /AppCrowdFunding/Utente/profile?username=nomeutente --> mostra il profilo dell'utente corrispondente all'username (se esiste);
     * 2) URL: /AppCrowdFunding/Utente/profile --> mostra il profilo dell'utente loggato (se è loggato)
     * 3) in tutti gli altri casi (utente non loggato o username inesistente) mostra la homepage.
     */

    static function profile($param=null){
        $id=null;
        $myProf=false;
        if(isset($param)){
            $user=FUtente::loadByUsername($param);
            if($user!=null){
                $id=$user->getId();
            }
        }
        else if(CUtente::isLogged()){
            $id=$_SESSION['id'];
            $user=FUtente::loadById($id);
        }
        else header('Location: /AppCrowdFunding/Homepage');
        if($id){
            $rewards=array();
            $photos=array();
            $camppledged=array();
            $pic1=FMediaUser::loadByIdUser($id);
            $camps=FCampagna::loadByFounder($id);
            $address=FIndirizzo::loadByIdUser($id);
            $donations=FDonazione::loadByIdUser($id);
            if($camps!=null){
                foreach($camps as $camp){
                    $pics=$camp->getMedia();
                    if($pics){
                        $photos[$camp->getId()]=base64_encode($pics[0]->getData());
                    }
                    else $photos[$camp->getId()]=null;
                }
            }
            if($donations!=null){
                foreach($donations as $don){
                    $camppledged[]=FCampagna::loadById($don->getIdCamp());
                    $rew=FReward::loadById($don->getReward());
                    if($rew) $rewards[]=$rew->getName()." - ".$rew->getDescriptionRe();
                    else $rewards[]=null;
                }
            }
            CUtente::isLogged();
            if($_SESSION['id']==$id) $myProf=true; //booleano che serve a riconoscere se il profilo è il proprio per abilitare funzionalità di management dell'account (Es. Cancellazione dell'account)
            $view=new VUtente();                   
            $view->showProfile($user,$pic1,$camps,$donations,$camppledged,$rewards,$photos,$address,$myProf);
        }
    }

    /**Metodo per la cancellazione di un account. Si basa su una URL del tipo: /AppCrowdFunding/Utente/removeUser/username
     * dove lo username è quello dell'utente da rimuovere. Possono verificarsi diverse situazioni:
     * 1) se l'utente è loggato:
     *   1a) se il suo username corrisponde a quello dell'utente da cancellare si provvede alla cancellazione, viene effettuato il logout e
     *       viene mostrata la homepage;
     *   1b) se il suo username non corrisponde viene rispedito alla homepage;
     * 2) se l'utente non è loggato viene rinviato alla pagina di login.
     */

    static function removeUser($username=null){
    if(isset($username)){
        if(CUtente::isLogged()){
            if($_SESSION['username']==$username){
                if(FUtente::delete($_SESSION['id'])){
                    session_unset();
                    session_destroy();
                    header('Location: /AppCrowdFunding/Homepage');
                }
                else header('Location: /AppCrowdFunding/Utente/profile');
            }
            else header('Location: /AppCrowdFunding/Homepage');
        }
        else header('Location: /AppCrowdFunding/Utente/login');
    }
    else header('Location: /AppCrowdFunding/Homepage');
    }

    /**Metodo per l'update di alcune informazioni dell'account. Di norma il metodo è richiamato
     * da una richiesta javascript AJAX di tipo POST. In base ai parametri ricevuti nella richiesta POST
     * richiama il giusto metodo di livello entity per l'updatU delle informazioni.
     */
    static function UpdateProfile(){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            if(CUtente::isLogged()){
                $view=new VUtente();
                for($i=0; $i<count($_POST); $i++){
                    if($view->ValModify()){
                        $address=FIndirizzo::loadByIdUser($_SESSION['id']);
                        $idaddress=$address->getId();
                        if(key($_POST)=="city") FIndirizzo::UpdateCity($idaddress,$_POST['city']);
                        else if(key($_POST)=="street") FIndirizzo::UpdateStreet($idaddress,$_POST['street']);
                        else if(key($_POST)=="number") FIndirizzo::UpdateNumber($idaddress,$_POST['number']);
                        else if(key($_POST)=="zipcode") FIndirizzo::UpdateZipcode($idaddress,$_POST['zipcode']);
                        else if(key($_POST)=="country") FIndirizzo::UpdateCountry($idaddress,$_POST['country']);
                        else if(key($_POST)=="telnumber") FUtente::UpdateTelNum($_SESSION['id'],$_POST['telnumber']);
                        else if(key($_POST)=="datan") FUtente::UpdateDatan($_SESSION['id'],$_POST['datan']);
                        else if(key($_POST)=="description") FUtente::UpdateDescription($_SESSION['id'],$_POST['description']);
                    }
                    next($_POST);
                }
            }
            else header('Location: /AppCrowdFunding/Utente/login');
        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
    }

    /**
     * Funzione che consente ad un utente di modificare l'immagine del proprio profilo.
     */
    static function UpdateImg(){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            if(CUtente::isLogged()){
                if(FMediaUser::deleteByIdUser($_SESSION['id'])){ 
                    $up=new Upload();
                    $picture=$up->myphoto($_FILES['inputimage'],$_SESSION['id']);
                    FMediaUser::store($picture);
                }
            }
        }
    }

    //Funzione che permette di rimuovere l'immagine del profilo e sostituirla con quella standard

    static function DeleteImg(){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            if(CUtente::isLogged()){
              if(FMediaUser::deleteByIdUser($_SESSION['id'])){
                  $up=new Upload();
                  $picture=$up->standard($_SESSION['id']);
                  FMediaUser::store($picture);
              }
            }
        }
    }

/** Metodo che viene utilizzato per verificare se l'input inserito dall'utente nel form di modifica del profilo utente è corretto o meno.
 *  Più precisamente viene effettuata una richiesta AJAX al server e dalla risposta si capisce se l'input è corretto o meno.
*/

    static function VerifyModify(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $view=new VUtente();
            if($view->ValModify()) echo "true";
            else echo "false";
        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
    }

/**
 * Metodo che viene utilizzato per verificare se l'input inserito nel form di registrazione rispetta i criteri previsti.
 * L'interrogazione viene effettuata mediante richiesta AJAX ogni qualvolta c'è un cambiamento della input box.
 */
    static function VerifyRegistration(){
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $view=new VUtente();
            if($view->ValRegistration()) echo "true";
            else echo "false";
        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
    }

/** Metodo che provvede alla rimozione delle variabili di sessione, alla sua distruzione e a rinviare alla homepage  */

    static function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /AppCrowdFunding/Homepage');
    }

    /**Metodo che verifica l'attivazione dell'account dell'utente loggato */

    static function NotActivated(){
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        if(isset($_SESSION['activated'])&&(!$_SESSION['activated'])) return true;
        else return false;
    }

    /**Metodo che verifica se l'utente è loggato */

    static function isLogged(){
       if (session_status() == PHP_SESSION_NONE) {
            session_start();
       }
      if(isset($_SESSION['username'])) return true;
      else {
          if($_SERVER['REQUEST_URI']!="/AppCrowdFunding/Utente/login") $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
          return false;
      }
    }
  }