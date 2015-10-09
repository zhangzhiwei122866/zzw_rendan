$(document).ready(function(){
	var add2=false,add3=false,add4=false,add5=false,add6=false,add7=false,add8=false,add9=false;
	
	$("input[name = teacher_name]").bind("change",function(){
		var regu2=/^[\u4e00-\u9fa5]+$/;
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
	$("input[name = teacher_number]").bind("change",function(){
		var regu3=/^[0-9]+$/;
		$aa3 = $(this).val();
		var r3 = $aa3.match(regu3);
		if(r3 == null || $aa3==""){
		$bb3 = $aa3+"不符合格式...请重新输入";
		$(this).val($bb3).css("color","red");
	}else{
		$(this).val($aa3).css("color","black");
		add3=true;
		retu();
	}
	});
	
	$("input[name = lesson_number]").bind("change",function(){
		var regu6=/^[0-9]+$/;
		$aa6 = $(this).val();
		var r6 = $aa6.match(regu6);
		if(r6 == null || $aa6==""){
		$bb6 = $aa6+"不符合格式...请重新输入";
		$(this).val($bb6).css("color","red");
	}else{
		$(this).val($aa6).css("color","black");
		add6=true;
		retu();
	}
	});
	$("input[name = lesson_name]").bind("change",function(){
		var regu7=/^[\u4e00-\u9fa5]+$/;
		$aa7 = $(this).val();
		var r7 = $aa7.match(regu7);
		if(r7 == null || $aa7==""){
		$bb7 = $aa7+"不符合格式...请重新输入";
		$(this).val($bb7).css("color","red");
	}else{
		$(this).val($aa7).css("color","black");
		add7=true;
		retu();
	}
	});
	
	function retu(){
		if(add2 == true && add3 == true  && add6 == true && add7 == true ){
			$("input[name = Submit]").removeAttr("disabled");	
			}
		}
});	