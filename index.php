<?php
/**
 * Created by PhpStorm.
 * User: dxx
 * Date: 2015/1/23
 * Time: 14:52
 * 一个php文件中只能有一个类  命名空间和绝对路径要一致   一个入口 规范
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
$obj->name = 'cccc'; //set方法
echo $obj->name; //get方法
echo $obj->play('url',800,500);//调用魔术方法
echo \Com\Object::cutStr('title',25,'utf-8','…'); //调用魔术静态方法

echo $obj;

echo $obj("100块钱aaa"); //给类传参
/*
\Com\Factory::createDb();  //工厂模式   注册树模式  在合适的时机注册进行调用
//new \Com\Database();  //错误  单例模式  不能直接new 因为构造方法是私有的

$db = \Com\Register::get('db'); //注册树模式 调用类的时候只要从注册器上进行调用  使用工厂调用
var_dump($db);

$dbtest  = new \Com\db\Mysqli(); //$dbtest  = new \Com\db\Mysql();  在框架中根据配置可以选择其中所需适配器
$dbtest->connect('127.0.0.1','root','dxxDE0929','fly');
$res = $dbtest->query('select * from news_articles'); //select * from news_articles
print_r($res);
*/

//策略模式 ----根据用户属性【上下文环境】设定策略，不同的策略使用不同类来处理

/*class Page
{
    private  $mystrategy ;
    function index()
    {
        echo "广告<br/>";
        $this->mystrategy->showAd();

        echo "类目<br/>";
        $this->mystrategy->showCategory();
    }

    function setStrategy(\com\strategy\IStrategy $strategy)
    {
        $this->mystrategy = $strategy;
    }
}

$sex = $_GET['sex'];
$page = new Page();
$classstr = '\\com\\strategy\\'.$sex.'Strategy';
$page->setStrategy(new $classstr());
$page->index();*/

//以下数据对象映射模式  在合适的时机调用工厂 创建出db类存入注册器
//创建一个对应某张表的数据对象类 model  在model中增加数据表字段属性方法，调用工厂生产出的db类进行增删改，db类采用了单例模式，在增删改中操作完数据库需要进行关闭
//正常的mvc框架中是有基础的操作数据库的类 有点类似项目中的适配器，不同的数据库操作采用不同适配器 ，封装了基本的增删改的model类
//以及继承了model类的具体对应表的 类 例如 UserModel  user对象也要使用工厂生成后放入注册器，避免重复new 而且使用工厂也避免掉类名称改变后
//需要多处修改的麻烦

/*class index
{
    function test1()
    {
        $user =  \Com\Factory::createUser(60);
        $user->username = "反反复复点多xxxxxd1xc";

        var_dump($user);
    }

    function test2()
    {
        $user =  \Com\Factory::createUser(60);

        $user->realname = "方法凤飞飞xxxxx2222";
        var_dump($user);
    }
}

$index = new index();
$index->test1();
$index->test2();*/


/*
 * 观察者模式 就是一个事件，关注该事件的所有观察者当事件被触发后，做出自己的逻辑
 * 关注-----使用事件类中的数组进行保存
 * 当事件某方法被调用即触发了事件，然后循环调用观察者的方法
 */

/*class event extends \Com\event\EventProduce
{
    function trigger($msg)
    {
        foreach($this->objarr as $observer)
        {
            $observer->change($msg);

        }

    }
}

class observer1 implements \Com\event\Observer
{

    function change($event_msg = null)
    {
        // TODO: Implement change() method.
        echo $event_msg."我是第一个观察者，我看到变化要做点啥呢";
    }
}


class observer2 implements \Com\event\Observer
{

    function change($event_msg = null)
    {
        // TODO: Implement change() method.
        echo $event_msg."我是第二个观察者，我看到变化要做点啥呢******";
    }
}

$observer1 = new observer1();
$observer2 = new observer2();
$event = new event();
$event->addObserver($observer1);
$event->addObserver($observer2);
$event->trigger("我被触发了，你们看着办吧…………………………");*/



/*
 * 原型模式 就是使用clone 因为是内存拷贝 避免了new时 多次的初始化赋值操作 适合对象复杂时使用
 * 但要注意php的clone是浅克隆  因为如果对象中有引用类型的属性则会共用【指向内存同一地址】
 */
/*
$prototype = new \Com\prototype\Proimg();
$img1 = clone $prototype ;
$img2 = clone $prototype ;
$img3 = clone $prototype ;

$img1->innerImg(2,4,10,10);
$img2->innerImg(4,6,10,10);
$img3->innerImg(6,8,10,10);

$img1->draw();
$img2->draw();
$img3->draw();*/


/*
 * 装饰器模式  针对类新增的一些功能，可以不使用继承子类，而使用装饰类在类前中后执行方法 增加灵活性
 */

/*$prototype = new \Com\prototype\Proimg();
$prototype->innerImg(2,4,10,10);
$decoration = new \Com\decoration\ColorDecoration('red');
$prototype->addDecoration($decoration);
$prototype->draw();*/


/*
 * 迭代器模式
 */
/*$users =new \Com\iterator\UsersIterator();
foreach($users as $user)
{
    var_dump($user->realname);
}*/

/*
 * 代理模式  使用代理，这样外部代码不需要关心实现细节，实现细节被封装到了代理里面
 * 比如 读写分离的代理   代理提供两个方法，读和写  写的时候使用master数据库 读的时候使用slave数据库
 * 想要写数据库则直接调用代理的写方法  想要读则调用代理的读方法  不需要外部代码中做数据库连接操作这样的细节
 */


?>