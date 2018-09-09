<?php

require_once 'include.php';

class Installation{

    /**
     * Funzione che nella sostanza si occupa del controllo dei requisiti per l'installazione, ovvero:
     * - PHP versione 7.0 o superiore;
     * - cookie abilitati;
     * - javascript abilitato.
     */
    static function Begin(){
        $smarty=ConfSmarty::configuration();
        if($_SERVER['REQUEST_METHOD']=="GET"){ //alla richiesta della pagina
            setcookie('checkcoockie','vivaicoockie',time()+3600); //viene settato il cookie, per la verifica dei cookie abilitati
            $smarty->display('InstallationForm.tpl'); //e si mostra il form di installazione
        }
        else{ //... ovvero method= POST
            $nophpv=false; 
            $nocoockie=false;
            $nojs=false;
            if(version_compare(PHP_VERSION, '7.0.0', '<')){ $nophpv=true; $smarty->assign('nophpv',$nophpv);} //si controlla la versione PHP
            if(!isset($_COOKIE['checkcoockie'])){$nocoockie=true; $smarty->assign('nocoockie',$nocoockie);} //si controlla se il cookie è presente (=cookie abilitati)
            if(!isset($_COOKIE['checkjs'])){$nojs=true; $smarty->assign('nojs',$nojs);} //si controlal se il cookie settato da javascript è presente (=javascript abilitato)
            if($nophpv || $nojs || $nocoockie){ // se uno dei requisiti non è verificato
                setcookie('checkcoockie','vivaicoockie',time()+3600); //si prova a risettare il cookie 
                $smarty->display('InstallationForm.tpl'); // si mostra nuovamente il form di installazione con gli errori
            }
            else{ // ... ovvero requisti verificati
                setcookie('checkjs','',time()-3600); //si eliminano i cookie 
                setcookie('checkcoockie','',time()-3600);
                if(static::install()){ // si procede con l'installazione vera e propria
                    setcookie('installation','YES'); // se va a buon fine si setta il cookie per la verifica dell'installazione
                    if($_POST['populate']=="yes") static::populate(); //se è stata selezionata la voce populate si popola il database.
                }
                header('Location: /AppCrowdFunding'); 
            }
        }
    }

    /**
     * Funzione che provvede alla creazione del file config.inc.php per l'accesso al database e della creazione del database.
     */
    static function install(){
        try 
        {
            $db = new PDO("mysql:host=localhost; dbname=".$_POST['nomedb'], $_POST['nomeutente'], $_POST['password']); 
            $db->beginTransaction();
            $query = 'DROP DATABASE IF EXISTS ' .$_POST['nomedb']. '; CREATE DATABASE ' . $_POST['nomedb'] . ' ; USE ' . $_POST['nomedb'] . ';' . 'SET GLOBAL max_allowed_packet=16777216;';
            $query = $query . file_get_contents('tables.sql');
            $db->exec($query);
            $db->commit();
            $file = fopen('config.inc.php', 'w');
            $script = '<?php $host= \'localhost\'; $database= \'' . $_POST['nomedb'] . '\'; $username= \'' . $_POST['nomeutente'] . '\'; $password= \'' . $_POST['password'] . '\';?>';
            fwrite($file, $script);
            fclose($file);
            $db=null;
            return true;
        }
        catch (PDOException $e)
        {
            echo "Errore : " . $e->getMessage();
            $db->rollBack();
            die;
            return false;
        }
    }

    //Funzione che si occupa del popolamento dell'applicazione
    static function populate(){
        try{
            $db = new PDO("mysql:host=localhost; dbname=".$_POST['nomedb'], $_POST['nomeutente'], $_POST['password']); 
            $db->beginTransaction();
            $db->exec(file_get_contents('insert.sql'));
            $db->commit();
            $db=null;
        }
        catch (PDOException $e)
        {
            echo "Errore : " . $e->getMessage();
            $db->rollBack();
            die;
            return false;
        }
    }

// Funzione che verifica la presenza del cookie di installazione e quindi se quest'ultima è stata effettuata.
    static function VerifyInstallation():bool{ 
        if(isset($_COOKIE['installation'])) return true;
        else return false;
    }

}