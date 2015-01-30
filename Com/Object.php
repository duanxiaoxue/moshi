<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/23
 * Time: 15:33
 */
namespace Com;
class Object {
    protected $arr = array();
    static function test()
    {
        echo __METHOD__.'dxx';
    }

    function __set($key,$val)
    {
        var_dump(__METHOD__);
        $this->arr[$key] = $val;
    }

    function __get($key)
    {
        var_dump(__METHOD__);
        return $this->arr[$key];
    }


    function __call($func,$params)
    {
        var_dump($func,$params);
        return "调用魔术方法";
    }


    static function __callstatic($func,$params)
    {
        var_dump($func,$params);
        return "调用处理静态的魔术方法";
    }

    function  __toString()
    {
        return __CLASS__;
    }

    function __invoke($params)
    {
        return "给类传参，您传入的是".$params."经过处理后变为！！！";
    }
}