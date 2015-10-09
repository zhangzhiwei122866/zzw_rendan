<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登陆</title>
<link rel="stylesheet" href="__PUBLIC__/Css/admin/login.css" type="text/css" media="screen" />			
</head>
<body>
	<div id="min_nav"></div>
	<div id="title"></div>
	<div id="content">
		<div id="login">
			<div id="main">
				<div id="type1" onmouseover="appear1()"><br><b>用户登陆</b></div><div id="type2" onmouseover="appear2()"><br><b>须知</b></div>
				<div id="window1">
					<form action="__URL__/doLogin" method="POST">
						<table id="inputtable">
							<tr><td>
							<span class="span1">&nbsp;</span><input class="input1" type="text" value="账号" name="number"/><span class="span2">&nbsp; </span>
							</td></tr>
							<tr><td>
							<span class="span1">&nbsp;</span><input class="input1" type="password" value="密码" name="password"/><span class="span2">&nbsp; </span>
							</td></tr>
							<tr><td>
							<span class="span1">&nbsp;</span><input class="input1 input2" type="text" value="验证码" name="yanzheng"/><span class="span2">&nbsp;</span>
								<div style="width:150px;height:25px;float:right;padding-top:8px;padding-left:5px;">
									<img style="position:absolute;" src="__URL__/verify"  id="pass">
									<label class="note" id="pass_a" ><a tabIndex="4" style="margin-left:60px;text-decoration:none;color:#99a2d4;" href="javascript:fleshVerify()">更换验证码</a></label>
								</div>
							</td></tr>
							<tr><td>&nbsp;提示：账号丢失请联系管理员</td></tr>
							<tr><td><input type="submit" class="button2" value=""/></td></tr>
						</table>
					</form>
				</div>
				<div id="window2">					
					<table id="inputtable2">
						<tr><td>1：请正确填写用户名和密码 </td></tr>
						<tr><td>2：本系统只为校内服务</td></tr>
						<tr><td>3：用户请勿将账号密码告知他人</td></tr>
						<tr><td></td></tr>
						<tr><td></td></tr>
					</table>					
				</div>
			</div>
		</div>
	</div>
	<div id="footer"><br /><span>版权所有&nbsp;&nbsp;®&nbsp;&nbsp;</span><b>河南大学创新开发实验室508 &nbsp;&nbsp;&nbsp;</b>All Right Reversed 2013-2023</div>	
<script type="text/javascript">
	function appear1()
	{
		document.getElementById("type1").style.background="white";
		document.getElementById("type1").style.border="0px";
		document.getElementById("type2").style.background="url(login_button1.png) repeat-x";
		document.getElementById("type2").style.border="1px solid #93afc6";
		document.getElementById("window1").style.display="block";
		document.getElementById("window2").style.display="none";
	}
	function appear2()
	{	
		document.getElementById("type1").style.background="url(login_button1.png) repeat-x";
		document.getElementById("type1").style.border="1px solid #93afc6";
		document.getElementById("type2").style.background="white";
		document.getElementById("type2").style.border="0px";
		document.getElementById("window2").style.display="block";
		document.getElementById("window1").style.display="none";
	}
</script>	
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("input[type != button][type !=reset]").click(function(){
		var user = $(this).val();
		if(user == this.defaultValue){
			$(this).val("");	
		}
	});
$("input[type != button][type !=reset]").blur(function(){
		var user = $.trim($(this).val());
		if(user == ""){
			$(this).val(this.defaultValue);	
		}else{
			$(this).css("color","black");
		}
	});
})
</script>
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