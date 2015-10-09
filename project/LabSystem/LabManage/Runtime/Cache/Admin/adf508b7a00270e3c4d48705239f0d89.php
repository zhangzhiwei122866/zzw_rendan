<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/Public/Js/assess.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/assess.css" />
<title>教师工作量</title>
<script type="text/javascript">
$(document).ready(function() {
   $('select[name = shinumber]').bind("change" ,function(){
		var shinumber = $('select[name = shinumber]').serialize();
		$.get('__URL__/ajhuo',shinumber,function(cc){
			if(cc.status == 0){
				$('select[name = shiuser]').val("无此编号").css("color","red");
			}else{
				$('select[name = shiuser]').val(cc.data[0]['name']);
			}
		},'json')
	});
	$('select[name = shiuser]').bind("change" ,function(){
		var shiuser = $('select[name = shiuser]').serialize();
		$.get('__URL__/ajhuo1',shiuser,function(cc){
			if(cc.status == 0){
				$('select[name = shinumber]').val("名称有误").css("color","red");
			}else{
				$('select[name = shinumber]').val(cc.data[0]['number']);
			}
		},'json')
	});
	$('select[name = scnumber]').bind("change" ,function(){
		var scnumber = $('select[name = scnumber]').serialize();
		$.get('__URL__/ajhuo2',scnumber,function(cc){
			if(cc.status == 0){
				$('select[name = scuser]').val("无此学院").css("color","red");
			}else{
				$('select[name = scuser]').val(cc.data[0]['lesson_name']);
			}
		},'json')
	});
	$('select[name = scuser]').bind("change" ,function(){
		var scuser = $('select[name = scuser]').serialize();
		$.get('__URL__/ajhuo3',scuser,function(cc){
			if(cc.status == 0){
				$('select[name = scnumber]').val("名称有误").css("color","red");
			}else{
				$('select[name = scnumber]').val(cc.data[0]['lesson_number']);
			}
		},'json')
	});
	$('input[name = select]').bind("click" , function(){
		$('input[name = typ]').val("1");
	})
	$('input[name = huizong]').bind("click" , function(){
		$('input[name = typ]').val("2");
	})
});
function year()  
{ 
	var t=document.getElementByName("date").value;
	alert(t); 
    if (t=="0000") 
	  {	    	 
              alert("请输入查询年份！"); 
			  return false;
            } 
}
</script>
</head>
<body>
<div class="mrightTop">
	<form method="get" enctype="multipart/form-data" action="__URL__/teacherWorkload">
	教师工号：<select type = "text" name="shinumber">
   				 <?php foreach($selectShi as $key => $val ): ?> 
   					<option> <?php echo $val['number']; ?></option>
                  <?php endforeach; ?>
   		   </select>
       教师姓名：<select type = "text" name="shiuser">
		 		<?php foreach($selectShi as $key => $val ): ?> 
				<option> <?php echo $val['name']; ?></option>
	            <?php endforeach; ?>
   		  </select>&nbsp;
     查询年份：<input type="text" name="date" maxlength="4" class="topinput" value="0000"/>   
        课程编号：<select type = "text" name="scnumber">
                 <?php foreach($selectXue as $key => $val ): ?> 
                 <option> <?php echo $val['lesson_number']; ?></option>
                 <?php endforeach; ?>
         </select>&nbsp;
        课程名称：<select type = "text" name="scuser">
                 <?php foreach($selectXue as $key => $val ): ?> 
                    <option> <?php echo $val['lesson_name']; ?></option>
                <?php endforeach; ?>
         </select>&nbsp;
		<input type="hidden" name="typ" value="1" />  
		<input type="submit" name = "select" value="计算" class="formbtn searchbtn" style="margin-top:2px;" />（实验课工作量）&nbsp;            
        <input type="submit" name = "huizong" value="汇总" class="formbtn searchbtn" style="margin-top:2px;"/>（教师工作量）
	</form>
</div>
<?php if($typ){ ?>
	<?php if($typ == 1){ ?>
	<div class = "tdare">
		<table width="100%" cellspacing="0" class="dataTable">
	    	<caption class="tatr0">
	             <span style="color:#F00"><?php echo $year; ?></span>年<span style="color:#F00"><?php echo $lab; ?></span>实验课工作量是<span style="color:#F00"> <?php echo $lesson_workload;?> </span>                 
	        </caption>
			<tr class="tatr1">
				<th width="10%" class="firstCell">序列</th>
				<th width="25%">课程编号</th>
				<th width="25%">课程名称</th>
			 	<th width="15%">教师</th>  
				<th width="20%">本课程工作量</th>
			</tr>	
	            <?php $i=1; foreach($kecheng as $key => $val ){ ?> 
	                <tr class="tatr2 tatr3">
	                    <td style="border-right:1px solid #CCC;"><?php echo $i; ?></td>
	                    <td style="border-right:1px solid #CCC;"><?php echo $val['lesson_number']; ?></td>
	                    <td style="border-right:1px solid #CCC;"><?php echo $val['lesson_name']; ?></td>
	                    <td style="border-right:1px solid #CCC;"><?php echo $val['teacher_name']; ?></td>
	                    <td style="border-right:1px solid #CCC;"><?php echo $lesson_workload;?></td>
	                </tr>
	            <?php $i++; } ?>	      
		</table>
		<div class="pageLinks">		
		</div>
		</div>
		<?php }else{ ?>  
		<div class = "tdare">
		<table width="100%" cellspacing="0" class="dataTable">
	    	<caption class="tatr0">                           	
	              <span style="color:#F00"><?php echo $year; ?></span>年<span style="color:#F00"><?php echo $academy; ?></span>老师的实验课工作量是<span style="color:#F00"> <?php echo $workload;?> </span>      
	        </caption>
			<tr class="tatr1">
				<th width="10%" class="firstCell">序列</th>
				<th width="25%">教师编号</th>
				<th width="25%">教师姓名</th>
			 	<th width="25%">实验课名称</th>  
				<th width="10%">本课程工作量</th>
			</tr>	
	            <?php $i=1;$n=0; foreach($query as $key => $val ){ ?> 
	                <tr class="tatr2 tatr3">
	                    <td style="border-right:1px solid #CCC;"><?php echo $i; ?></td>
	                    <td style="border-right:1px solid #CCC;"><?php echo $val['teacher_number']; ?></td>
	                    <td style="border-right:1px solid #CCC;"><?php echo $val['teacher_name']; ?></td>
	                    <td style="border-right:1px solid #CCC;"><?php echo $val['lesson_name']; ?></td>
	                    <td style="border-right:1px solid #CCC;"><?php echo $teacher_workload[$n];?></td>
	                </tr>
	            <?php $i++; $n++;} ?>	      
		</table>
		<div class="pageLinks">		
		</div>
		</div>
		<?php } ?>
	<?php }else{ ?>  	
	<div class = "tdare">
		<table width="100%" cellspacing="0" class="dataTable">
	    	<caption class="tatr0">
	             <span style="color:#F00"> ** </span>实验课工作量是<span style="color:#F00"> ** </span>                 
	        </caption>			     
		</table>
		<div class="pageLinks">		
		</div>
		</div>
	<?php } ?>  
</body>
</html>