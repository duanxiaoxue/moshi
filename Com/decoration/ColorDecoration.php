<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/28
 * Time: 13:29
 */

namespace Com\decoration;


class ColorDecoration implements Decoration{

    private $color = 'black';
    function __construct($color)
    {
        $this->color = $color;

    }
    function beforeDraw()
    {
        // TODO: Implement beforeDraw() method.
        echo "<div style='color: {$this->color};'>";
    }

    function afterDraw()
    {
        // TODO: Implement afterDraw() method.
        echo "</div>";
    }
}