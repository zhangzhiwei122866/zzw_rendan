<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/Public/Js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/admin.css" />
<title>实验室列表</title>
<style>
.tatr2 td{border-right:1px solid #CCC;height:40px;overflow-x:hidden;line-height:40px;}
</style>
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
})
function cutStr(len){
    var obj=document.getElementById('table1').getElementsByTagName('td');
	for (i=0;i<obj.length;i++){
		if(obj[i].innerHTML.length > 10){
			obj[i].innerHTML=obj[i].innerHTML.substring(0,len)+'…';
		}
	}
} 
</script>
</head>
<body onload="cutStr(10)">
	<div id="rightTop">
    <p>实验室安全信息列表</p>
    <ul class="subnav">   	
        <li><a href="__URL__/Xiugai">信息修改</a></li>
    </ul>
</div>
<div class="mrightTop">
	<form method="get" enctype="multipart/form-data" action="__URL__/index">
		实验室编号：<select class="topinput" type="text" name="shinumber">
        				 <?php foreach($labList as $key => $val ): ?> 
        					<option> <?php echo $val['number']; ?></option>
                        <?php endforeach; ?>
        		  </select>
        实验室名称：<select class="topinput" type = "text" name="shiuser">
        			    <?php foreach($labList as $key => $val ): ?> 
        					<option> <?php echo $val['name']; ?></option>
                        <?php endforeach; ?>
        		  </select>&nbsp;
         <input type="hidden" name="biao" value="1"/>
		<input type="submit" value="查询" class="formbtn searchbtn" />
	</form>
</div>
<div class = "tdare">
	<table id="table1" width="100%" cellspacing="0" class="dataTable">
		<tr class="tatr1">
			<th width="5%" class="firstCell">序列</th>
			<th width="5%">实验室编号</th>
			<th width="12%">实验室名称</th>
            <th width="7">设备丢失</th>
			<th width="7%">稳电压开关</th>
            <th width="7%">仪器设备开关</th>
            <th width="7%">照明开关</th>
            <th width="7%">窗户开关</th>
            <th width="7%">大门门锁</th>
            <th width="7%">暖气漏水</th>
            <th width="7%">检查日期</th>
			<th width="15%">备注</th>
		</tr>	
        <?php $a = 1; if($selectCon): ?>
            <?php foreach( $selectCon as $key => $val ): ?>	
                <tr class="tatr2" style="text-align:center;">
                    <td><?php echo $a; ?></td>
                    <th style="background: none repeat scroll 0 0 #F0F7FF;border: 1px solid #CCC;border-top:0px;line-height:40px;">
                    	<a href="__URL__/See/id/<?php echo $val['id'] ; ?>"><?php echo $val['lab_number']; ?></a>
                    </th>
                    <td><?php echo $val['lab_name']; ?></td>
                    <td><?php echo $val['equipment_lost']; ?></td>
                    <td><?php echo $val['power_button']; ?></td>
                    <td><?php echo $val['equipment_button']; ?></td>
                    <td><?php echo $val['light_button']; ?></td>
                    <td><?php echo $val['windows']; ?></td>
                    <td><?php echo $val['door']; ?></td>
                    <td><?php echo $val['heating']; ?></td>
                    <td><?php echo $val['check_date']; ?></td>
                    <td><?php echo $val['remark']; ?></td>
                </tr>
            <?php $a = $a + 1; endforeach; ?>
        <?php else: ?>
        	<div style="color:red;line-height:250px;font-size:52px;text-align:center;width:100%;height:250px;color:#ccc;font-height:600;position:absolute;">
            	您查询的信息暂时为空！
            </div>
        <?php endif; ?>
	</table>
	<div class="pageLinks">
    <?php echo ($page); ?>
	</div>
	</div>
</body>
</html>