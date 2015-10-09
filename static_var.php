<?php
header("Content-type:text/html;charset=utf-8");
function static_var(){
	static $a=0;
	$a++;
	echo $a;
}
function var_a(){
	$a=0;
	$a++;
	echo $a;
}
echo "静态变量的输出：";
for($i=0;$i<10;$i++) {
	static_var();
}
echo "<hr/>";
echo "非静态变量的输出：";
for($j=0;$j<10;$j++) {
	var_a();
}
$zy ="不会被调用";//定义全局变量
$zyy="会被调用";//定义全局变量
function global_var() {
echo $zy."<br/>";//如果想要输出，要在方法内声明全局变量
global $zyy;
echo $zyy;
}
global_var();
?>
