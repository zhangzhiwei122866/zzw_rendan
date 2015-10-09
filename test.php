<?php
header("Content-type: text/html; charset=utf-8");
echo 'hello ' . htmlspecialchars($_GET["name"]) . '!'; 
echo "<br/>";
echo $_SERVER['PHP_SELF'];//输出文件名
//for(;;){
//echo "启航带我们装b，带我们飞<br/>";
//}

var_dump($_SERVER);
echo "<hr/>";
while (list($var,$value) = each ($_SERVER)) {
echo $var." Val:".$value."<br />";
}
echo "<hr/><br/>";
foreach($_SERVER as $key => $value){
echo '$_SERVER["'.$key.'"] = '.$value."<br />";
}

echo "<hr/><br/>";

$scriptname=end(explode('/',$_SERVER['PHP_SELF']));
$scriptpath=str_replace($scriptname,'',$_SERVER['PHP_SELF']);
echo $_SERVER['PHP_SELF']."<br/>";
echo $scriptname."<br/>";
echo $scriptpath;



echo "<hr/>";
function request_URI() {
    if(!isset($_SERVER['REQUEST_URI'])) {//如果没有文件名的时候
        $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
        if($_SERVER['QUERY_STRING']) {
            $_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
        }
    }
    return $_SERVER['REQUEST_URI'];
}
$_SERVER['REQUEST_URI'] = request_URI();

echo "<hr/>";
echo $_SERVER['SCRIPT_FILENAME'];//文件的路径
function GetBasePath() {
    return substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME']) - strlen(strrchr($_SERVER['SCRIPT_FILENAME'], "\\")));
} 

GetBasePath();
echo "<hr/>";

$conflen=strlen('SCRIPT');
$B=substr(__FILE__,0,strrpos(__FILE__,'/'));
$A=substr($_SERVER['DOCUMENT_ROOT'], strrpos($_SERVER['DOCUMENT_ROOT'], $_SERVER['PHP_SELF']));
$C=substr($B,strlen($A));
$posconf=strlen($C)-$conflen-1;
$D=substr($C,1,$posconf);
$host='http://'.$_SERVER['SERVER_NAME'].'/'.$D;
echo $host;

echo "<hr/>";
for($i=0;$i<5;++$i):
	$a ='aaa';
echo strtoupper($a).'<br/>';
 echo "HEllO World"."<br/>";
endfor;
echo "<hr/>";

$x=TRUE;
$y=FALSE;
$z=$y OR $x;
if(($z=$y) OR $x){
echo "true<br/>";
}else {
echo "false<br/>";
}
var_dump($z);

echo "<hr/>";
$x=TRUE;
$y=FALSE;
$z=$y || $x;
var_dump($z);

echo "<hr/>";
function convertStr($str) {//转换成string类型
    return is_string($str) ? (bool) $str : (string) $str;
}



$foo = convertStr('apple');
var_dump($foo);  // Return TRUE
echo "<br/>";
$foo = convertStr(1); // Return STRING
var_dump($foo);
echo "<hr/>";
//abs() 函数返回一个数的绝对值。
$a = 0.123456789;
$b = 0.123456780;
if(abs($a-$b) > 0.000000001) {
	echo "大于".'<hr/>';
	
}
function str2num($str){
	if(strpos($str, '.') < strpos($str,',')){
		$str = str_replace('.','',$str);
		$str = strtr($str,',','.');
	}
	else{
		$str = str_replace(',','',$str);
	}
	return (float)$str;
}

echo str2num('25,01').'<br/>'; //25.01
echo str2num('2.5,01').'<br/>'; //25.01
echo str2num('25.01').'<br/>'; //25.01
echo str2num('2,5.01').'<br/>'; //25.01
echo "<hr/>";
echo floor(69.1).'<br/>';
echo (69.1-floor(69.1)).'<br/>';
echo (4.1-floor(4.1)).'<br/>';
echo round(4500/22*16-198).'<br/>';
echo "<pre>";


$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
		. ' %3$s (%4$2d = %4$04b)' . "\n";


$values = array(0, 1, 2, 4, 8);
$test = 1 + 4;

echo "\n Bitwise AND \n";
foreach ($values as $value) {
	$result = $value & $test;
	printf($format, $result, $value, '&', $test);
}

echo "\n Bitwise Inclusive OR \n";
foreach ($values as $value) {
	$result = $value | $test;
	printf($format, $result, $value, '|', $test);
}

