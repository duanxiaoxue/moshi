<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/23
 * Time: 17:23
 */

namespace Com;


class Database {

    function where(){
        echo "调用了where \n";
        return $this;
    }

    function order(){
        echo "调用了order \n";
        return $this;
    }

    function limit(){
        echo "调用了limit \n";
        return $this;
    }

}