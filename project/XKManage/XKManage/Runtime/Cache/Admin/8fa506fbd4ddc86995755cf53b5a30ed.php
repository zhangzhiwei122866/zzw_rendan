<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>研究方向管理</title>
<style type="text/css">
*{padding:0;margin:0;}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	color:#777;
	font-size: 12px
}
td{border-right:1px solid #E1EBF3;border-bottom:1px solid #E1EBF3;}
img{border:none;}
a{text-decoration:none}
a{text-decoration:none}
.head{color:#4f7396;font-size: 14px;font-weight:bold;}
.STYLE1 {font-size: 13px;color:#333;}
.STYLE4 {font-size: 12px;}
.subnav li{margin:0 10px;}
.subnav li,.subnav li a{float:left;display:inline;line-height:20px;color:#fff;text-decoration:none;background:url(__PUBLIC__/images/admin/btn_1.png) no-repeat;}
.subnav li a{background:url(__PUBLIC__/images/admin/btn_2.png) no-repeat right 0;padding:0 12px;}
.subnav li.on,.subnav li.on a{background-image:none;}
.querySelect{font-size:12px;margin-right:10px;}
.formbtn {
    background: url("__PUBLIC__/images/admin/button2.gif") repeat scroll 0 0 transparent;
    border: 0 none;
    color: #234F8D;
    cursor: pointer;
    height: 21px;
    width: 60px;}
</style>
<script language="javascript">
	function changeTable(o,a,b,c,d){
		 var t=document.getElementById(o).getElementsByTagName("tr");
		 for(var i=0;i<t.length;i++){
		  t[i].style.backgroundColor=(t[i].sectionRowIndex%2==0)?a:b;
		  t[i].onclick=function(){
		   if(this.x!="1"){
		    this.x="1";//本来打算直接用背景色判断，FF获取到的背景是RGB值，不好判断
		    this.style.backgroundColor=d;
		   }else{
		    this.x="0";
		    this.style.backgroundColor=(this.sectionRowIndex%2==0)?a:b;
		   }
		  }
		  t[i].onmouseover=function(){
		   if(this.x!="1")this.style.backgroundColor=c;
		  }
		  t[i].onmouseout=function(){
		   if(this.x!="1")this.style.backgroundColor=(this.sectionRowIndex%2==0)?a:b;
		  }
		 }
		}
	
</script>

</head>
<body style="background: url(/public/images/bg_left.gif) repeat-x;">
<div style="width:100%;height:45px;margin-top:5px;border：15px;background:url(__PUBLIC__/images/researcherList_header.jpg) repeat-x;">
		<div style="width:200px;margin-left:50px;height:20px;font-size:20px;font-weight:bold;color:#497bbb;">
			<img src="__PUBLIC__/images/researcherList_header1.jpg" style="margin-right:10px;margin-top:20px;"/>研究方向列表
		</div>
</div>
<div style="background:url(__PUBLIC__/images/admin/top_bj.gif) repeat-x;height:32px;line-height:32px;">
     <form method="get" enctype="multipart/form-data" action="__URL__/add">
		<font style="margin-left:10px;">学科名称：<font/><select name="option" class="querySelect">
				<option value="">未选择</option>
			<?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><option  value="<?php echo ($vo["des_id"]); ?>"><?php echo ($vo["des_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	 	</select>
	 	研究方向：<input type="text"  name="branch_name" />
		<input type="submit" value="添加方向" class="formbtn"/>
	</form>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  id="senfe">
<!-- --------- 标头 ------------ -->
<tr>
	<td width="30%" height="40"><div align="center"><span class="head">研究方向名称</span></div></td>
	<td width="20%" height="40"><div align="center"><span class="head">隶属学科</span></div></td>	
	<td width="20%" height="40"><div align="center"><span class="head">隶属学院</span></div></td>    
	<td width="30%" height="40"><div align="center"><span class="head">基本操作</span></div></td> 	 
</tr>
<!-- ------- 数据来输出 ----------- -->
<?php if(is_array($dis_id)): $i = 0; $__LIST__ = $dis_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr>
  <td height="40"><div align="center"><span class="STYLE1"><?php echo ($vo["branch_name"]); ?> </span></div></td>
  <td height="40"><div align="center"><span class="STYLE1"><?php echo ($vo["des_name"]); ?></span></div></td>
  <td height="40"><div align="center"><span class="STYLE1"><?php echo ($vo["academy_name"]); ?></span></div></td>
  <td height="40"><?php if($_SESSION['power'] == 2 | $_SESSION['power'] == 3):?><div align="center"><span class="STYLE4">
 		 <a href="__URL__/edit?branch_id=<?php echo ($vo["branch_id"]); ?>&branch_name=<?php echo ($vo["branch_name"]); ?>"> <img src="__PUBLIC__/images/edt.gif"  width="16"  border="0"  height="16" />修改研究方向&nbsp; &nbsp;</a>
    <a href="__URL__/delete?branch_id=<?php echo ($vo["branch_id"]); ?>" onclick="return confirm('确定将此记录删除?')"><img src="__PUBLIC__/images/del.gif" width="16" border="0"  height="16" />删除</a></span></div>
    <?php endif;?>
  </td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<script language="javascript">
	//changeTable("表格名称","奇数行背景","偶数行背景","鼠标经过背景","点击后背景");
	changeTable("senfe","#fff","#f1f4f8","#cfc","#7ab9f0");
</script>   
</body>
</html>