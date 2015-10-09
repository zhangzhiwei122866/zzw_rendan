<?php
mb_http_input("utf-8");
mb_http_output("utf-8");

if(getGet('access2008_cmd')=='2'){
	
	die('0');
}
if(getGet('access2008_cmd')=='3'){
	
	die('1'); 
}
$php_path = dirname(__FILE__) . '/';
$php_url = dirname($_SERVER['PHP_SELF']) . '/';

//文件保存目录路径
$save_path = $php_path . '../images/upload/';//默认为 update.php所在目录
//文件保存目录URL
$save_url = $php_url . '../images/upload/';//默认为 update.php所在目录
//定义允许上传的文件扩展名
$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
//最大文件大小
$max_size = 1024*500;//(默认500K)

$save_path = realpath($save_path) . '/';

//有上传文件时
if (empty($_FILES) === false) {
	//原文件名
	$file_name = $_FILES['Filedata']['name'];
	//服务器上临时文件名
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	//文件大小
	$file_size = $_FILES['Filedata']['size'];
	//检查文件名
	if (!$file_name) {
		exit("返回错误: 请选择文件。");
	}
	//检查目录
	if (@is_dir($save_path) === false) {
		exit("返回错误: 上传目录不存在。($save_path)");
	}
	//检查目录写权限
	if (@is_writable($save_path) === false) {
		exit("返回错误: 上传目录没有写权限。($save_url)");
	}
	//检查是否已上传
	if (@is_uploaded_file($tmp_name) === false) {
		exit("返回错误: 临时文件可能不是上传文件。($file_name)");
	}
	//检查文件大小
	if ($file_size > $max_size) {
		exit("返回错误: 上传文件($file_name)大小超过限制。最大".($max_size/1024)."KB");
	}
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
if (in_array($file_ext, $ext_arr) === false) {
		exit("返回错误: 上传文件扩展名是不允许的扩展名。");
}

	//创建文件夹
	$ymd = date("Ymd");
	$save_path .= $ymd . "/";
	$save_url .= $ymd . "/";
	if (!file_exists($save_path)) {
		mkdir($save_path);
	}
	//新文件名
	$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
	
	echo "文件夹路径" . $save_url . $file_name . "<br />";
	//移动文件
	$file_path = $save_path . $new_file_name;
	@chmod($file_path, 0644);//修改目录权限(Linux)
	if (move_uploaded_file($tmp_name, $file_path) === false) {//开始移动
		exit("返回错误: 上传文件失败。($file_name)");
	}
	$file_url = $save_url . $new_file_name;
	  $fileName = uniqid('image',true).$type;
	  
	  
	  $conn=@mysql_connect("localhost","root","123456") or die("数据库连接错误");
	  mysql_query("set names utf8");
	  mysql_select_db("think",$conn);
	  $sql="insert into think_img(lujing)"." values ('$file_url')";
	  $ni=mysql_query($sql);
}
function filekzm($a)
{
	$c=strrchr($a,'.');
	if($c)
	{
		return $c;
	}else{
		return '';
	}
}

function getGet($v)// 获取GET
{
  if(isset($_GET[$v]))
  {
	 return $_GET[$v];
  }else{
	 return '';
  }
}

function getPost($v)// 获取POST
{
  if(isset($_POST[$v]))
  {
	  return $_POST[$v];
  }else{
	  return '';
  }
}
?>

