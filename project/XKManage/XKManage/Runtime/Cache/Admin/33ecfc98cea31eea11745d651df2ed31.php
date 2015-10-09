<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>time</title>
<script src="Js/Clock.js" type=text/javascript></script>
<script>
function gaibian(a){
	switch(a){
	case 1: document.getElementById("huo").innerHTML="<a id='HyperLink2'  target='_top'  href='/Index/index'><img src='images/zhudian.png' height='40' onmouseout='yuqian(1)'  /></a>  ";	 break;
	case 2: document.getElementById("huo1").innerHTML="<a onClick='javascript:parent.location.reload()' target='_top' style='cursor:pointer;'><img src='images/shuadian.png' height='40'   onmouseout='yuqian(2)' /></a>";	break;
	case 3: document.getElementById("huo2").innerHTML="<a onclick='javascript:history.go(1)' style='cursor:pointer;'><img src='images/qiandian.png' height='40'   onmouseout='yuqian(3)' /></a>";	break;
	case 4: document.getElementById("huo3").innerHTML="<a onClick='javascript:history.back()' style='cursor:pointer;'><img src='images/houdian.png' height='40'  onmouseout='yuqian(4)' /></a>";	break;
	}
}
function yuqian(b){
	switch(b){
	case 1: document.getElementById("huo").innerHTML="<img src='images/zhuye.png' height='40'  onmousemove='gaibian(1)'/>";	 break;
	case 2: document.getElementById("huo1").innerHTML="<img src='images/shuaxin.png' height='40'  onmousemove='gaibian(2)'/>";	break;
	case 3: document.getElementById("huo2").innerHTML="<img src='images/qianjin.png' height='40'  onmousemove='gaibian(3)'/>  ";	break;
	case 4: document.getElementById("huo3").innerHTML="<img src='images/houtui.png' height='40'  onmousemove='gaibian(4)'/> ";	break;
	}
}
</script>
<style type="text/css">
body ,border , ul ,li ,img, div{margin:0px;padding:0px;border:0px;}
ul{text-decoration:none;list-style-type: none;height:41px;}
ul li{float:left;text-decoration:none;list-style-type: none;height:41px;width:50px;}
</style>
</head>
<body>
<div style="background:url('images/time_bg.png') repeat-x;font-family:'楷体'; height:41px;font-size:16px;">
<span style="line-height:41px;margin-left:20px;">今天是：</span><span style="line-height:41px;color:red;" id=clock></span>
<div style="height:41px;float:right;">
		<ul>
			<li id="huo" ><img src="images/zhuye.png" height="40" onmousemove="gaibian(1)"></li>
			<li id="huo1" ><img src="images/shuaxin.png" height="40"    onmousemove="gaibian(2)"></li>
			<li id="huo2" ><img src="images/qianjin.png" height="40"      onmousemove="gaibian(3)"></li>
			<li id="huo3" ><img src="images/houtui.png" height="40"      onmousemove="gaibian(4)"></li>
		</ul>
</div>
</div>
 <SCRIPT type=text/javascript>
    var clock = new Clock();
    clock.display(document.getElementById("clock"));
</SCRIPT>
</body>
</html>