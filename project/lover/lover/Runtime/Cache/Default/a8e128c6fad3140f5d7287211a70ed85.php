<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录页面</title>
<link href="/Public/images/favicon.ico" rel="SHORTCUT ICON" />
<link rel="stylesheet" type="text/css" href="/Public/css/login.css" />
<script type="text/javascript" src="/Public/Js/jquery1.js"></script>
<script type="text/javascript" src="/Public/Js/denglu.js"></script>
<script type="text/javascript" src="/Public/Js/input.js"></script>
<script type="text/javascript" src="/Public/Js/phonecheck.js"></script>
<style type="text/css">
.bt{width:270px;height:40px;border: solid 2px #f2c4de;background: #FBFBFB;text-align: center;}
.btcenter{text-align: center;clear: left;padding: 4px 0px 0px;}
.sffocus {background: #f2c4de; border: 1px solid #1D95C7;}
textarea:focus, input:focus {background: #f2c4de;border:2px solid #ffffff;}
</style>
</head>
<body>
<div class="zong">
	<div class="zon">
		<div class="zhongjian">
			<div class="button">
				<ul id="work">
					<li>
					   <div class="show">
					     <a href="" ><img src="/Public/images/button3.jpg" style="border-radius:10px;" /></a>
					   </div>
				       <div class="hide">
				         <a href="/Index/index"><img alt="我们要幸福一辈子" title="我们要幸福一辈子" src="/Public/images/button4.jpg" style="border-radius:10px;" /></a> 
				       </div>
					</li>
					<li>
					   <div class="show">
					     <a href="" ><img src="/Public/images/button5.jpg" style="border-radius:10px;"/></a>
					   </div>
				       <div class="hide">
				         <a href=""><img alt="我们要幸福一辈子" title="我们要幸福一辈子" src="/Public/images/button6.jpg" style="border-radius:10px;"/></a> 
				       </div>
					</li>
					<li>
					   <div class="show">
					     <a href="" ><img src="/Public/images/button7.jpg" style="border-radius:10px;"/></a>
					   </div>
				       <div class="hide">
				         <a href=""><img alt="我们要幸福一辈子" title="我们要幸福一辈子" src="/Public/images/button8.jpg" style="border-radius:10px;"/></a> 
				       </div>
					</li>
				</ul>
			</div>
				<div class="e">
					<a href="" class="show"><img src="/Public/images/e5.jpg" style="border-radius:10px;height:100%;width:100%;position:relative;" /></a>
					<a href="../Record/record" class="hide"><img alt="书写属于我们自己的爱情传奇" title="书写属于我们自己的爱情传奇" src="/Public/images/e6.jpg" style="border-radius:10px;height:100%;width:100%;position:relative;" /></a>
				</div>
			</div>
			<div id="center">
				<div id="center1">
					<form action="success" method="post" name="myform" id="myform" onsubmit="return register1();">
						<div id="center2">
							<table width="100%" style="height:200px;margin-top:25px;">
								<tr>
									<td style="height:55px;">
										<p>手机号：</p>
									</td>
									<td style="height:55px;">
										<input type="text" name="phone" onkeydown="types('phone')" onblur="pe()" class="grayTips"  value="请输入您的手机号" style="height:40px;width:270px;font-size:180%;color:#e95e95; font-weight: bold;line-height: 1; font-family: Arial, Tahoma, sans-serif;" />
									</td>
								</tr>
								<tr>
									<td style="height:55px;">
										<p>密&nbsp;&nbsp;&nbsp;码：</p>
									</td>
									<td style="height:55px;">
										<input type="password" onkeydown="types('password')" onblur="pwd()" class="grayTips"  value="请输入您的密码" name="password" style="height:40px;width:270px;font-size:180%;color:#e95e95; font-weight: bold;line-height: 1; font-family: Arial, Tahoma, sans-serif;" />
									</td>
								</tr>
								<tr style="width:364px;">
									<td colspan="2">
										<input type="submit" value="登录" style="background-color:#f2c4de;font-size:180%;color:#e95e95; font-weight: bold;line-height: 1; font-family: Arial, Tahoma, sans-serif;border-radius:5px;" />
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="reset" value="重置" style="background-color:#f2c4de;font-size:180%;color:#e95e95; font-weight: bold;line-height: 1; font-family: Arial, Tahoma, sans-serif;border-radius:5px;" />
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<img src="/Public/images/lock2.png" style="height:25px;width:25px;margin-top:-5px;" />
										<span><a href="find">忘记密码？</a></span>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<span><a href="register">注册新帐号</a></span>
									</td>
								</tr>
							</table>
							
						</div>
					 	<div class="center3">
							<div id="phone" class="center4"></div>
							<div id="password" class="center5"></div>
						</div> 
					</form>	
				</div>	
			</div>
		</div>
	</div>
</body>
</html>