<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/28
 * Time: 10:55
 */

namespace Com\event;


interface Observer {

    function change($event_msg=null);

}