<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head id=Head1>
<title>top</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<style type=text/css> 
	*{font-size: 12px; color: white}
	#logo {color: white}
	#logo a {color: white;text-decoration:none;}
	form {margin: 0px}
	body,html,div,form,ul,img,li,span{margin:0px;padding:0px;}
	.lblDep{font-size:14px;}
	.lblDep:hover{background:url();}
</style>
<script src="Js/Clock.js" type=text/javascript></script>
<script type="text/javascript" src="__PUBLIC__/Js/top.js"></script>
<meta content="MShtml 6.00.2900.5848" name=generator>
</head>
<body style="postion:relative;overflow:hidden;">
<form id="form1">
  <div  id=logo  style="background-image: url(images/title.png); background-REPEaT: no-repeat;height:152px;">
    <div style="margin-right:20px;display: block;position:absolute;right:0;z-index:2;top:10px;line-height:33px;">
			<span class="lblDep">
			     <span id="lblDep" style="color:#cc6600;font-family:'Microsoft Yahei';font-weight:bold;">欢迎您&nbsp;</span>[ <span style="color:#990000;font-size:15px;font-family:'Microsoft Yahei';font-weight:bold;"> <?php echo ($_SESSION['account_name']); ?> </span>]
			</span>
			<img src="images/menu_seprator.gif" align=absMiddle> 
			<span class="lblDep">
			    	  <a id=HyperLink2   target="_top"  href="/Admin/Public/logout">[注销]</a> 
			</span>
					<img src="images/menu_seprator.gif" align=absMiddle> 
			<span class="lblDep">
					<a id=HyperLink3  target="_top"  href="/Admin/Public/logout">[退出]</a> 
			</span>
	</div>
  </div>
  <script type=text/javascript>
    var clock = new Clock();
    clock.display(document.getElementById("clock"));
</script>
</form>
<div style="position:absolute; background:url('images/title_bg.png');width:1000px;height:152px;top:0;left:1125px;z-index:1;"></div>
</body>
</html>