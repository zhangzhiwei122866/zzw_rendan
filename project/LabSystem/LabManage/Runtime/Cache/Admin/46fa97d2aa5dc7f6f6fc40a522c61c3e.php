<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/admin.css" />
<script type="text/javascript" src="/Public/Js/jquery.js"></script><script type="text/javascript" src="/Public/Js/index.js"></script><script type="text/javascript" src="/Public/Js/lessoncheck.js"></script>  
<script type="text/javascript" src="/Public/Js/calendar.js"></script>
<title>后台管理</title>
<style type="text/css">
.center{height:auto;width:75%;margin-left:15%;margin-top:30px;margin-bottom:5px;}
input{height:52px;width:99%;border:0px}
.sele{height:52px;width:99%;border:0px;text-align:center;padding-top:18px;}
</style>
<script>
$(document).ready(function() {
	  $('select[name = lab_name]').bind("change" ,function(){
			var shinumber = $('select[name = lab_name]').serialize();
			//alert(shinumber);
			$.get('__URL__/ajhuo15',shinumber,function(cc){
				//alert(shinumber);
				if(cc.status == 0){
					//alert(cc.data[0]['name']);
					$('select[name = lab_number]').val("没有这个编号").css("color","red");
				}else{
					$('select[name = lab_number]').first().val(cc.data[0]['number']).css("color","black");
				}
			},'json')
			
		});
	});
	$(document).ready(function() {
		  $('select[name = lab_number]').bind("change" ,function(){
				var shinumber1 = $('select[name = lab_number]').serialize();
				//alert(shinumber1);
				$.get('__URL__/ajhuo16',shinumber1,function(cc1){
					if(cc1.status == 0){
						$('select[name = lab_name]').val("没有这个编号").css("color","red");
					}else{
						$('select[name = lab_name]').first().val(cc1.data[0]['name']).css("color","black");
					}
				},'json')
				
			});
		});
</script>
</head>
<body>
	<div id="rightTop">
    <p>实验课添加</p>
    <ul class="subnav">
    	<li><a href="__URL__/index">返回</a></li>   	
    </ul>
</div>
<div class="center">
	<form name="registerf" method="post" enctype="multipart/form-data" action="__URL__/insert">
		<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#c1dff3">
		  <tr>
		    <td width="25%" height="52" align="center" valign="middle">实验室编号</td>
		    <td width="25%" align="center">
		    	<select name="lab_number" class="sele">
		    		<?php if(is_array($lab_list)): $i = 0; $__LIST__ = $lab_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lis): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($lis["number"]); ?>"><?php echo ($lis["number"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		    	</select>
		    	
		    </td>
		    <td width="25%" align="center" valign="middle">实验室名称</td>
		    <td width="25%" align="center">
		    	<select name="lab_name" class="sele">
		    		<?php if(is_array($lab_list)): $i = 0; $__LIST__ = $lab_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lis): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($lis["name"]); ?>"><?php echo ($lis["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		    	</select>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td height="52" align="center" valign="middle">课程编号</td>
		    <td align="center">
		    	<input name="lesson_number" type="text" />
		    </td>
		    <td align="center" valign="middle">实验课名称</td>
		    <td align="center">
		    	<input name="lesson_name" type="text" />
		    </td>
		  </tr>
		  <tr>
		    <td height="52" align="center" valign="middle">实验课任课教师姓名</td>
		    <td align="center">
		    	<input name="teacher_name" type="text" />
		    </td>
		    <td align="center" valign="middle">任课教师工号</td>
		    <td align="center">
		    	<input name="teacher_number" type="text" />
		    </td>
		  </tr>
		  <tr>
		  	<td height="52" align="center" valign="middle">
		    	分配时间
		    </td>
		    <td height="52" colspan="5" align="center" valign="middle">
		    	<input name="time" type="text" class="time inputsaveunderline timelength" onclick="SelectDate(this, 'yyyy-MM-dd')" value="0000-00-00" style="text-align:center;"/>
		    </td>
		  </tr>
		  <tr>
		    <td height="52" colspan="6" align="center" valign="middle">
		    <input type="submit" value="提交" name="Submit" disabled="disabled" style="float:left;width:30%;margin-left:16%;cursor:pointer;background-color:white;"/>
		    <input type="reset" value="重置"  style="float:right;width:30%;margin-right:16%;cursor:pointer;background-color:white;"/>
		    </td>
		  </tr>
		</table>
	</form>
</div>

</body>
</html>