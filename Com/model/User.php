<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/27
 * Time: 17:12
 */

namespace com\model;


use Com\Factory;

class User
{
    public $uid ;
    public $username ;
    public $password ;
    public $realname ;
    private $tablename ;
    private $record;
    private $db;
    function __construct($id)
    {
        $this->tablename = 'd_user';
        $this->db = Factory::createDb();

        $res = $this->db->query("select * from {$this->tablename} where uid={$id} limit 1");
      // print_r($res);exit();
        $this->record = $res[0] ;
        $this->uid  = $id;
        $this->username = $res[0]['username'];
        $this->password = $res[0]['password'];
        $this->realname = $res[0]['realname'];
    }

    function __destruct()
    {

        $res = $this->db->exec("update {$this->tablename} set username='{$this->username}', realname='{$this->realname}'
                          where uid={$this->uid} limit 1");
        echo "\n \n".$this->uid ."User被销毁";
    }


}