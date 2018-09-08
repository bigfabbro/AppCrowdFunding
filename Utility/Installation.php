<?php

require_once 'include.php';

class Installation{

    static function VerifyInstallation():bool{
        if(isset($_COOKIE['installation'])) return true;
        else return false;
    }

    static function Begin(){
        $smarty=ConfSmarty::configuration();
        if($_SERVER['REQUEST_METHOD']=="GET"){
            setcookie('checkcoockie','vivaicoockie',time()+3600);
            $smarty->display('InstallationForm.tpl');
        }
        else{
            $nophpv=false;
            $nocoockie=false;
            $nojs=false;
            if(version_compare(PHP_VERSION, '7.0.0', '<')){ $nophpv=true; $smarty->assign('nophpv',$nophpv);}
            if(!isset($_COOKIE['checkcoockie'])){$nocoockie=true; $smarty->assign('nocoockie',$nocoockie);}
            if(!isset($_COOKIE['checkjs'])){$nojs=true; $smarty->assign('nojs',$nojs);}
            if($nophpv || $nojs || $nocoockie){
                setcookie('checkcoockie','vivaicoockie',time()+3600);
                $smarty->display('InstallationForm.tpl');
            }
            else{
                setcookie('checkjs','',time()-3600);
                setcookie('checkcoockie','',time()-3600);
                if(static::install()){
                    setcookie('installation','YES');
                }
                header('Location: /AppCrowdFunding');
            }
        }
    }

    static function install(){
        try 
        {
            $db = new PDO("mysql:host=localhost; dbname=".$_POST['nomedb'], $_POST['nomeutente'], $_POST['password']); 
            $db->beginTransaction();
            $query = 'CREATE DATABASE ' . $_POST['nomedb'] . ' ; 
                      USE ' . $_POST['nomedb'] . ';';
            $query = $query . file_get_contents('tables.sql');
            $db->exec($query);
            $db->commit();
            $file = fopen('config.inc.php', 'w');
            $script = '<?php $address= \'localhost\'; $database= \'' . $_POST['nomedb'] . '\'; $admin= \'' . $_POST['nomeutente'] . '\';$pass= \'' . $_POST['password'] . '\'; ?>';
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
}