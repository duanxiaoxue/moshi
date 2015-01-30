<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/27
 * Time: 15:40
 */

namespace com\strategy;


class FeMaleStrategy implements IStrategy{
    function showAd()
    {
        echo "手镯";
    }
    function showCategory()
    {
        echo "女装类录";
    }
}