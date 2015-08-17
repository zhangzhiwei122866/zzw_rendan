<?php
/**
 * Created by PhpStorm.
 * User: zzw
 * Date: 15-8-11
 * Time: 下午2:48
 */
header("content-type:text/html;charset=utf-8");
//header("Content-type: text/html; charset=utf-8");
//验证回调函数call_user_func()
function Mycallfunc() {
    echo  __FUNCTION__."->"."A<br/>";
}
class myclass{
    function Mycallfunc() {
        echo get_class($this)."->". __FUNCTION__."->"."B<br/>";
    }
}
call_user_func("Mycallfunc");
call_user_func(array("myclass","Mycallfunc"));
call_user_func("myclass::Mycallfunc");

class myclass1{
    static function func1() {
        echo get_class()."->". __FUNCTION__."->"."func1";
    }
}
class myclass2 extends myclass1{
    static function func1() {
        echo get_class()."->". __FUNCTION__."->"."fun1";
    }
    function func2() {
        echo get_class()."->". __FUNCTION__."->"."func2";
    }
    private function func3() {
        echo get_class()."->". __FUNCTION__."->"."func3";
    }
}
call_user_func(array("myclass2","parent::func1"));

echo "<hr/>";
$double = function($a) {
    return $a*2;
};
$number = range(1,5);//range() 函数创建并返回一个包含指定范围的元素的数组。
$res = array_map($double,$number);//array_map() 函数返回用户自定义函数作用后的数组。回调函数接受的参数数目应该和传递给 array_map() 函数的数组数目一致。
                                //$double是方法，$number是传的参数
var_dump($res);
print  implode ( ' ' ,  $res );// 将数组变成字符串。语法: string implode(string glue, array pieces);返回值: 字符串 函数种类: 资料处理
echo "<hr/>";
$callback = 'printf'; $callback('Hello World!');
echo "<hr/>";
$x = '';
if(is_null($x)) {// is_null — 检测变量是否为 NULL 如果 var 是 null 则返回 TRUE ，否则返回 FALSE 。
    echo "false";
} else {
    echo "true";
}
echo "<hr/>";
$a = "3asdf";
$b = 3;
if($a == $b) {//运行发现a与b相等
    echo "a 与b相等";
}
echo "<hr/>";
//curl_init()创建一个会话
// 创建一个新cURL资源
//$ch  =  curl_init ();

// 设置URL和相应的选项
//curl_setopt ( $ch ,  CURLOPT_URL ,  "http://www.baidu.com/" );
//curl_setopt ( $ch ,  CURLOPT_HEADER ,  5 );
//
//// 抓取URL并把它传递给浏览器
//curl_exec ( $ch );
//
//// 关闭cURL资源，并且释放系统资源
//curl_close ( $ch );
echo "成功导入github<br/>";
$count = "2 cats";
echo gettype($count);
echo "<br/>";
$count +=3;
echo $count."<br/>";
echo gettype($count);
echo "<hr/>";
class Myclass5 {
    private $a = "a";
    public $b = "b";
    public $c = "c";
    protected $d = 'd';
}
$test = new Myclass5();
echo "<pre>";
print_r((array)$test);
echo "<hr/>";
foreach ((array) $test as $key => $value) {
    $len = strlen($key);
    echo "{$key} ({$len}) => {$value}<br />";
    for ($i = 0; $i < $len; ++$i) {
        echo ord($key[$i]) . ' ';//ord() 函数返回字符串的首个字符的 ASCII 值。
    }
    echo '<hr />';
}
$str = "Hello World";
//unset($str);
echo $str."<br/>";
echo trim($str,"hd");//trim() 函数移除字符串两侧的空白字符或其他预定义字符。
//ltrim() - 移除字符串左侧的空白字符或其他预定义字符
//rtrim() - 移除字符串右侧的空白字符或其他预定义字符
echo "<hr/>";
$ArrayList = array("_GET", "_POST", "_SESSION", "_COOKIE", "_SERVER");
foreach($ArrayList as $gblArray)
{
    $keys = array_keys($$gblArray);
    foreach($keys as $key)
    {
        echo "$key"."<br/>";
        $$key = trim(${$gblArray}[$key]);
        //echo $$key."<br/>";
    }
}
echo "<hr/>";
function  Test ()
{
    $a  =  0 ;
    echo  $a ;
    $a ++;
}
function  Test_static ()
{
   static $a  =  0 ;
    echo  $a ;
    $a ++;
}
for($i=0;$i<3;$i++){
    Test();//不管循环多少次都是0,因为变量a不会改变
    echo "<br/>";
    Test_static();//变量a会保持赋值的新值，每次循环都会递增1
}
//静态变量与递归函数
function  test3 ()
{
    static  $count  =  0 ;

    $count ++;
    echo  $count."<br/>" ;
    if ( $count  <  10 ) {
        test3 ();//递归函数
    }
    $count --;
}
echo "<hr/>";
test3();
echo "<hr/>";
class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
    public function fooStatic() {
        return parent::$my_static;
    }
}


print Foo::$my_static . "\n";

$foo = new Foo();
print $foo->staticValue() . "\n";
print $foo->my_static . "\n";      // Undefined "Property" my_static

print $foo::$my_static . "\n";
$classname = 'Foo';
print $classname::$my_static . "\n"; // PHP 5.3.0之后可以动态调用

print Bar::$my_static . "\n";
$bar = new Bar();
print $bar->fooStatic() . "\n";
echo "<hr/>";
abstract class AbstractClass
{
    // 强制要求子类定义这些方法
    //在子类中要实现这些方法
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // 普通方法（非抽象方法）
    public function printOut() {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') ."\n";

$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_') ."\n";
/*
 * 使用接口（interface），你可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。
 * 我们可以通过interface来定义一个接口，就像定义一个标准的类一样，但其中定义所有的方法都是空的。
 *  接口中定义的所有方法都必须是public，这是接口的特性。
1. 实现
要实现一个接口，可以使用implements操作符。类中必须实现接口中定义的   所有方法，
否则会报一个fatal错误。如果要实现多个接口，可以用逗号来分隔多个接口的名称。
Note: 实现多个接口时，接口中的方法不能有重名。
Note: 接口也可以继承，通过使用extends操作符。
2. 常量
接口中也可以定义常量。接口常量和类常量的使用完全相同。 它们都是定值，不能被子类或子接口修改。
 */
// 声明一个'iTemplate'接口
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}


// 实现接口
// 下面的写法是正确的
class Template implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

// 下面的写法是错误的，会报错：
//要实现接口中的所有的方法
// Fatal error: Class BadTemplate contains 1 abstract methods
// and must therefore be declared abstract (iTemplate::getHtml)
/*class BadTemplate implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
}*/
//多个接口之间的继承
interface a
{
    public function foo();
}
interface b
{
    public function bar();
}
interface c extends a, b
{
    public function baz();
}
class d implements c
{
    public function foo()
    {

    }
    public function bar()
    {

    }
    public function baz()
    {

    }
}