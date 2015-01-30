<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/27
 * Time: 14:34
 */

namespace com\db;
use Com\IDb;

class Mysql implements IDb{
    private $conn ;
    function __construct()
    {
        $this->connect('127.0.0.1','root','dxxDE0929','fly');
    }
    function connect($host,$user,$sec,$dbname)
    {
        $conn = mysql_connect($host,$user,$sec);
        mysql_select_db($dbname,$conn);
        $this->conn = $conn;
    }
    function query($sql)
    {
        $res =  mysql_query($sql);
        $resarr = '';
        while ($line = mysql_fetch_array($res, MYSQL_ASSOC)) {
            $resarr[] = $line;
        }
        mysql_free_result($res);
        return $resarr;
    }

    function exec($sql)
    {

        $res =  mysql_query($sql);
        echo "\n执行exec\n";
        return $res;
    }

    function close()
    {
        mysql_close($this->conn);

    }

    function __destruct()
    {
        //$this->close(); //何时断开数据库连接
        echo "mysql被销毁";
    }
}