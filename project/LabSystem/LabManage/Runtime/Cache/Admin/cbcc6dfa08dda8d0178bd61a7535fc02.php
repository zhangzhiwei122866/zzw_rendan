<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/admin.css" />
<script type="text/javascript" src="/Public/Js/jquery.js"></script>
<title>实验室一览</title>
<script type="text/javascript">
$(document).ready(function() {
  $('select[name = option_number]').bind("change" ,function(){
		var shinumber = $('select[name = option_number]').serialize();
		$.get('__URL__/ajhuo',shinumber,function(cc){
			if(cc.status == 0){
				$('select[name = option_name]').val("没有这个编号").css("color","red");
			}else{
				$('select[name = option_name]').first().val(cc.data[0]['name']).css("color","black");
			}
		},'json')
		
	});
});
$(document).ready(function() {
	  $('select[name = option_name]').bind("change" ,function(){
			var shinumber1 = $('select[name = option_name]').serialize();
			$.get('__URL__/ajhuo1',shinumber1,function(cc1){
				if(cc1.status == 0){
					$('select[name = option_number]').val("没有这个编号").css("color","red");
				}else{
					$('select[name = option_number]').first().val(cc1.data[0]['number']).css("color","black");
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
    <p>实验室管理</p>
    <ul class="subnav">
    	<li><a href="__URL__/labList">实验室列表</a></li>
    	<li><a href="__URL__/add">添加实验室</a></li>
    </ul>
</div>
<div class="mrightTop">
	<form method="get" enctype="multipart/form-data" action="__URL__/query">
		实验室编号：
		<select name="option_number" class="querySelect">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option  value="<?php echo ($vo["number"]); ?>"><?php echo ($vo["number"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	 	</select>
	 	实验室名称：
		<select name="option_name" class="querySelect">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voli): ++$i;$mod = ($i % 2 )?><option><?php echo ($voli["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	 	</select>
		<input type="submit" value="查询" class="formbtn searchbtn" />
	</form>
</div>
<div class = "tdare">
	<table width="100%" cellspacing="0" class="dataTable">
		<tr class="tatr1">
			<th width="10%"  class="firstCell" >序号</th>
			<th width="10%">实验室编号</th>
			<th width="20%">实验室名称</th>
			<th width="20%">所属学科</th>
			<th width="20%">所在位置</th>
			<th width="10%">建立年份</th>
			<th width="20%">基本操作</th>
		</tr>	
		
		 <?php $a = 0;if($list1):?>
            <?php $i=1; foreach($list1 as $key => $vol ): ?> 
		<tr class="tatr2" style="text-align:center;">
			<td><?php echo $i; ?></td>
			<td><?php echo $vol['number'];?></td>
			<td><a href="__URL__/info?lab_id=<?php echo $vol['id'];?>"><?php echo $vol['name'];?></a></td>
			<td><?php echo $vol['subject'];?></td>
			<td><?php echo $vol['place'];?></td>
			<td><?php echo $vol['year'];?></td>
			<td><a href="__URL__/redact?lab_id=<?php echo $vol['id'];?>">编辑</a> | <a  onclick="return doaction()" href="__URL__/delete?lab_id=<?php echo $vol['id'];?>">删除</a></td>
		</tr>
		<?php $a = $a + 1 ; $i++; endforeach; ?>
		 <?php endif; ?>
	</table>
	<div class="pageLinks">
	<?php echo ($page); ?>
	</div>
	</div>
<script type="text/javascript" src="/Public/Js/jquery.js"></script><script type="text/javascript" src="/Public/Js/index.js"></script>
</body>
</html>