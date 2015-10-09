$(document).ready(function(){
	var add=false,add1=false,add2=false,add3=false,add4=false,add5=false,add6=false,add7=false,add8=false,add9=false;
	$("input[name = lab_name]").bind("change",function(){
		var regu=/^[A-Za-z\u4e00-\u9fa5]+$/;
		$aa = $(this).val();
		var r = $aa.match(regu);
		if(r == null || $aa==""){
		$bb = $aa+"不符合格式...请重新输入";
		$(this).val($bb).css("color","red");
		add=false;
		retu();
	}else{
		$(this).val($aa).css("color","black");
		add=true;
		retu1();
	}
	});
	$("input[name = number]").bind("change",function(){
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
	$("input[name = s_name]").bind("change",function(){
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
	$("input[name = s_number]").bind("change",function(){
		var regu3=/^[0-9]+$/;
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
	$("input[name = place]").bind("change",function(){
		var regu4=/^[A-Za-z0-9\u4e00-\u9fa5]+$/;
		$aa4 = $(this).val();
		var r4 = $aa4.match(regu4);
		if(r4 == null || $aa4==""){
		$bb4 = $aa4+"不符合格式...请重新输入";
		$(this).val($bb4).css("color","red");
		add4=false;
		retu();
	}else{
		$(this).val($aa4).css("color","black");
		add4=true;
		retu1();
	}
	});
	$("input[name = subject]").bind("change",function(){
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
	$("input[name = area]").bind("change",function(){
		var regu6=/^[0-9]+$/;
		$aa6 = $(this).val();
		var r6 = $aa6.match(regu6);
		if(r6 == null || $aa6==""){
		$bb6 = $aa6+"不符合格式...请重新输入";
		$(this).val($bb6).css("color","red");
		add6=false;
		retu();
	}else{
		$(this).val($aa6).css("color","black");
		add6=true;
		retu1();
	}
	});
	$("input[name = job_responsibility]").bind("change",function(){
		var regu7=/^[\u4e00-\u9fa5]+$/;
		$aa7 = $(this).val();
		var r7 = $aa7.match(regu7);
		if(r7 == null || $aa7==""){
		$bb7 = $aa7+"不符合格式...请重新输入";
		$(this).val($bb7).css("color","red");
		add=false;
		retu();
	}else{
		$(this).val($aa7).css("color","black");
		add7=true;
		retu1();
	}
	});
	$("input[name = teach_expenditure]").bind("change",function(){
		var regu8=/^[0-9]+$/;
		$aa8 = $(this).val();
		var r8 = $aa8.match(regu8);
		if(r8 == null || $aa8==""){
		$bb8 = $aa8+"不符合格式...请重新输入";
		$(this).val($bb8).css("color","red");
		add8=false;
		retu();
	}else{
		$(this).val($aa8).css("color","black");
		add8=true;
		retu1();
	}
	});
	$("input[name = material_expenditure]").bind("change",function(){
		var regu9=/^[0-9]+$/;
		$aa9 = $(this).val();
		var r9 = $aa9.match(regu9);
		if(r9 == null || $aa9==""){
		$bb9 = $aa9+"不符合格式...请重新输入";
		$(this).val($bb9).css("color","red");
		add9=false;
		retu();
		}else{
			$(this).val($aa9).css("color","black");
			add9=true;
			retu1();
		}
	});
	
	function retu(){
		if(add == false || add1 == false || add2 == false || add3 == false  || add4 == false || add5 == false || add6 == false || add7 == false || add8 == false || add9 == false){
			$("input[name = Submit]").attr('disabled',"true");	
			}
		}
	function retu1(){
		if(add == true){
			$("input[name = Submit]").removeAttr("disabled");	
			}else if(add1 == true)
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
			else if(add4 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			else if(add5 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			else if(add6 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			else if(add7 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			else if(add8 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
			else if(add9 == true)
			{
				$("input[name = Submit]").removeAttr("disabled");	
			}
		}
});	