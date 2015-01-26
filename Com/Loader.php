<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/23
 * Time: 15:42
 */
namespace Com;
class Loader
{
    static  function autoload($class)
    {
          var_dump($class); //得到的class是带有命名空间的  Com\Object  ::test exit();
      // echo BASEDIR.'/'.$class.'.php';
       // exit();
        echo BASEDIR.'/'.str_replace('\\','/',$class).'.php'.'***';
      //  echo BASEDIR.'\\'.$class.'.php'.'***';

       require BASEDIR.'/'.str_replace('\\','/',$class).'.php';
    }
}