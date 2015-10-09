<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>研究人员添加</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin/researcher.css" />
<script type="text/javascript" src="__PUBLIC__/Js/calendar.js"></script>
<script type="text/javascript" src="/PUBLIC/Js/researcher.js"></script>
<script type="text/javascript">
var i=2;
function addProRow(){ 
	var tb = document.getElementById("js1");
	var tr = document.createElement("tr");
	var td ="<td style='background:#f0f6fb;border-top:none'></td><td>"+i+"</td><td colspan='2'><textarea name=pro"+i+"[]></textarea></td><td><textarea name=pro"+i+"[]></textarea></td><td colspan='2'><input  size='4' name=pro"+i+"[] class='time' onclick='SelectDate(this, &quot;yyyy-MM-dd&quot;)'/> - <input size='4'  name=pro"+i+"[] class='time' onclick='SelectDate(this, &quot;yyyy-MM-dd&quot;)'  /></td><td><input size='4' name=pro"+i+"[] /></td><td><input size='4' name=pro"+i+"[] /></td>";
	document.getElementById('pro_num').value = i; 
	tb.appendChild(tr).innerHTML = td;	i++;
		
	}
var j=2;
function addClaRow(){ 
	var tb = document.getElementById("js2");
	var tr = document.createElement("tr");
	var td ="<td class='h35' colspan='2'><input size='20' name='new"+j+"[]' /></td><td><input size='4' name='new"+j+"[]'/></td><td><input size='4' name='new"+j+"[]'/></td><td ><input size='4' name='new"+j+"[]'/></td><td><input size='3' name='new"+j+"[]'/>人</td>";
	document.getElementById('cla_num').value = j; 	
	tb.appendChild(tr).innerHTML = td;	j++;
	}