echo "\n Bitwise Exclusive OR (XOR) \n";
foreach ($values as $value) {
	$result = $value ^ $test;
	printf($format, $result, $value, '^', $test);
}
echo date("Y-m-d H:i:s",strtotime('-3 day'));
echo PHP_EOL;//换行符
echo  "\$foo== $foo ; type is "  .  gettype  ( $foo ) .  "<br />\n" ;
 //print_r(get_defined_constants());//获取所有PHP常量
$x = "0123"  + 0;   
  $y = 0123 + 0;
$w = 0x12a;
echo $x.PHP_EOL.$y.PHP_EOL.$w.PHP_EOL;
echo $_SERVER['HTTP_REFERER'].PHP_EOL;
$array  = array(
     1     =>  "a" ,
     "1"   =>  "b" ,
     1.5   =>  "c" ,
     true  =>  "d" ,
);
var_dump ( $array );//所有的键名都被强制转换为 1，则每一个新单元都会覆盖前一个的值，最后剩下的只有一个 "d"。
echo '<br/>';
// 创建一个简单的数组
$array  = array( 1 ,  2 ,  3 ,  4 ,  5 );
print_r ( $array );

// 现在删除其中的所有元素，但保持数组本身不变:
foreach ( $array  as  $i  =>  $value ) {
    unset( $array [ $i ]);
}
print_r ( $array );

// 添加一个单元（注意新的键名是 5，而不是你可能以为的 0）
$array [] =  6 ;
print_r ( $array );
// unset() 函数允许删除数组中的某个键。但要注意数组将不会重建索引。如果需要删除后重建索引，可以用 array_values() 函数。 
// 重新索引：
$array  =  array_values ( $array );
$array [] =  7 ;
print_r ( $array ); 
$switching  = array(          10 ,  // key = 0
                     5     =>   6 ,
                     3     =>   7 , 
                     'a'   =>   4 ,
                             11 ,  // key = 6 (maximum of integer-indices was 5)
                     '8'   =>   2 ,  // key = 8 (integer!)
                     '02'  =>  77 ,  // key = '02'
                     0     =>  12   // the value 10 will be overwritten by 12
                   );
print_r($switching);
class ArrayObjectExtended extends ArrayObject
{
    private $private = 'private';
    public $hello = 'world';
}

$object = new ArrayObjectExtended();
$array = (array) $object;

// This will not expose $private and $hello properties of $object,
// but return an empty array instead.
var_export($array);
$myarray = array('test',123);
$myarray[] = &$myarray;
print_r($myarray); 
/**
 * array_walk 和 foreach, for 的效率的比较。
 * 我们要测试的是foreach, for, 和 array_walk的效率的问题。 
 */

//产生一个10000的一个数组。
$max = 10000;
$test_arr = range(0, $max);
$temp;
//我们分别用三种方法测试求这些数加上1的值的时间。

// for 的方法
$t1 = microtime(true);
for ($i = 0; $i < $max; $i++) {
    $temp = $temp + 1;
}
$t2 = microtime(true);
$t = $t2 - $t1;
echo "就使用for, 没有对数组操作 花费: {$t}\n";

$t1 = microtime(true);
for ($i = 0; $i < $max; $i++) {
    $test_arr[$i] = $test_arr[$i] + 1;
}
$t2 = microtime(true);
$t = $t2 - $t1;
echo "使用for 并且直接对数组进行了操作 花费: {$t}\n";

$t1 = microtime(true);
for ($i = 0; $i < $max; $i++) {
    addOne($test_arr[$i]);
}
$t2 = microtime(true);
$t = $t2 - $t1;
echo "使用for 调用函数对数组操作 花费 : {$t}\n";

$t1 = microtime(true);
foreach ($test_arr as $k => &$v) {
    $temp = $temp + 1;
}
$t2 = microtime(true);
$t = $t2 - $t1;
echo "使用 foreach 没有对数组操作 花费 : {$t}\n";

$t1 = microtime(true);
foreach ($test_arr as $k => &$v) {
    $v = $v + 1;
}
$t2 = microtime(true);
$t = $t2 - $t1;
echo "使用 foreach 直接对数组操作 : {$t}\n";

$t1 = microtime(true);
foreach ($test_arr as $k => &$v) {
    addOne($v);
}
$t2 = microtime(true);
$t = $t2 - $t1;
echo "使用 foreach 调用函数对数组操作 : {$t}\n";

