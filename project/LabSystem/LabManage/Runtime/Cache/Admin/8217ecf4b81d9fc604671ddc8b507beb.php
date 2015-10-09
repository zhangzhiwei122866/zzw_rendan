<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/Lab_Project/LabSystem/Public/Css/admin/admin.css" /> 
<style type="text/css">
h1{background:url("__PUBLIC__/Images/admin/welcome_h1.gif") repeat scroll 0 0 transparent;color:#444444;font-size:12px;line-height:55px;padding-left:2%;}
dl{background:url("__PUBLIC__/Images/icon/tip.gif") no-repeat scroll left 10px transparent;line-height:40px;margin:35px 0 45px 15%;padding-left:40px;}
dt{color:#009DE6;}
dd{color:#444444;}
p{border-top:1px solid #CBE4F5;color:#999999;padding-top:20px;text-align:center;}
</style> 
<title>页面提示</title>
</head>
<body>
<h1>友情提示</h1>
<dl>
    <dt><?php echo ($message); ?></dt>
    <dd>系统将在<?php echo ($waitSecond); ?>秒后自动跳转</dd>
    <dd>点击<a href="<?php echo ($jumpUrl); ?>">这里</a>直接跳转</dd>
</dl>
<script type="text/javascript">
window.setTimeout("location.href='<?php echo ($jumpUrl); ?>'", <?php echo ($waitSecond); ?>*1000);
</script>
<p>Copyright 创新开发工作室.,All rights reserved.</p>
</body>
</html>