</script>
<style type="text/css">
input{border-bottom:1px solid #E4EFF7;}
.time{ width:90px;height:20px;}
table {
	margin:auto;
}
td {
	font-size:10pt;
	color: #333;
}
.button {
	width:101px;
	height:41px;
	color:#fff;
	font-weight:bold;
	line-height:30px;
	font-size:16px;
	background:url(__PUBLIC__/images/botton.png);
	border:none;
	margin:5px auto;
	cursor:pointer;
}
.button_1:hover input {
	background:url(__PUBLIC__/images/botton_2.png);
}
</style>
</head>
<body>
<form action="insert"  method="post" onsubmit="return confirm()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" background="__PUBLIC__/images/tab_05.gif" style="border:0;">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:0;">
	      <tr style="border:0;">
	        <td width="12" height="30" style="border:0;"><img src="__PUBLIC__/images/tab_03.gif" width="12" height="30" /></td>
	        <td style="text-align:left;border:0"><font>研究人员添加</font></td>
	        <td style="text-align:right;border:0"><a onClick="javascript:history.back()" style="cursor:pointer;">点击返回</a></td>
	        <td width="16" style="border:0;"><img src="__PUBLIC__/images/tab_07.gif" width="16" height="30" /></td>
	      </tr>
	    </table>
    </td>
  </tr>
</table>
<div class="main">
<table  width="95%" cellspacing="0" cellpadding="0" style="margin-bottom:0px;">
  <tr>
    <td class="h60 w5 td2" rowspan="2">姓名 </td>
    <td class="w15" rowspan="2"><input name="name" size="6" class="time" id="user"/></td>
    <td class="w15 td2">性别</td>
    <td class="w10"><input size="4" name="sex" value="<?php echo $list[0]['sex'];?>"/></td>
    <td class="w15 td2" rowspan="2">专业技术职务及定职时间</td>
    <td class="w10" rowspan="2"><input size="4" name="position" class="time" value="<?php echo $list[0]['position'];?>"    /> - <input size="4" name="set_time" class="time" onclick="SelectDate(this, 'yyyy-MM-dd')" value="<?php echo $list[0]['set_time'];?>"   /></td>
    <td class="w10 td2">博导/研导</td>
    <td class="w11 td2" rowspan="2">备注</td>
    <td rowspan="2"><input size="4" name="note" value="<?php echo $list[0]['note'];?>"/></td>
  </tr>
  <tr>
    <td class="td2">出生年月</td>
    <td><input size="4" name="birthday"  value="<?php echo $list[0]['birthday'];?>"></td>
    <td><input size="4" name="job" value="<?php echo $list[0]['job'];?>"/></td>
  </tr>
  <tr>
    <td class="h50 td2" colspan="2">毕业时间、学校、专业、获最高学位或最后学历</td>
    <td colspan="7"><textarea name="graduate_record"><?php echo $list[0]['graduate_record'];?></textarea></td>
  </tr>
  <tr>
    <td class="h50 td2" colspan="2">工作单位（至院、系、所）</td>
    <td colspan="7"><input size="30" name="work_section" style="text-align:left;" value="<?php echo $list[0]['work_section'];?>" /></td>
  </tr>
  <tr>
    <td class="h50 td2" colspan="2">主要研究方向</td>
    <td colspan="7"><!--<input size="30" name="branch_name" style="text-align:left;" /> -->
    <select name="option" id="op" class="querySelect" style="width:100%;margin-bottom:-8px;text-align:left;" >
				<option value="">未选择</option>
				<?php if(is_array($branch_name)): $i = 0; $__LIST__ = $branch_name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option  value="<?php echo ($vo["branch_id"]); ?>"><?php echo ($vo["branch_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><input type="hidden" name="des" value="<?php echo ($vo["des_id"]); ?>" />
	 	   </select>
    </td>
  </tr>
  <tr>
    <td class="h50 td2" colspan="2">国内外学术兼职情况</td>
    <td colspan="7"><textarea name="part_time"><?php echo $list[0]['part_time'];?></textarea></td>
  </tr>
  <tr>
    <td class="h50 td2" colspan="2">主要学术荣誉称号</td>
    <td colspan="7"><textarea name="academic_name"><?php echo $list[0]['academic_name'];?></textarea></td>
  </tr>
</table>
<table id="js1" width="95%" cellspacing="0" cellpadding="0" style="margin-bottom:0px; margin-top:-1px;">
  <tr>
    <td id="cos" class="td2 w10" rowspan="20">目前承担的主要科研项目</td>
    <td class="td2" width=4%>序号</td>
    <td class="td2" colspan="2">项目名称</td>
    <td class="td2">项目来源</td>
    <td colspan="2" class="td2">起止时间</td>
    <td class="td2">科研经费</td>
    <td class="td2">本人承担任务</td>
  </tr>
  <tr>
    <td>1<input id="pro_num" type="hidden" name="pro_num" value=1 /></td>
    <td colspan="2"><textarea name="pro1[]"></textarea></td>
    <td><textarea name="pro1[]"></textarea></td>
    <td colspan="2">
    	<input  size="4" name="pro1[]" class="time" onclick="SelectDate(this, 'yyyy-MM-dd')" value="<?php echo $project['start_time'];?>"   /> - 
		<input size="4"  name="pro1[]" class="time" onclick="SelectDate(this, 'yyyy-MM-dd')" value="<?php echo $project['end_time'];?>"   />
	</td>
    <td><input size="4" name="pro1[]" /></td>
    <td><input size="4" name="pro1[]" /></td>
  </tr>
</table>
  <table  width="95%"  cellspacing="0" cellpadding="0" style="margin-bottom:0px; margin-top:-1px;">
	<tr>
		<td style="width:41%;border:none"></td>
		<td class="h35" style="border:none">
			<a class="button_1" style="text-decoration:none;"><input type="button"  style="background-color:#cococo;size:13px;" onclick="addProRow()" class="button"  value="新添加一行"/></a>
		</td>
		<td style="width:41%;border-left:none"></td>
	</tr>	
  </table>
<!-- <div id="button-js1"><input type="button" value="新增一行" onclick="addProRow()" /></div> -->
<table width="95%" cellspacing="0" cellpadding="0" style="margin-top:-1px">
  <tr>
    <td class="td2 w10" style="height:100px;"  rowspan="2">近三年培养研究生情况</td>
    <td class=" w10 h50">已毕业人数</td>
    <td class="td2 w10" rowspan="2">博士生</td>
    <td class="w10"><input size="4" name="graduated_doctor" value="<?php echo $list[0]['graduated_doctor'];?>"/></td>
    <td class="w10 td2" rowspan="2">硕士生</td>
    <td class="w10"><input size="4" name="graduated_master" value="<?php echo $list[0]['graduated_master'];?>"/></td>
  </tr>
  <tr>
    <td class=" h50" >在校人数</td>
    <td><input size="4" name="school_doctor"/></td>
    <td><input size="4" name="school_master"/></td>
  </tr>
  </table>
  <table id="js2" width="95%" cellspacing="0" cellpadding="0" style="margin-top:-1px">
  <tr>
    <td class="h50 td2" colspan="2">主讲课程或讲座名称</td>
    <td class="td2 w5" >时间</td>
    <td class="td2">学时</td>
    <td class="td2" >授课或讲座主要对象</td>
    <td class="td2">参与人数</td>
  </tr>
  <tr>
    <td class="h35" colspan="2"><input size="20" name="new1[]" /><input id="cla_num" type="hidden" name="cla_num" value=1 /></td>
    <td><input size="4" name="new1[]"/></td>
    <td><input size="4" name="new1[]"/></td>
    <td ><input size="4" name="new1[]"/></td>
    <td><input size="3" name="new1[]"/>人</td>
  </tr>
</table>
<table  width="95%"  cellspacing="0" cellpadding="0" style="margin-bottom:0px; margin-top:-1px;">
	<tr>
		<td style="width:41%;border:none"></td>
		<td class="h35" style="border:none">
			<a class="button_1" style="text-decoration:none;"><input type="button"  style="background-color:#cococo;size:13px;" onclick="addClaRow()" class="button"  value="新添加一行"/></a>
		</td>
		<td style="width:41%;border-left:none"></td>
	</tr>	
  </table>
<!-- <div id="button-js2"><input type="button" value="新增一行" onclick="addClaRow()" /></div> -->
  <table  width="95%" cellspacing="0" cellpadding="0" style="margin-top:-1px">
	  <tr>
		<td class="td1" colspan="2" rowspan="4">经费使用</td>
		<td class="h35" colspan="2">最近三年</td>
		<td class="h35" class="td2" colspan="4">计划经费使用情况</td>
		<td class="h35" class="td2" colspan="4">实际经费使用情况</td>
	  </tr>
	  <tr>
		<td class="h35" colspan="2"><input size="6" name="time1"  class="time" onclick="SelectDate(this, 'yyyy-MM-dd')"   /></td>
		<td class="h35" colspan="4"><input size="20" name="plan_use1" /></td>
		<td class="h35" colspan="4"><input size="20" name="reality_use1" /></td>
	  </tr>
	  <tr>
		<td class="h35" colspan="2"><input size="6" name="time2"  class="time" onclick="SelectDate(this, 'yyyy-MM-dd')"   /></td>
		<td class="h35" colspan="4"><input size="20" name="plan_use2" /></td>
		<td class="h35" colspan="4"><input size="20" name="reality_use2" /></td>
	  </tr>
	  <tr>
		<td class="h35" colspan="2"><input size="6" name="time3" class="time" onclick="SelectDate(this, 'yyyy-MM-dd')"   /></td>
		<td class="h35" colspan="4"><input size="20" name="plan_use3" /></td>
		<td class="h35" colspan="4"><input size="20" name="reality_use3" /></td>
	  </tr>
	  <tr>
		<td style="height:28px;" colspan="12" style="text-align:left;">注：①②③④⑤⑥各栏目中，如果“是”，请填写“1”，如果“否”，请填写“0”；⑤中含工程研究中心，文献中心</td>
	  </tr>
  </table>
</div>
<p align="center">
<a class="button_1" style="text-decoration:none;"><input type="submit" name="submit" value="提交" class="button"/></a>
<a class="button_1" style="text-decoration:none;"><input type="reset" value="重置" style="margin-left:10px;" name="Submit2" class="button" /></a>
<a onClick="javascript:history.back()" class="button_1" style="text-decoration:none;"><input type="button"  style="margin-left:10px;" value="返回" class="button"/></a>
</p>
</form>
<div style="height:40px;"></div>
</body>
</html>