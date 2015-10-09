<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登陆</title>
<script type="text/javascript" language="javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="__PUBLIC__/js/index.js"></script>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/index.css" />
<script>
$(document).ready(function(){
$("input[name = user]").bind("focus",function(){
	var weizhi = $(this).parent().next().first();
	weizhi.html("<span style='font-size:14px;color:red;'>请输入不少于六位</span>");
	}).bind("blur",function(){
		var weizhi = $(this).parent().next().first();
		var yan = /^[0-9a-zA-Z_]{5,14}/; 
		var value = $(this).val();
		if(yan.exec(value)){
			$("input[name = user]").parent().next().first().html("<span style='font-size:14px;color:blue;'>恭喜您输入正确!</span>");
		}else{
			weizhi.html("<span style='font-size:14px;color:red;'>抱歉，输入错误!</span>");
		}
		});

	$("input[name = submit]").live("click" , function(){
		var shuju = $("input").serialize();
		$.get('__URL__/denglu',shuju,function(cc){
		if(cc.status == 2){
			$("#zong").html("<span style='font-size:14px;color:red;'>抱歉,您的输入错误!</span>");
		}else if(cc.status == 1){
			$("#zong").html("<span style='font-size:14px;color:red;'>抱歉,您的输入账号或密码错误!</span>");
		}else if(cc.status == 0){
			$("#content").html("<span style='font-size:14px;color:blue;'>登陆成功！</span>");
			setTimeout('window.location ="__URL__/../Shou/shou"',1000)
		}
			},'json')
		});
	$("#getcode_math").click(function(){
		$(this).attr("src",'__PUBLIC__/class/code_math.php?' + Math.random());
	});
	$("#code_math").bind("keyup" , function(){
		var code_math = $("#code_math").val();
		$.post("__PUBLIC__/class/chk_code.php?act=math",{code:code_math},function(msg){
			if(msg == 1){
				$("#yan").html("<span style='color:blue;'>输入正确</span>");
				u2= true;
				hu = new get(u2);
				window.showModalDialog("#",{u2:['true']});
				alert("565656");
			}else{
				$("#yan").html("<span style='color:red;'>验证码错误</span>");
			}
		});
	});
	$("#shuaxin").live("click" , function(){
		location.reload(true); 
		});
});		
</script>
</head>
<body style="background-color: #ffffff;">
<div>
<a href="javascript:history.go(-1);" style="font-size:16px;">后退</a>
<button id="shuaxin" style="width:60px;height: 40px;">刷新</button>
</div>
<div id="content" class="yuanjiao">
	<form action="" method="post">
		<table width="430px" border="0" cellspacing="0" cellpadding="0" style="margin-left:10px;">
           <thead>
	           	<tr>
	           		<td colspan="3"><center><span style="font-size:24px;line-height:80px;"><i>登陆</i></span></center></td>
	           	</tr>	
           </thead>
           <tbody>
	           <tr style="height:50px;">
		             <td width="60px">
                    	<label for="username">用户名:</label>
                     </td>
                     <td width="186px">   
                        <input type="text" name="user" id="username" style="color:#999;" value="不少于六位" autofocus/>
                    </td>
                    <td id="hedui"><span style="color:blue;">字母和数字组成</span></td>
	           </tr>
	           <tr style="height:50px;">
	           		<td>
                    	<label for="pass">密码:</label>
                    </td>
                    <td> 
                        <input type="password" name="pwd" id="pass" value="" />
                    </td>
                    <td><span style="color:blue;">不少于六位</span></td>
	           </tr>
	           <tr style="height:50px;">
	           		<td>
                    	<label for="pas">验证码:</label>
                    </td>
                    <td> 
                        <input type="text" style="width:60px;" name="yan" class="input" id="code_math" maxlength="4" /><p class="right" style="margin-top:6px;margin-right:15px;"><img src="__PUBLIC__/class/code_math.php" id="getcode_math" title="看不清，点击换一张"></p>
                    </td>
                    <td id="yan">&nbsp;</td>
	           </tr>
	           <tr>
		           <td colspan="3">
		           <input style="margin-left:100px;" type="button" name="submit" disabled="disabled" id="chk_math" value="提交">
		           <input style="margin-left:20px;" type="reset" value="重置" />
		           </td>
	           </tr>
	           <tr>
	           		<td colspan ="3" id="zong">若果没有账号可<span style="color:red;font-size:14px;"><b><a href="__URL__/zhuce">点击注册</a></b></span></td>
	           </tr>
           </tbody>
		</table>
	</form>
</div>
</body>
</html>