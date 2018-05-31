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
            'description'=> false,
            'country'=> false,
            'stardate'=> false,
            'enddate'=> false,
            'goal'=>false
        );
     }

     function showCreaCampagna($nv=null){
         $this->smarty->assign('notval',$nv);
         $this->smarty->display('creacampagna.tpl');
     }

     function valFormCreaCampagna() :bool {
         if(isset($_POST['name']) && isset($_POST['category']) && isset($_POST['country']) && isset($_POST['startdate']) && isset($_POST['enddate']) && isset($_POST['goal']))
         {
            $sdate=explode("/",$_POST['startdate']);
            $edate=explode("/",$_POST['enddate']);

            if(!preg_match('^[a-zA-Z0-9]{3,50}$',$_POST['name'])){
                $this->notval['name']=true;
            }
            if(!preg_match('^[a-zA-Z]$',$_POST['category'])){
                $this->notval['category']=true;
            }
            if(!preg_match('^[a-zA-Z]$',$_POST['country'])){
                $this->notval['country']=true;
            }
            if(!checkdate($sdate[1],$sdate[0],$sdate[2])){
                $this->notval['startdate']=true;
            }
            if(!checkdate($edate[1],$edate[0],$edate[2])){
                $this->notval['enddate']=true;
            }
            if(!preg_match('^[0-9]$',$_POST['goal'])){
                $this->notval['goal']=true;
            } 
         }
         else
         {
             if(!isset($_POST['name'])) $this->notval['name']=true;
             if(!isset($_POST['category'])) $this->notval['category']=true;
             if(!isset($_POST['country'])) $this->notval['country']=true;
             if(!isset($_POST['startdate'])) $this->notval['startdate']=true;
             if(!isset($_POST['enddate'])) $this->notval['enddate']=true;
             if(!isset($_POST['goal'])) $this->notval['goal']=true;
         }
        if($this->notval['name']==true || $this->notval['category']==true || $this->notval['country']==true || $this->notval['startdate']==true || $this->notval['enddate']==true || $this->notval['goal']==true) 
        {
           return false;
        }
        else return true;
    }

    function getNotVal(){
        return $this->notval;
    }
}