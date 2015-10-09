<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>注册</title>
<script type="text/javascript" language="javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="__PUBLIC__/js/zhuce.js"></script>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/zhuce.css" />
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
			var str = $(this).serialize();
			$.get('__URL__/getAjax',str,function(cc){
				if(cc.status == 1){
					$("input[name = user]").parent().next().first().html("<span style='font-size:14px;color:red;'>用户已存在</span>")			
				}else{
					$("input[name = user]").parent().next().first().html("<span style='font-size:14px;color:blue;'>恭喜您输入正确!</span>");
					u = true;
					retu();
				}},'json');
		}else{
			weizhi.html("<span style='font-size:14px;color:red;'>抱歉，输入错误!</span>");
		}
	});	
$("input[name = Submit]").bind("click" , function(){
	var shuju = $("input").serialize();
	$.get('__URL__/dozhuce',shuju,function(res){
		if(res.status == 0){
			alert("操作失败");
		}else if(res.status == 1){ 
			$("#content").html('<div style="margin-top:100px;font-size:24px;">恭喜你注册成功！<meta http-equiv=\"refresh\" content=\"0.5;url=__URL__\index"></div>');
			}},'json');
	
});		
});
</script>
</head>
<body>
<div id="content" class="yuanjiao">
	<form action="" method="post">
		<table width="800px" border="0" cellspacing="0" cellpadding="0" style="margin-left:10px;">
           <thead>
	           	<tr>
	           		<td colspan="4"><center><span style="font-size:24px;line-height:60px;"><i>注册</i></span></center></td>
	           	</tr>	
           </thead>
           <tbody>
	           <tr>
                    <td width="5px"></td>
                    <td width="80px">
                    	<label class="left" for="username">用户名:</label>
                     </td>
                     <td width="186px">   
                        <input type="text" name="user" id="username" style="color:#999;opacity:10;" value="不少于六位" />
                    </td>
                    <td  id="ajax_demo2">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    	<label class="left" for="pass">密码:</label>
                    </td>
                    <td> 
                        <input type="password" name="pwd" id="pass" value="" />
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    	<label class="left" for="passc">密码核对:</label>
                    </td>
                    <td> 
                        <input type="password" name="pwdc" id="passc" value="" />
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    	<label class="left" for="emai">邮箱:</label>
                    </td>
                    <td> 
                        <input type="text" name="email" id="emai" />
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                    	<label class="left" for="body">男:</label>
                        <input type="radio" name="sex" id="body" value="1" checked/>
                        <label for="girl">女:</label>
                        <input type="radio" name="sex" id="girl" value="2" />
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="4">
                    	<fieldset style="width:300px;height:350px;border:1px solid #999999;margin-left:10px;">
                        	<legend style="font-size:14px;margin-left:15px;">用户须知:</legend>
                            <div style="width:700px;overflow-y:auto;height:280px;margin-top:15px;">
                            	<ol start="1" style="background-color:#E7E7E7;margin-top:2px;margin-left:2px;line-height:25px;font-size:18px;letter-spacing:5px;">
                                	<li>1:#################################################</li>
                                    <li>2:#################################################</li>
                                    <li>3:#################################################</li>
                                    <li>4:#################################################</li>
                                    <li>5:#################################################</li>
                                    <li>6:#################################################</li>
                                    <li>7:#################################################</li>
                                    <li>8:#################################################</li>
                                    <li>9:#################################################</li>
                                    <li>10:#################################################</li>
                                    <li>11:#################################################</li>
                                </ol>
                            </div>
                            <div style="margin-top:6px;">
                            	<span class="left" style="font-size:14px;margin-left:15px;">同意</span><input type="checkbox" name="yes" />
                                <span style="font-size:14px;margin-left:15px;">不同意</span><input type="checkbox" name="yes" />
                            </div>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                    <td colspan="2">
						<input type="button" style="width:50px;height:30px;cursor:pointer"  disabled="disabled" value="提交" name="Submit" class="anniu" />
						<input type="reset" style="width:50px;height:30px;cursor:pointer" value="重置" name="Reset" class="anniu" />
                    </td>
                    <td>&nbsp;</td>
                </tr>
	            <tr>
	           		<td colspan ="4" id="zong">若果没有账号可<span style="color:red;font-size:14px;"><b><a href="__URL__/index">点击登陆</a></b></span></td>
	            </tr>
           </tbody>
		</table>
	</form>
</div>
</body>
</html>