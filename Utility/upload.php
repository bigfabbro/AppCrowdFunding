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


}