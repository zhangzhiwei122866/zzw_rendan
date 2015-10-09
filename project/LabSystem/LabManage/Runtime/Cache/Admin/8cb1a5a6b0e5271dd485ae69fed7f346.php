<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Lab_Project/LabSystem/Public/Css/admin/admin.css" />
<script type="text/javascript" src="/Lab_Project/LabSystem/Public/Js/jquery.js"></script>
<title>实验室一览</title>
<script type="text/javascript">
$(document).ready(function() {
	$(document).ready(function() {
		  $('select[name = manager_number]').bind("change" ,function(){
				var shinumber = $('select[name = manager_number]').serialize();
				$.get('__URL__/ajhuo2',shinumber,function(cc1){
					if(cc1.status == 0){
						//$('select[name = option_name]').val("没有这个编号").css("color","red");
					}else{
						$('select[name = manager_name]').first().val(cc1.data[0]['name']).css("color","black");
						
					}
				},'json')
				
			});
		});
	$(document).ready(function() {
		  $('select[name = manager_name]').bind("change" ,function(){
				var shinumber = $('select[name = manager_name]').serialize();
				$.get('__URL__/ajhuo3',shinumber,function(cc2){
					if(cc2.status == 0){
						$('select[name = option_name]').val("没有这个编号").css("color","red");
					}else{
						$('select[name = manager_number]').first().val(cc2.data[0]['number']).css("color","black");
						
					}
				},'json')
				
			});
		});
	
  $('select[name = lab_number]').bind("change" ,function(){
		var shinumber = $('select[name = lab_number]').serialize();
		$.get('__URL__/ajhuo4',shinumber,function(cc3){
			if(cc3.status == 0){
				$('select[name = option_name]').val("没有这个编号").css("color","red");
			}else{
				$('select[name = lab_name]').first().val(cc3.data[0]['lab_name']).css("color","black");
				
			}
		},'json')
		
	});
});
$(document).ready(function() {
	  $('select[name = lab_name]').bind("change" ,function(){
			var shinumber1 = $('select[name = lab_name]').serialize();
			$.get('__URL__/ajhuo5',shinumber1,function(cc4){
				if(cc4.status == 0){
					$('select[name = option_number]').val("没有这个编号").css("color","red");
				}else{
					$('select[name = lab_number]').first().val(cc4.data[0]['lab_number']).css("color","black");
					
				}
			},'json')
			
		});
	});

function doaction(){
if(confirm("确定要删除吗？"))
{
alert('删除成功！');
return true;
}else
{
return false;
}
}
</script>
</head>
<body>
	<div id="rightTop">
    <p>实验室管理员个人信息管理</p>
    <ul class="subnav">
    	<li><a href="__URL__/lab_manager">管理员列表</a></li>
    	<li><a href="__URL__/manager_add">添加管理员</a></li>
    </ul>
</div>
<div class="mrightTop">
	<form method="get" enctype="multipart/form-data" action="__URL__/manager_query">
		管理员工号：
		<select name="manager_number" class="querySelect">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option  value="<?php echo ($vo["number"]); ?>"><?php echo ($vo["number"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	 	</select>
	 	管理员姓名：
		<select name="manager_name" class="querySelect">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option  value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	 	</select>
		实验室编号：
		<select name="lab_number" class="querySelect">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option  value="<?php echo ($vo["lab_number"]); ?>"><?php echo ($vo["lab_number"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	 	</select>
	 	实验室名称：
		<select name="lab_name" class="querySelect">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voli): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($voli["lab_name"]); ?>"><?php echo ($voli["lab_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	 	</select>
		<input type="submit" value="查询" class="formbtn searchbtn" />
	</form>
</div>
<div class = "tdare">
	<table width="100%" cellspacing="0" class="dataTable">
		<tr class="tatr1">
			<th width="8%"  class="firstCell" >序号</th>
			<th width="8%">管理员工号</th>
			<th width="8%">管理员姓名</th>
			<th width="8%">实验室编号</th>
			<th width="10%">实验室名称</th>
			<th width="8%">性别</th>
			<th width="8%">出生年月</th>
			<th width="8%">所属学科</th>
			<th width="8%">文化程度</th>
			<th width="8%">国内培训</th>
			<th width="8%">国外培训</th>
			<th width="10%">基本操作</th>
		</tr>	
		
		 <?php $a = 0;if($list1):?>
            <?php $i=1; foreach($list1 as $key => $vol ): ?> 
		<tr class="tatr2" style="text-align:center;">
			<td><?php echo $i; ?></td>
			<td><?php echo $vol['number'];?></td>
			<td><?php echo $vol['name'];?></td>
			<td><?php echo $vol['lab_number'];?></td>
			<td><?php echo $vol['lab_name'];?></td>
			<td><?php echo $vol['sex'];?></td>
			<td><?php echo $vol['birthday'];?></td>
			<td><?php echo $vol['subject'];?></td>
			<td><?php echo $vol['education'];?></td>
			<td><?php echo $vol['inland_train'];?></td>
			<td><?php echo $vol['foreign_train'];?></td>
			<td><a href="__URL__/manager_redact?lab_id=<?php echo $vol['id'];?>">编辑</a> | <a  onclick="return doaction()" href="__URL__/manager_delete?lab_id=<?php echo $vol['id'];?>">删除</a></td>
		</tr>
		<?php $a = $a + 1 ;$i++; endforeach; ?>
		 <?php endif; ?>
	</table>
	<div class="pageLinks">
	<?php echo ($page); ?>
	</div>
	</div>
<script type="text/javascript" src="/Lab_Project/LabSystem/Public/Js/jquery.js"></script><script type="text/javascript" src="/Lab_Project/LabSystem/Public/Js/index.js"></script>
</body>
</html>