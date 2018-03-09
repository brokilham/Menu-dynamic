<?php
namespace App\Helpers;

class AppHelper{
    public static function parseDomain($content){
        $domain = asset('/');
        return str_replace('[domain]',$domain,$content);

        //return str_replace('/','777',$content);
    }
}