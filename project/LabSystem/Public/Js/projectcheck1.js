$(document).ready(function(){
	var add=false,add1=false,add2=false,add3=false,add4=false,add5=false,add6=false,add7=false,add8=false,add9=false;
	
	$("input[name = period]").bind("change",function(){
		var regu1=/^[0-9]+$/;
		$aa1 = $(this).val();
		var r1 = $aa1.match(regu1);
		if(r1 == null || $aa1==""){
		$bb1 = $aa1+"不符合格式...请重新输入";
		$(this).val($bb1).css("color","red");
		add1=false;
		retu();
	}else{
		$(this).val($aa1).css("color","black");
		add1=true;
		retu1();
	}
	});
	$("input[name = number]").bind("change",function(){
		var regu=/^[0-9]+$/;
		$aa = $(this).val();
		var r = $aa.match(regu);
		if(r == null || $aa==""){
		$bb = $aa+"不符合格式...请重新输入";
		$(this).val($bb).css("color","red");
		add1=false;
		retu();
	}else{
		$(this).val($aa).css("color","black");
		add=true;
		retu();
	}
	});
	$("input[name = name]").bind("change",function(){
		var regu2=/^[\u4e00-\u9fa5]+$/;
		$aa2 = $(this).val();
		var r2 = $aa2.match(regu2);
		if(r2 == null || $aa2==""){
		$bb2 = $aa2+"不符合格式...请重新输入";
		$(this).val($bb2).css("color","red");
		add2=false;
		retu();
	}else{
		$(this).val($aa2).css("color","black");
		add2=true;
		retu1();
	}
	});
	$("input[name = character]").bind("change",function(){
		var regu3=/^[\u4e00-\u9fa5]+$/;
		$aa3 = $(this).val();
		var r3 = $aa3.match(regu3);
		if(r3 == null || $aa3==""){
		$bb3 = $aa3+"不符合格式...请重新输入";
		$(this).val($bb3).css("color","red");
		add3=false;
		retu();
	}else{
		$(this).val($aa3).css("color","black");
		add3=true;
		retu1();
	}
	});
	
	$("input[name = teacher_name]").bind("change",function(){
		var regu5=/^[\u4e00-\u9fa5]+$/;
		$aa5 = $(this).val();
		var r5 = $aa5.match(regu5);
		if(r5 == null || $aa5==""){
		$bb5 = $aa5+"不符合格式...请重新输入";
		$(this).val($bb5).css("color","red");
		add5=false;
		retu();
	}else{
		$(this).val($aa5).css("color","black");
		add5=true;
		retu1();
	}
	});
	
	function retu(){
		if(add == false ||add1 == false || add2 == false || add3 == false   || add5 == false ){
			$("input[name = Submit]").attr('disabled',"true");	
			}
		}
	function retu1(){
		if(add1 == true){
			$("input[name = Submit]").removeAttr("disabled");	
		}
		else if(add1 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			else if(add2 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			else if(add3 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			
			else if(add5 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			
		}
});	