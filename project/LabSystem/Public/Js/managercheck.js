$(document).ready(function(){
	var add=false,add1=false,add2=false,add3=false,add4=false,add5=false,add6=false,add7=false,add8=false,add9=false;
	$("input[name = manager_name]").bind("change",function(){
		var regu=/^[\u4e00-\u9fa5]+$/;
		$aa = $(this).val();
		var r = $aa.match(regu);
		if(r == null || $aa==""){
		$bb = $aa+"不符合格式...请重新输入";
		$(this).val($bb).css("color","red");
	}else{
		$(this).val($aa).css("color","black");
		add=true;
		retu();
	}
	});
	$("input[name = manager_number]").bind("change",function(){
		var regu1=/^[0-9]+$/;
		$aa1 = $(this).val();
		var r1 = $aa1.match(regu1);
		if(r1 == null || $aa1==""){
		$bb1 = $aa1+"不符合格式...请重新输入";
		$(this).val($bb1).css("color","red");
	}else{
		$(this).val($aa1).css("color","black");
		add1=true;
		retu();
	}
	});
	$("input[name = subject]").bind("change",function(){
		var regu2=/^[A-Za-z\u4e00-\u9fa5]+$/;
		$aa2 = $(this).val();
		var r2 = $aa2.match(regu2);
		if(r2 == null || $aa2==""){
		$bb2 = $aa2+"不符合格式...请重新输入";
		$(this).val($bb2).css("color","red");
	}else{
		$(this).val($aa2).css("color","black");
		add2=true;
		retu();
	}
	});
	$("input[name = education]").bind("change",function(){
		var regu3=/^[A-Za-z\u4e00-\u9fa5]+$/;
		$aa3 = $(this).val();
		var r3 = $aa2.match(regu3);
		if(r3 == null || $aa3==""){
		$bb3 = $aa3+"不符合格式...请重新输入";
		$(this).val($bb3).css("color","red");
	}else{
		$(this).val($aa3).css("color","black");
		add3=true;
		retu();
	}
	});
	function retu(){
		if(add == true && add1 == true && add2 == true && add3 == true){
			$("input[name = Submit]").removeAttr("disabled");	
			}
		}
});	