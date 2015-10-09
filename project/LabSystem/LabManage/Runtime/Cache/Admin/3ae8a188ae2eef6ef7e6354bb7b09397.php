<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Lab_Project/LabSystem/Public/Css/admin/equipment.css" />
<title>仪器管理</title>			
</head>
<script type="text/javascript" >
function doaction(){
	if(confirm("确定要删除吗？")){
		alert('删除成功！');
			return true;
		}
	else{
		return false;
	}
}
</script>
<body>
	<div id="rightTop">
    <p>实验室仪器基本信息</p>
    <ul class="subnav">
    	<li><a href="/Admin/Equipment/addequipment">添加仪器</a></li>
    </ul>
	</div>
	
	<div>
		<table width="100%" cellspacing="0">
			<tr class="tatr1">
				<th width="4%">序号</th>
				<th width="6%">设备编号</th>
				<th width="10%">设备名称</th>
				<th width="7%">设备类型</th>
				<th width="10%">实验室名称</th>
				<th width="6%">实验室编号</th>
				<th width="6%">学院编号</th>
				<th width="6%">价值</th>
				<th width="5%">状态</th>
				<th width="8%">购买日期</th>
				<th width="12%">存储地</th>
				<th width="5%">领用人</th>
				<th width="5%">管理人</th>
				<th width="8%">操作</th>
			</tr>
			<?php $i=1; foreach($list1 as $key => $val ){ ?>			
				<tr class="tatr2"  style="text-align:center;">
					<td><?php echo $i; ?></td>
					<td><?php echo $val['number']; ?></td>
					<td><?php echo $val['name']; ?></td>
					<td><?php echo $val['type_name']; ?></td>
					<td><?php echo $val['lab_name']; ?></td>
					<td><?php echo $val['lab_number']; ?></td>
					<td><?php echo $val['academy_number']; ?></td>
					<td><?php echo $val['value']; ?></td>
					<td><?php echo $val['status']; ?></td>
					<td><?php echo $val['buy_time']; ?></td>
					<td><?php echo $val['location']; ?></td>
					<td><?php echo $val['use_people']; ?></td>
					<td><?php echo $val['manage_people']; ?></td>	
					<td><a href="__URL__/editequipment?id=<?php echo $val['id']; ?>">编辑</a>|<a onclick="return doaction()" href="__URL__/deleteequipment?id=<?php echo $val['id']; ?>">删除</a></td>
				</tr>			
			<?php $i++; } ?>
		</table>
	</div>
	<div style="float:right;"><?php echo ($page); ?></div>
</body>
</html>