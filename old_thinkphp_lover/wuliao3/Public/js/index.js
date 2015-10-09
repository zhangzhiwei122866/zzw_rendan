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
});

//输入验证
$(document).ready(function(){
	var u,u1,u2;	
	$("input[type != button][type !=reset]").click(function(){
			var user = $(this).val();
			if(user == this.defaultValue){
				$(this).val("");	
			}
		});
	$("input[type != button][type !=reset]").blur(function(){
			var user = $.trim($(this).val());//去除空格
			if(user == ""){
				$(this).val(this.defaultValue);	
			}else{
				$(this).css("color","black");
			}
		});	
	$("input[name = user]").bind("focus",function(){
		var weizhi = $(this).parent().next().first();
		weizhi.html("<span style='font-size:14px;color:red;'>请输入不少于六位</span>");
		}).bind("blur",function(){
			var weizhi = $(this).parent().next().first();
			var yan = /^[0-9a-zA-Z_]{5,14}/; 
			var value = $(this).val();
			if(yan.exec(value)){
				$("input[name = user]").parent().next().first().html("<span style='font-size:14px;color:blue;'>恭喜您输入正确!</span>");
				u = true;
				retu();
			}else{
				weizhi.html("<span style='font-size:14px;color:red;'>抱歉，输入错误!</span>");
			}
			});
	$("input[name = pwd]").live("focus", function(){
		var weizhi = $(this).parent().next().first();
		weizhi.html("<span style='font-size:14px;color:red;'>请铭记你的密码</span>");
		}).live("keyup",function(){
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
	function retu(){
		var u2 = window.dialogArguments.params[0];
		alert(u2);
		if(u == true && u1 == true){
			$("input[name = submit]").removeAttr("disabled");	
			}
	}
});	