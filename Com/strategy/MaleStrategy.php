<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/27
 * Time: 15:40
 */

namespace com\strategy;


class MaleStrategy implements IStrategy{
    function showAd()
    {
        echo "手机";
    }
    function showCategory()
    {
        echo "男装类录";
    }
}