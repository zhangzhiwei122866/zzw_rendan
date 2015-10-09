// JavaScript Document

$(document).ready(function(){
	$("input[type != submit][type !=reset]").css("color","#999");	
	$("input[type != submit][type !=reset]").click(function(){
			var user = $(this).val();
			if(user == this.defaultValue){
				$(this).val("");	
			}
		});
	$("input[type != submit][type !=reset]").blur(function(){
			var user = $.trim($(this).val());
			if(user == ""){
				$(this).val(this.defaultValue);	
			}else{
				$(this).css("color","black");
			}
		});	
})