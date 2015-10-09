<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>密码修改</title>
<link href="__PUBLIC__/Css/user/userEdit.css" type="text/css" rel="stylesheet" />

<style>
.tdclass{text-align:right;}
.error{font-size:12px;color:red;text-align:left;}
.td{width:100px;height:auto;border-right:1px solid #B5CFEE; outline:none;}
table {margin:auto;}
td {font-size:10pt;color: #000080;}
.button {width:101px;height:41px;color:#fff;font-weight:bold;line-height:30px;font-size:16px;background:url(__PUBLIC__/images/botton.png);border:none;margin:5px auto;cursor:pointer;}
.button_1:hover input {background:url(__PUBLIC__/images/botton_2.png);}
</style>

<script src="__PUBLIC__/Js/userEdit.js" type="text/javascript"></script>
</head>
<body style="margin:0px;text-align:center;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td height="30" background="__PUBLIC__/images/tab_05.gif" style="border:0;">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:0;">
	      <tr style="border:0;">
	        <td width="12" height="30" style="border:0;"><img src="__PUBLIC__/images/tab_03.gif" width="12" height="30" /></td>
	        <td style="text-align:left;border:0"><font>修改密码</font></td>
	        <td width="16" style="border:0;"><img src="__PUBLIC__/images/tab_07.gif" width="16" height="30" /></td>
	      </tr>
	    </table>
    </td>
  </tr>
</table>
	<div class="user_centre">
		<form name="registerf" action="__PUBLIC__/success" method="post" onsubmit="return register();">
			<table class="table" width="100%"  cellspacing="0" cellpadding="0" style="margin-bottom:0px; ">
			<tr class="tr">
				<th class="h50 td2 th" ><span>用户名:</span></th>
				<th class="th"><input type="text" onkeydown="types('name')" onblur="isUsername()" name="account_name" value='<?php echo $list2; ?>' size="30"  style="height:30px;width:430px;margin-left:0px;border:none; outline:none;" /></th>
				<th class="td"><div id="name" class=error></div></th>
			</tr>
			<tr class="tr">
				<th class="h50 td2 th"><span>原密码:</span></th>
				<th class="th"><input type="password" name="password" onkeydown="types('pwd')" onblur="isempty()" size="30" style="height:30px;width:430px;margin-left:0px;border:none; outline:none;"/></th>
			    <th class="td"><div id="pwd" class=error></div></th>
			</tr>
			<tr class="tr">
				<th class="h50 td2 th"><span>新密码:</span></th>
				<th class="th"><input type="password" name="repassword"  onkeydown="types('repwd')" onblur="isemp()" size="30"style="height:30px;width:430px;margin-left:0px;border:none; outline:none;"/></th>
				<th class="td"><div id="repwd" class=error>输入的只能是数字或英文字母</div></th>
			</tr>					
		    <tr class="tr">
				<th colspan="2" class="th"><a class="button_1"  style="text-decoration:none;" ><input class="button" type="submit" value="提交"  /></a>&nbsp;
				<a class="button_1"  style="text-decoration:none;" ><input type="reset" value="重置"  class="button" />&nbsp;
				<a onClick="javascript:history.back()" class="button_1" style="text-decoration:none;"><input type="button" value="返回" class="button"/></a>
				</th>
				<th class="td" style="border-bottom:1px solid #B5CFEE;"></th>
			</tr>
			</table>
		</form>
	</div>
</body>
</html>