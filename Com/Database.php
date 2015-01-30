<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/23
 * Time: 17:23
 */

namespace Com;



class Database {

    static private $db ;

    private function __construct() //单例模式  只能new一次mysql
    {

    }

    static function getInstance()
    {
        if(self::$db){
            return self::$db;
        }else{
          //  self::$db = new Database();
            self::$db   = new \Com\db\Mysql(); //$dbtest  = new \Com\db\Mysqli(); 根据配置选择不同的数据库驱动

            return self::$db;
        }
    }

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

    function __destruct()
    {
        echo "Database封装db被销毁";
        $this->close(); //何时断开数据库连接
    }

}