$t1 = microtime(true);
array_walk($test_arr, 'addOne');
$t2 = microtime(true);
$t = $t2 - $t1;
echo "使用 array_walk 花费 : {$t}\n";

function addOne(&$item) {
    $item = $item + 1;
}

echo "<hr/>";
$obj  = (object)  'ciao' ;
echo  $obj -> scalar ; 
echo "<hr/>";

class stdObject {
    public function __construct(array $arguments = array()) {
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
            }
        }
    }

    public function __call($method, $arguments) {
        $arguments = array_merge(array("stdObject" => $this), $arguments); // Note: method argument 0 will always referred to the main class ($this).
        if (isset($this->{$method}) && is_callable($this->{$method})) {
            return call_user_func_array($this->{$method}, $arguments);
        } else {
            throw new Exception("Fatal error: Call to undefined method stdObject::{$method}()");
        }
    }
}

// Usage.

$obj = new stdObject();
$obj->name = "Nick";
$obj->surname = "Doe";
$obj->age = 20;
$obj->adresse = null;

$obj->getInfo = function($stdObject) { // $stdObject referred to this object (stdObject).
    echo $stdObject->name . " " . $stdObject->surname . " have " . $stdObject->age . " yrs old. And live in " . $stdObject->adresse;
};

$func = "setAge";
$obj->{$func} = function($stdObject, $age) { // $age is the first parameter passed when calling this method.
    $stdObject->age = $age;
};

$obj->setAge(24); // Parameter value 24 is passing to the $age argument in method 'setAge()'.

// Create dynamic method. Here i'm generating getter and setter dynimically
// Beware: Method name are case sensitive.
foreach ($obj as $func_name => $value) {
    if (!$value instanceOf Closure) {

        $obj->{"set" . ucfirst($func_name)} = function($stdObject, $value) use ($func_name) {  // Note: you can also use keyword 'use' to bind parent variables.
            $stdObject->{$func_name} = $value;
        };

        $obj->{"get" . ucfirst($func_name)} = function($stdObject) use ($func_name) {  // Note: you can also use keyword 'use' to bind parent variables.
            return $stdObject->{$func_name};
        };

    }
}

$obj->setName("John");
$obj->setAdresse("Boston");

$obj->getInfo();
echo "<br/>";
class abc {
public $a ="I am a";
public $b ="I am b";
public $c;
	public function geta(){
		return $this->a;
	}
	public function getb() {
		return $this->b;
	}
	public function setc($c) {
		$this->c=$c;	
	}
	public function getc() {
		return $this->c;
	}
}
$abc = new abc;
echo $abc->geta().PHP_EOL;
echo $abc->getb().PHP_EOL;
$abc->setc("c");
echo $abc->getc().PHP_EOL;
echo "<hr/>";

class User {
	public $name;
	public $nickname;
	public function __construct($name,$nickname) {//下划线是两个不是一个
		$this->name = $name;
		$this->nickname = $nickname;
	}
	public function __toString() {//下划线是两个不是一个
		return "Hello $this->name"."---".$this->nickname;
	}
	
}


$user_1 = new User('John', 'Doe');      // $user_i is an INSTANCE of User  
$user_2 = new User('Jane', 'Doe');      // $user_2 is an INSTANCE of User
var_dump( $user_1 );                  // prints: User [first='John', last='Doe']
echo $user_2 . '<br>'."<hr/>";                  // prints: User [first='Jane', last='Doe']

function arrayToObject( $array ){
  foreach( $array as $key => $value ){
    if( is_array( $value ) ) $array[ $key ] = arrayToObject( $value );
  }
  return (object) $array;
}
var_dump(arrayToObject(array(1,2,3,4,5,6,7,8,9,0)));
$arr = arrayToObject(array(1,2,3,4,5,6,7,8,9,0));
echo "<hr/>";
function &test()
{
    static $b=0;//申明一个静态变量
    $b=$b+1;
    echo $b;
    return $b;
}

$a=test();//这条语句会输出　$b的值　为１
echo "<br/>";
$a=5;
$a=test();//这条语句会输出　$b的值　为2
echo "<br/>";
$a=&test();//这条语句会输出　$b的值　为3
echo "<br/>";
$a=5;
$a=test();//这条语句会输出　$b的值　为6
echo "<hr/>";
$arrs = array("red","blue","gay","yellow");
foreach ($arrs as $arr) {
    $arr = strtoupper($arr);
}
	unset($arr);
