<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/admin.css" />
<script type="text/javascript" src="/Public/Js/jquery.js"></script><script type="text/javascript" src="/Public/Js/index.js"></script><script type="text/javascript" src="/Public/Js/labcheck.js"></script>  
<script type="text/javascript" src="/Public/Js/calendar.js"></script>
<title>后台管理</title>
<style type="text/css">
.dis{disabled:disabled;}
.center{height:auto;width:75%;margin-left:15%;margin-top:5px;margin-bottom:5px;}
input{height:52px;width:99%;border:0px}
.sele{height:52px;width:99%;border:0px;text-align:center;padding-top:18px;}
</style>
<script>
$(document).ready(function() {
	  $('select[name = s_name]').bind("change" ,function(){
			var shinumber = $('select[name = s_name]').serialize();
			$.get('__URL__/ajhuo14',shinumber,function(cc){
				//alert(shinumber);
				if(cc.status == 0){
					$('select[name = lab_number]').val("没有这个编号").css("color","red");
				}else{
					$('select[name = s_number]').first().val(cc.data[0]['number']).css("color","black");
				}
			},'json')
			
		});
	});
$(document).ready(function() {
		  $('select[name = s_number]').bind("change" ,function(){
				var shinumber1 = $('select[name = s_number]').serialize();
				$.get('__URL__/ajhuo13',shinumber1,function(cc1){
					if(cc1.status == 0){
						$('select[name = s_name]').val("没有这个编号").css("color","red");
					}else{
						$('select[name = s_name]').first().val(cc1.data[0]['name']).css("color","black");
					}
				},'json')
				
			});
		});
function doaction(){
if(confirm("确定要修改吗？"))
{
alert('修改成功！');
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
<div class="center">
	<form name="registerf" method="post" enctype="multipart/form-data" action="__URL__/xiugai">
		
		<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#c1dff3">
		<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inf): ++$i;$mod = ($i % 2 )?><input type="hidden" name="lab_id"  value="<?php $id=$_GET['lab_id'];echo $id;?>"/>
		  <tr>
		    <td width="16%" height="52" align="center" valign="middle">实验室名称</td>
		    <td colspan="5" align="center" valign="middle"><input name="lab_name" type="text" value="<?php echo ($inf["name"]); ?>"/></td>
		  </tr>
		  <tr>
		    <td height="52" align="center" valign="middle">实验室编号</td>
		    <td width="21%" align="center" valign="middle"><input name="number" type="text" value="<?php echo ($inf["number"]); ?>"/></td>
		    <td width="14%" align="center" valign="middle">所属学院编号</td>
		    <td width="16%" align="center" valign="middle">
			    <select name="s_number" class="sele">
			    	<option value="<?php echo ($inf["s_number"]); ?>" style="padding-top:10px;"><?php echo ($inf["s_number"]); ?></option>
				    <?php if(is_array($academyList)): $i = 0; $__LIST__ = $academyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typ): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($typ["number"]); ?>" style="padding-top:10px;"><?php echo ($typ["number"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			    </select>
		    </td>
		    <td width="16%" align="center" valign="middle">所属学院名称</td>
		    <td width="17%" align="center" valign="middle">
		    	<select name="s_name" class="sele">
		    		<option value="<?php echo ($inf["s_name"]); ?>" style="padding-top:10px;"><?php echo ($inf["s_name"]); ?></option>
			    	<?php if(is_array($academyList)): $i = 0; $__LIST__ = $academyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typ): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($typ["name"]); ?>" style="padding-top:10px;"><?php echo ($typ["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		    	</select>
		    </td>
		  </tr>
		  <tr>
		    <td height="52" align="center" valign="middle">实验室位置</td>
		    <td colspan="5" align="center" valign="middle"><input name="place" type="text" value="<?php echo ($inf["place"]); ?>"/></td>
		  </tr>
		  <tr>
		    <td height="52" align="center" valign="middle">实验室类别</td>
		    <td align="center" valign="middle">
		    	<select name="type" class="sele">
		    		<option value="<?php echo ($inf["type"]); ?>"><?php echo ($inf["lab_type"]); ?></option>
		    		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lis): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($lis["lab_type_number"]); ?>"><?php echo ($lis["lab_type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		    	</select>
		    </td>
		    <td align="center" valign="middle">所属学科</td>
		    <td align="center" valign="middle"><input name="subject" type="text" value="<?php echo ($inf["subject"]); ?>"/></td>
		    <td align="center" valign="middle">实验室面积</td>
		    <td align="center" valign="middle">
		    	<input name="area" type="text" style="width:85%;" value="<?php echo ($inf["area"]); ?>"/><span style="line-height:60px;">m²</span>
		    </td>
		  </tr>
		  <tr>
		    <td height="52" align="center" valign="middle">岗位职责</td>
		    <td align="center" valign="middle">
		    	<input name="job_responsibility" type="text" value="<?php echo ($inf["job_responsibility"]); ?>"/>
		    </td>
		    <td align="center" valign="middle">实验教学运行经费</td>
		    <td align="center" valign="middle">
		    	<input name="teach_expenditure" type="text" style="width:85%;" value="<?php echo ($inf["teach_expenditure"]); ?>"/><span style="line-height:60px;">元</span>
		    </td>
		    <td align="center" valign="middle">年材料消耗费</td>
		    <td align="center" valign="middle">
		    	<input name="material_expenditure" type="text" style="width:85%;" value="<?php echo ($inf["material_expenditure"]); ?>"/><span style="line-height:60px;">元</span>
		    </td>
		  </tr>
		  <tr>
		    <td height="52" align="center" valign="middle">实验室成立年份</td>
		    <td colspan="2" align="center" valign="middle">
		    	<input name="year" type="text" class="time inputsaveunderline timelength" onclick="SelectDate(this, 'yyyy-MM-dd')" value="<?php echo ($inf["year"]); ?>" style="text-align:center;"/>
		    </td>
		    <td align="center" valign="middle">实验室信息录入时间</td>
		    <td colspan="2" align="center" valign="middle">
		    	<input name="enter_time" type="text" class="time inputsaveunderline timelength" onclick="SelectDate(this, 'yyyy-MM-dd')" value="<?php echo ($inf["enter_time"]); ?>" style="text-align:center;"/>
		    </td>
		  </tr>
		  <tr>
		    <td height="150" align="center" valign="middle">管理制度</td>
		    <td colspan="5" align="center" valign="middle">
		    	<textarea name="institution" style="width:732px;height:143px;border:0px;line-height:2"><?php echo ($inf["institution"]); ?></textarea>
		    </td>
		  </tr>
		  <tr>
		    <td height="52" colspan="6" align="center" valign="middle">
		    <input type="submit" value="提交" onclick="return doaction()" name="Submit" style="float:left;width:30%;margin-left:16%;cursor:pointer;background-color:white;"/>
		    <input type="reset" value="重置"  style="float:right;width:30%;margin-right:16%;cursor:pointer;background-color:white;"/>
		    </td>
		  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</form>
</div>
</body>
</html>