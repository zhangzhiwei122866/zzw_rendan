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
$ch  =  curl_init ();

// 设置URL和相应的选项
//curl_setopt ( $ch ,  CURLOPT_URL ,  "http://www.baidu.com/" );
//curl_setopt ( $ch ,  CURLOPT_HEADER ,  5 );
//
//// 抓取URL并把它传递给浏览器
//curl_exec ( $ch );
//
//// 关闭cURL资源，并且释放系统资源
//curl_close ( $ch );