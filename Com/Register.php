<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/27
 * Time: 13:50
 */

namespace Com;
class Register{

    static private $objarr;
    static function  set($alias,$obj)
    {
        self::$objarr[$alias] = $obj;

    }

    static function _unset($alias)
    {
       unset(self::$objarr[$alias]) ;
    }

    static function get($alias)
    {
        if(isset(self::$objarr[$alias])){
            return self::$objarr[$alias];
        }else{

            return false;
        }

    }



}