echo "<hr/>";
$a  = array(1 => 'a', 'b', 'd');
print_r($a);
array_splice($a,2,0,'c');
print_r($a);
echo "<hr/>";
class ArrayObjectExtended1 extends ArrayObject
{
    private $private = 'private';
    public $hello = 'world';
}

$object = new ArrayObjectExtended1();
$array = (array) $object;

// This will not expose $private and $hello properties of $object,
// but return an empty array instead.
var_export($array);
echo "<br/>";
echo "<hr/>";
$arr = array("test",123);
$arr[] = &$arr;
print_r($arr);
echo "<hr/>";
$str = "nihao";
$obj = (object)$str;
var_dump($obj);
echo $obj->scalar;//scalar为默认对象名
echo "<hr/>";
class a {
    function b()
    {
        $args = func_get_args();
        $num = func_num_args();
        print_r($args);
        echo $num;
    }
}
call_user_func(array("a", "b"),"111","222");//a,b分别表示类名和方法名
echo "<hr/>";




class stdObject1 {
    public function __construct(array $arguments = array()) {//构造函数
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
            }
        }
    }
    public function __call($method, $arguments) {//如果找不到回调的函数时，会调用这个函数
        $arguments = array_merge(array("stdObject" => $this), $arguments); // Note: method argument 0 will always referred to the main class ($this).
        if (isset($this->{$method}) && is_callable($this->{$method})) {
            return call_user_func_array($this->{$method}, $arguments);//这个函数也是当需要动态调用函数时用到的，
                                                                     //它的用法和call_user_func函数比较像，只是参数传入的是数组
        } else {
            throw new Exception("Fatal error: Call to undefined method stdObject::{$method}()");
        }
    }
}
// Usage.
$obj = new stdObject1();
$obj->name = "Nick";
$obj->surname = "Doe";
$obj->age = 20;
$obj->adresse = null;
$obj->getInfo = function($stdObject) { // $stdObject referred to this object (stdObject).
    echo $stdObject->name . " " . $stdObject->surname . " have " . $stdObject->age . " yrs old. And live in " . $stdObject->adresse;
};
$func = "setAge";
$obj->{$func} = function($stdObject, $age) { // $age is the first parameter passed when calling this method.
    $stdObject->age = $age;
};
$obj->setAge(24); // Parameter value 24 is passing to the $age argument in method 'setAge()'.
// Create dynamic method. Here i'm generating getter and setter dynimically
// Beware: Method name are case sensitive.
foreach ($obj as $func_name => $value) {
    if (!$value instanceOf Closure) {//Closure用于代表 匿名函数 的类.

        $obj->{"set" . ucfirst($func_name)} = function($stdObject, $value) use ($func_name) {  // Note: you can also use keyword 'use' to bind parent variables.
            $stdObject->{$func_name} = $value;
        };

        $obj->{"get" . ucfirst($func_name)} = function($stdObject) use ($func_name) {  // Note: you can also use keyword 'use' to bind parent variables.
            return $stdObject->{$func_name};
        };

    }
}
$obj->setName("John");
$obj->setAdresse("Boston");

$obj->getInfo();


echo "<hr/>";
$obj = (object)["a"=>"a","b"=>"b"];
var_dump($obj);
echo "<hr/>";
echo $_SERVER["SERVER_NAME"];
echo "<hr/>";
function otest1 ($a) {
        echo( '一个参数' );
}
function otest2 ( $a, $b) {
            echo( '二个参数' );
}
function otest3 ( $a ,$b,$c) {
            echo( '三个参数' );
}
function otest () {
        $args = func_get_args();
        $num = func_num_args();
        call_user_func_array( 'otest'.$num, $args  );
}
otest(1);
echo "<br/>";
otest(1,2);
echo "<br/>";
otest(1,2,3);
echo "<br/>";
otest(1,2,3,4);
echo "<hr/>";
class Foo{

    protected $bar;

    public function __construct(){

        $this->bar = NULL;
        var_dump( $this->bar ); //prit 'NULL' but won't call the magic method __get()

        unset( $this->bar );
        var_dump( $this->bar ); //print 'GET bar' and 'NULL'

    }

    public function __get( $var ){ echo "GET " . $var; }

}

new Foo();
?>

