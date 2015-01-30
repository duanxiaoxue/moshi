<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/28
 * Time: 13:22
 */

namespace Com\decoration;


interface Decoration {

    function beforeDraw();
    function afterDraw();
}