<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/23
 * Time: 14:52
 * 一个php文件中只能有一个类  命名空间和绝对路径要一致   一个入口
 */

/*require 'Weiketest.php';
require 'Weiketest2.php';

Weiketest\dxx();
Weiketest2\dxx();*/
//可以调用多次   写多个自动加载函数  每个框架有自己的自动加载函数
/*spl_autoload_register('autoload1');
spl_autoload_register('autoload2');

Weiketest::dxx();

Weiketest2::dxx();


function autoload1($class){

    require __DIR__.'/'.$class.'.php';
}

function autoload2($class){

    require __DIR__.'/'.$class.'.php';
}*/

/*只能写一个   一个项目多个框架就会出问题
 * function __autoload($class){

    require __DIR__.'/'.$class.'.php';
}*/



define('BASEDIR',__DIR__);

include BASEDIR.'/Com/Loader.php'; //引入加载自动加载类文件
spl_autoload_register('Com\\Loader::autoload');//注册自己的加载类函数

\Com\Object::test();//直接调用其他文件类就能访问  因为自动加载类了
\APP\Controller\Home\Index::test();

/*$stack = new SplStack();
$stack->push("ggg \n");
$stack->push("ggg2 \n");
echo $stack->pop();
echo $stack->pop();

$queue = new SplQueue();
$queue->enqueue("qqqq \n");
$queue->enqueue("qqqq2 \n");
echo $queue->dequeue();
echo $queue->dequeue();

$heap = new SplMinHeap();
$heap->insert("data1 \n");
$heap->insert("data2 \n");

echo $heap->extract();
echo $heap->extract();

$fix = new SplFixedArray(10);
$fix[0] = 111;
$fix[2]=123;
var_dump($fix);*/

/*$db = new \Com\Database();
$db->where()->limit()->order();*/




$obj = new \Com\Object();
//echo  $obj->title;
$obj->name = 'cccc';
echo $obj->name;
echo $obj->play('url',800,500);
echo \Com\Object::cutStr('title',25,'utf-8','…');

echo $obj;

echo $obj("100块钱aaa");


$db = \Com\Factory::createDb();

?>