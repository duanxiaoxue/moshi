<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/28
 * Time: 11:37
 */

namespace Com\prototype;


use Com\decoration\Decoration;

class Proimg {

    public $height=20;
    public $width=40;
    private $img;
    private $decorationarr;
    function __construct()
    {
        for($i = 1; $i<=$this->height;$i++)
        {
            for($j = 1; $j<=$this->width;$j++)
            {
                $this->img[$i][$j] = "$";

            }

            $this->img[$i][$j] = "<br/>\n";

        }
    }

    function innerImg($row,$clo,$width,$height)
    {
        for($i = $row; $i<=$height+$row;$i++)
        {
            for($j = $clo; $j<=$width+$clo;$j++)
            {
                $this->img[$i][$j] = "*";
            }

        }

    }

    function addDecoration(Decoration $decoration)
    {
        $this->decorationarr[] = $decoration;
    }

    function before()
    {
        foreach( $this->decorationarr as $decoration)
        {
            $decoration->beforeDraw();

        }
    }

    function after()
    {
        $newarray = array_reverse($this->decorationarr);
        foreach($newarray as $decoration)
        {
            $decoration->afterDraw();

        }
    }

    function draw()
    {
        echo "<br/> \n";
        echo "<br/> \n";
        $this->before();
        foreach($this->img as $row)
        {
            foreach($row as $clo)
            {
                echo $clo;

            }

        }
        $this->after();
        echo "<br/> \n";
        echo "<br/> \n";
    }
}