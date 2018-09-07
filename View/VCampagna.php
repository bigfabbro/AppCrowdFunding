<?php

require_once 'include.php';

 
 class VCampagna{

     private $smarty;
     private $notval;


    public function __construct(){
         $this->smarty=ConfSmarty::configuration();
         $this->notval= array (
            'name' => false,
            'category'=> false,
            'country'=> false,
            'enddate'=> false,
            'goal'=>false,
            'bankcount'=>false,
        );
     }


    public function showFormCreation($errors=null,$values=null){
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        if(isset($errors)) {
            $this->smarty->assign('errors',$errors);
            $this->smarty->assign('values',$values);
        }
        $this->smarty->assign('today',date('Y-m-d'));
    
        $this->smarty->display('CampaignCreation.tpl');
     }

    public function valFormCreaCampagna(){
        if(isset($_POST['name'])){
            if(!ECampagna::valName($_POST['name'])){
                $this->notval['name']=true;
            }
        }
        else $this->notval['name']=true;

        if(isset($_POST['category'])){
            if(!ECampagna::valCategory($_POST['category'])){
                $this->notval['category']=true;
            }
        }
        else $this->notval['category']=true;

        if(isset($_POST['country'])){
            if(!ECampagna::valCountry($_POST['country'])){
                $this->notval['country']=true;
            }
        }
        else $this->notval['country']=true;

        if(isset($_POST['goal'])){
            if(!ECampagna::valGoal($_POST['goal'])){
                $this->notval['goal']=true;
            }
        }
        else $this->notval['goal']=true;

        if(isset($_POST['bankcount'])){
            if(!ECampagna::valBankcount($_POST['bankcount'])){
                $this->notval['bankcount']=true;
            }
        }
        else $this->notval['bankcount']=true;
        if(isset($_POST['enddate'])){
            var_dump($_POST['enddate']);
            if(!ECampagna::valDate($_POST['enddate'])){
                $this->notval['enddate']=true;
            }
        }
        else $this->notval['enddate']=true;

        return $this->notval;
    }


    public function showCampaignProfile(ECampagna $camp, EUtente $founder,EMediaUser $founderpic,$donations){
        $this->smarty->assign('camp',$camp);
        $this->smarty->assign('founder',$founder);
        $this->smarty->assign('idcamp', $camp->getId());
        $this->smarty->assign('founderpic',base64_encode($founderpic->getData()));
        $camppic=$camp->getMedia();
        if($camppic){
            for($i=0; $i<count($camppic); $i++){
                $camppic[$i]=base64_encode($camppic[$i]->getData());
            }
        }
        $comments=$camp->getComm();
        $authors=array();
        if($comments){
            foreach($comments as $comm){
                $user=FUtente::loadById($comm->getUser());
                if($user){
                    $authors[]=$user->getUsername();
                }
                else $authors[]="anonymous";
            }
        }
        $donators=array();
        if($donations){
            foreach($donations as $don){
                $user=FUtente::loadById($don->getIdUtente());
                if($user!=null){
                    $donators[]=$user->getUsername();
                }
                else $donators[]="anonymous";
            }
        }
        $rewards=$camp->getRew();
        $this->smarty->assign('donators',$donators);
        $this->smarty->assign('donations',$donations);
        $this->smarty->assign('rewards',$rewards);
        $this->smarty->assign('comments',$comments);
        $this->smarty->assign('authors',$authors);
        $this->smarty->assign('camppic',$camppic);
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
    
        $this->smarty->display('camppage.tpl');
    }

    public function showCategoryPage($camps,$best,$last,$exp){
        if(CUtente::isLogged()) $this->smarty->assign('userlogged',$_SESSION['username']);
        $this->smarty->assign('tecno',$camps['Tecnology']);
        $this->smarty->assign('art',$camps['Art']);
        $this->smarty->assign('charities',$camps['Charities']);
        $this->smarty->assign('music',$camps['Music']);
        $this->smarty->assign('food',$camps['Food']);
        $this->smarty->assign('fashion',$camps['Fashion']);
        $this->smarty->assign('filmvid',$camps['Film & Video']);
        $this->smarty->assign('best',$best);
        $this->smarty->assign('last',$last);
        $this->smarty->assign('exp',$exp);
        $this->smarty->display('categorypage.tpl');
    }

    public function showEndCreation($idcamp){
        $this->smarty->assign('idcamp',$idcamp);
        $this->smarty->display('endcreateproject.tpl');
    }

    public function ValCreation(){
        $val=key($_POST);
        if($val=="name") return ECampagna::valName($_POST['name']);
        else if($val=="category") return ECampagna::valCategory($_POST['category']);
        else if($val=="country") return ECampagna::valCountry($_POST['country']);
        else if($val=="enddate") return ECampagna::valDate($_POST['enddate']);
        else if($val=="bankcount") return ECampagna::valBankcount($_POST['bankcount']);
        else if($val=="goal") return ECampagna::valGoal($_POST['goal']);
    }

    public function getNotVal(){
        return $this->notval;
    }
}