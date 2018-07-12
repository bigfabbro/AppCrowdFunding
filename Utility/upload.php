<?php

class Upload{
    private static $path="Upload/";

    static function start($file){
        if(move_uploaded_file($file['tmp_name'],static::$path.$file['name'])) return true;
        else return false;
    }
}