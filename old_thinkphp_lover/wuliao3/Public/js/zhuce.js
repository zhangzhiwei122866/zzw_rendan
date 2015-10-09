// JavaScript Document
//位置
$(document).ready(function(){
	var browidth = $(window).width();
	var broheight = $(window).height();
	var daowidth = $(window).scrollLeft();
	var daoheight = $(window).scrollTop();
	var width = $("#content").outerWidth(true);
	var height = $("#content").outerHeight(true);
	var top = daoheight + (broheight - height) / 2;
	var left = daowidth + (browidth - width) / 2;
	$("#content").css({top:top,left:left});
	
	
	//判断输入的东西是否符合题意
	var hedui;
	var u,u1,u2,u3,u4;	
	$("input[name != Submit][type !=reset]").click(function(){
			var user = $(this).val();
			if(user == this.defaultValue){
				$(this).val("");	
			}
		});
	$("input[name != Submit][type !=reset]").blur(function(){
			var user = $.trim($(this).val());//去除空格
			if(user == ""){
				$(this).val(this.defaultValue);	
			}else{
				$(this).css("color","black");
			}
		});		
	$("input[name = pwd]").live("focus", function(){
		var weizhi = $(this).parent().next().first();
		weizhi.html("<span style='font-size:14px;color:red;'>请铭记你的密码</span>");
		}).live("blur",function(){
			var weizhi = $(this).parent().next().first();
			var yan = /^[0-9a-zA-Z_]{5,14}/; 
			var value = $(this).val();
			hedui = value;
			if(yan.exec(value)){
				u1= true;
				retu();
				weizhi.html("<span style='font-size:14px;color:blue;'>恭喜您输入正确!</span>");
			}else{
				weizhi.html("<span style='font-size:14px;color:red;'>抱歉，输入错误!</span>");
			}
		});	
	$("input[name = pwd]").one("focus",function(){
		$(this).parent().parent().after('<tr height="24px"><td>&nbsp;</td><td colspan="2"><div class="biaoshi left" style="color:#999;font-size:14px;">密码强度:</div><div class="passqd left"></div></td><td>&nbsp;</td></tr>');
	});
	$("input[name = pwd]").keyup(function(){
		var pwd =$(this).val();
		var pattern_d = /^\d+$/;           
		var pattern_s = /^[A-Za-z]+$/;     
		var pattern_w = /^\w+$/;       
		var pattern_W = /^\W+$/;          
		var pattern_r = /^\w+\W+[\w\W]*\w+$/;  
		var x=0;
		var y=0;
		var imgsize="60px";
		if(pattern_d.exec(pwd) || pwd == ""){
		 x=0;y=0;	
		}
		if(pattern_w.exec(pwd)) {   
			y = 1;  
		}  
		if(pattern_d.exec(pwd)) {   
			x = 1;  
			y = 0;  
		}  
		if(pattern_s.exec(pwd)) {  
			x = 2;  
			y = 0;  
		}  
		if(pattern_r.exec(pwd)) {  
			x = 3;  
			y = 2;  
		} 
		if( x == 0 && y == 0) {  
			imgsize = '-26px';  //安全级别《高》带特殊符号
		}  
		if( x > 0 && y == 0) {  
			imgsize = '0';  //安全级别《低》
		}  
		if( x == 0 && y == 1) {  
			imgsize = '-13px';  //安全级别《中》
		}  
		if( y == 2) {  
			imgsize = '-26px';  //安全级别《高》
		} 
		$(".passqd").css("background-position","left " +imgsize);
		$(".biaoshi").text("密码强度：").css("color","#888").css("line-height","20px"); 
			
		if(pwd == ""){
			$(".biaoshi").text("请输入密码！");
			$(".passqd").css("background-position","left 60px");
		}
		});	
		
	$("input[name = pwdc]").live("focus", function(){
		var weizhi = $(this).parent().next().first();
		weizhi.html("<span style='font-size:14px;color:red;'>请再次输入你的密码</span>");
		}).live("blur",function(){
			var weizhi = $(this).parent().next().first(); 
			var value = $(this).val();
			if(value == hedui && value != ""){
				u2= true;
				retu();
				weizhi.html("<span style='font-size:14px;color:blue;'>恭喜您输入正确!</span>");
			}else{
				weizhi.html("<span style='font-size:14px;color:red;'>抱歉，输入错误!</span>");
			}
		});	
	$("input[name = email]").live("focus", function(){
		var weizhi = $(this).parent().next().first();
		weizhi.html("<span style='font-size:14px;color:red;'>请输入邮箱</span>");
		}).live("blur",function(){
			var weizhi = $(this).parent().next().first(); 
			var value = $(this).val();
			var yan = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
			if(yan.exec(value)){
				u3= true;
				retu();
				weizhi.html("<span style='font-size:14px;color:blue;'>恭喜您输入正确!</span>");
			}else{
				weizhi.html("<span style='font-size:14px;color:red;'>抱歉，输入错误!</span>");
			}
		});	
	if($("input[name = yes][check = checked]")){
		u4 = true;
		retu();
	}
	function retu(){
	if(u1 == true && u2 == true && u3 == true && u4 == true){
		$("input[name = Submit]").removeAttr("disabled");	
		}
	}
});
