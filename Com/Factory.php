<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/24
 * Time: 0:08
 工厂模式 主要是当被new的对象很多地方使用，一旦更改属性，可以一次一个地方修改

 */

namespace Com;


class Factory {

    static function createDb()
    {
        $db = new Database();
        return $db;
    }

}