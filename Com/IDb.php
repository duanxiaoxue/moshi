<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/27
 * Time: 14:58
 */
namespace Com;

interface IDb
{
    function connect($host,$user,$sec,$dbname);
    function query($sql);
    function close();
}