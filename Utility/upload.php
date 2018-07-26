<?php
require_once 'include.php';
class Upload{
    private static $path="Upload/";

    public function myphoto($file,$iduser){
        if(move_uploaded_file($file['tmp_name'],static::$path.$file['name'])) {
            $picture=new EMediaUser($file['name'],$iduser);
            return $picture;
        }
        else  {
            copy('Smarty/img/profile.jpg',static::$path."profile.jpg");
            $picture=new EMediaUser('profile.jpg',$iduser);
            return $picture;
        }
        
    }

    public function standard($iduser){
        copy("Smarty/img/profile.jpg",static::$path."profile.jpg");
        $picture=new EMediaUser("profile.jpg",$iduser);
        return $picture;
    }

    public function photoCamp($files,$idcamp){
        $pictures=array();
        for($i=0; $i<count($files['tmp_name']); $i++){
            if(move_uploaded_file($files['tmp_name'][$i],static::$path.$files['name'][$i])){
                $pictures[]=new EMediaCamp($files['name'][$i],$idcamp);
            }  
        }
        return $pictures;
    }
}