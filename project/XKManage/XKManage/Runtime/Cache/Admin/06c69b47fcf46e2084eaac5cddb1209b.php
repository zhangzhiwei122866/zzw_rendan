<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登陆</title>
<style type="text/css">
body{text-align:center;}
html,div,body,form,input{margin:0;padding:0;}
.content{background:url(__PUBLIC__/images/login_bg.jpg) no-repeat;width:1024px;height:779px;margin:5 auto;position:relative;}
form{ font-family:Verdana,Arial,Helvetica,sans-serif;position:absolute;top: 475px; left: 210px;text-align:left;width:322px;}
input{height:29px;line-height:29px;font-size:14px; width:198px;border:0;outline:none;}
table input{width:10px;margin:0;height:14px;}
table td{font-size:13px;line-height:14px;font-family:Microsoft Yahei;}
.submit{background:url(__PUBLIC__/images/button.png) no-repeat; width:92px;height:37px;}
.submit:hover{background:url(__PUBLIC__/images/button_hover.png) no-repeat;}
</style>
<script type="text/javascript">
var q=document;
function inputstyle1(t)
{
	var input = "inputs"+t;
	switch(t)
	{
		case 1:	if(q.getElementById(input).value=="用户名") q.getElementById(input).value="";
				q.getElementById(input).style.color="#000";
			break;
		case 2:	if(q.getElementById(input).value=="密码") q.getElementById(input).value="";
				q.getElementById(input).style.color="#000";
			break;
		case 3:	if(q.getElementById(input).value=="验证码") q.getElementById(input).value="";
				q.getElementById(input).style.color="#000";
			break;
		case 4:	if(q.getElementById(input).value=="用户名") q.getElementById(input).value="";
				q.getElementById(input).style.color="#000";
			break;
		case 5:	if(q.getElementById(input).value=="密码") q.getElementById(input).value="";
				q.getElementById(input).style.color="#000";
			break;
		case 6:	if(q.getElementById(input).value=="验证码") q.getElementById(input).value="";
				q.getElementById(input).style.color="#000";
			break;
	};
}
function inputstyle2(t)
{
	var input = "inputs"+t;
	switch(t)
	{
		case 1:	if(q.getElementById(input).value ==""){
						q.getElementById(input).value="用户名";
						q.getElementById(input).style.color="#aaa";}else{q.getElementById(input).style.color="#000";}
			break;
		case 2:	if(q.getElementById(input).value ==""){
						q.getElementById(input).value="密码";
						q.getElementById(input).style.color="#aaa";}else{q.getElementById(input).style.color="#000";}
			break;
		case 3:	if(q.getElementById(input).value ==""){
						q.getElementById(input).value="验证码";
						q.getElementById(input).style.color="#aaa";}else{q.getElementById(input).style.color="#000";}
			break;
		case 4:	if(q.getElementById(input).value ==""){
						q.getElementById(input).value="用户名";
						q.getElementById(input).style.color="#aaa";}else{q.getElementById(input).style.color="#000";}
			break;
		case 5:	if(q.getElementById(input).value ==""){
						q.getElementById(input).value="密码";
						q.getElementById(input).style.color="#aaa";}else{q.getElementById(input).style.color="#000";}
			break;
		case 6:	if(q.getElementById(input).value ==""){
						q.getElementById(input).value="验证码";
						q.getElementById(input).style.color="#aaa";}else{q.getElementById(input).style.color="#000";}
			break;
	};
}
</script>
</head>
<body>
	<div class="content">
		<form action="__URL__/doLogin" method="post" >
			<input style="margin-left:115px;" name="username"  class="input1" id="inputs1" onBlur="inputstyle2(1)" onfocus="inputstyle1(1)" /><br/>
			<input style="margin-top:15px;margin-left:114px;_margin-top:14px;" type="password" class="input1" id="inputs2"  name="password"  onBlur="inputstyle2(2)" onfocus="inputstyle1(2)"/><br/>
			<input style="width:85px;margin-top:17px;margin-left:70px;_margin-top:14px;float:left" type="text" class="input1 input2" id="inputs3"  name="yanzheng" onBlur="inputstyle2(3)" onfocus="inputstyle1(3)"/>
			<div style="width:150px;height:25px;float:left;padding-top:18px;padding-left:5px;margin-left: 11px;">
				<img style="position:absolute;" src="__URL__/verify"  id="pass">
				<label class="note" id="pass_a"><a tabIndex="4" style="margin-left:60px;text-decoration:none;color:#99a2d4;" href="javascript:fleshVerify()">更换验证码</a></label>
			</div>
			
			<input style="margin-left:220px;margin-top:41px;_margin-left:-99px;_margin-top:84px;" class="submit"  type="submit"  value=""/>
		</form>
	</div>
	<script type="text/javascript" src='__PUBLIC__/Js/jquery.js'></script>	
<script type="text/javascript">
function fleshVerify (){
	var timenow = new Date().getTime();
	$("#pass").attr("src","__URL__/verify/"+timenow);
}
function fleshVerify1 (){
	var timenow = new Date().getTime();
	$("#pass1").attr("src","__URL__/verify/"+timenow);
}
</script>
</body>
</html>