<?php

require_once 'include.php';

 
 class VCampagna{

     private $smarty;
     private $notval;


     function __construct(){
         $this->smarty=ConfSmarty::configuration();
         $this->notval= array (
            'name' => false,
            'category'=> false,
            'country'=> false,
            'stardate'=> false,
            'enddate'=> false,
            'goal'=>false,
            'bankcount'=>false,
        );
     }

     function showFormCreation($errors=null,$values=null){
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        if(isset($errors)) {
            $this->smarty->assign('errors',$errors);
            $this->smarty->assign('values',$values);
        }
        $this->smarty->assign('today',date('Y-m-d'));
        $this->smarty->display('CampaignCreation.tpl');
     }

     function valFormCreaCampagna() :bool {
         if(isset($_POST['name'])&& isset($_POST['country']) && isset($_POST['enddate']) && isset($_POST['bankcount']) && isset($_POST['goal']))
         {
            $replace=array(" ","'");
            $enddate=explode('-',$_POST['enddate']);
            if(!checkdate($enddate[1],$enddate[2],$enddate[0])){
             $this->notval['enddate']=true;
            }
            if(preg_match('/^[a-zA-Z0-9]{3,50}$/',str_replace($replace,'',$_POST['name']))){
                if(FCampagna::ExistName($_POST['name'])){
                    $this->notval['name']=true;
                }
            }
            else $this->notval['name']=true;
            if(!preg_match('/^[a-zA-Z]{0,30}$/',str_replace($replace,'',$_POST['country']))){
                $this->notval['country']=true;
            }
            if(!preg_match('/^[0-9]{1,10}$/',$_POST['goal'])){
                $this->notval['goal']=true;
            } 
            if(!preg_match('/^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$/i',str_replace($replace,'',$_POST['bankcount']))){
                $this->notval['bankcount']=true;
            }
         }
         else
         {
             if(!isset($_POST['name'])) $this->notval['name']=true;
             if(!isset($_POST['category'])) $this->notval['category']=true;
             if(!isset($_POST['country'])) $this->notval['country']=true;
             if(!isset($_POST['enddate'])) $this->notval['enddate']=true;
             if(!isset($_POST['goal'])) $this->notval['goal']=true;
             if(!isset($_POST['bankcount'])) $this->notval['bankcount']=true;
         }
        if($this->notval['name']==true || $this->notval['category']==true || $this->notval['country']==true || $this->notval['enddate']==true || $this->notval['goal']==true || $this->notval['bankcount']==true) 
        {
           return false;
        }
        else return true;
    }

    function getNotVal(){
        return $this->notval;
    }
}