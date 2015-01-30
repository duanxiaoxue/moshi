<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/28
 * Time: 10:52
 */

namespace Com\event;


abstract class EventProduce {

    protected $objarr;//关注这个事件的所有观察者
    function addObserver(Observer $observer)
    {
        $this->objarr[] = $observer;
    }
    function notify($msg)
    {
        foreach($this->objarr as $observer)
        {
            $observer->change($msg);
        }
    }
}