$(document).ready(function(){
	var add=false,add1=false,add2=false,add3=false,add4=false,add5=false,add6=false,add7=false,add8=false,add9=false;
	
	$("input[name = attendence]").bind("change",function(){
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
	$("input[name = monitor]").bind("change",function(){
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
	$("input[name = absence]").bind("change",function(){
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
	
	$("input[name = teacher_name]").bind("change",function(){
		var regu5=/^[\u4e00-\u9fa5]+$/;
		$aa5 = $(this).val();
		var r5 = $aa5.match(regu5);
		if(r5 == null || $aa5==""){
		$bb5 = $aa5+"不符合格式...请重新输入";
		$(this).val($bb5).css("color","red");
	}else{
		$(this).val($aa5).css("color","black");
		add5=true;
		retu();
	}
	});
	$("input[name = lesson_time]").bind("change",function(){
		var regu6=/^(([0-1][0-9])|([2][0-4])):([0-5][0-9])$/;
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
	$("input[name = class]").bind("change",function(){
		var regu7=/^([0-9][0-9])-([1-4]{1})-(([1-9]|[1-9]([1-9]{1})))$/;
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
		//alert("niaho");
		if(add1 == true && add2 == true && add3 == true  && add5 == true && add6 == true && add7 == true){
			$("input[name = Submit]").removeAttr("disabled");	
			}
		}
});	