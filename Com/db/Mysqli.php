<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/27
 * Time: 14:34
 */

namespace com\db;
use Com\IDb;

class Mysqli implements IDb{
    private $conn ;
    function connect($host,$user,$sec,$dbname)
    {
        $this->conn = mysqli_connect($host,$user,$sec,$dbname);


    }
    function query($sql)
    {
        $res =  mysqli_query($this->conn,$sql);
        $resarr = '';
        while ($line = mysqli_fetch_array($res, MYSQL_ASSOC)) {
            $resarr[] = $line;
        }
        mysqli_free_result($res);
        $this->close();
        return $resarr;
    }
    function close()
    {
        mysqli_close($this->conn);
    }
}