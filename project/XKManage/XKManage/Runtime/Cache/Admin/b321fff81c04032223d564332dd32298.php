<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>公告列表</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	color:#777;
	font-size: 12px
}
img{border:none;}
a{text-decoration:none}
a{text-decoration:none}
.head{color:#4f7396;font-size: 14px;font-weight:bold;}
.STYLE1 {font-size: 13px;color:#333;}
.STYLE4 {font-size: 12px;}

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
<body style="background: url(/public/images/bg_left.gif) repeat-x; text-align:center;">
<div style="width:100%;height:45px;margin-top:5px;border：15px;background:url(__PUBLIC__/images/researcherList_header.jpg) repeat-x;">
	<div style="width:200px;font-size:20px;font-weight:bold;color:#497bbb;">
		<img src="__PUBLIC__/images/researcherList_header1.jpg" style="margin-right:10px;margin-top:20px;"/>公告列表
	</div>
</div>
<table style="margin:0 auto;" width="100%" border="0" cellpadding="0" cellspacing="1"id="senfe" >  
<!-- --------- 标头 ------------ -->
			<tr>
				<td width="3%" height="40"><div align="center"><span class="head">序号</span></div></td>
				<td width="11%" height="40"><div align="center"><span class="head">公告名称</span></div></td>
				<td width="4%" height="40"><div align="center"><span class="head">公告时间</span></div></td>
				<td width="9%" height="40"><div align="center"><span class="head">单位</span></div></td>
				<td width="8%" height="40"><div align="center"><span class="head">基本操作</span></div></td>	    	 
			</tr>	
<!-- ------- 数据来输出 ----------- -->
   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><tr>
       <td height="40"><div align="center" class="STYLE1"> <div align="center"><?php echo ($key+1); ?></div></div></td>
       <td height="40"><div align="center"><span class="STYLE1"><a href="__URL__/notice?notice_id=<?php echo ($vo["notice_id"]); ?>"><?php echo ($vo["notice_name"]); ?></a></span></div></td>
       <td height="40"><div align="center"><span class="STYLE1"><?php echo ($vo["notice_time"]); ?> </span></div></td>
       <td height="40"><div align="center"><span class="STYLE1"><?php echo ($vo["notice_company"]); ?></span></div></td>
       <td height="40"><?php if($_SESSION['power'] == 2 | $_SESSION['power'] == 3){ ?><div align="center"><span class="STYLE4">
      		 <a href="__URL__/add?notice_id=<?php echo ($vo["notice_id"]); ?>"> <img src="__PUBLIC__/images/edt.gif"  width="16"  border="0"  height="16" />编辑&nbsp; &nbsp;</a>
         <a href="__URL__/delete?notice_id=<?php echo ($vo["notice_id"]); ?>" onclick="return confirm('确定将此记录删除?')"><img src="__PUBLIC__/images/del.gif" width="16" border="0"  height="16" />删除</a></span></div>
         <?php } else { ?>
         	<center>无</center>
          <?php } ?>
       </td>
     </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
  <div>
		<table width="95%" height="20px;" style="width:95%;heigh:20px;margin-bottom:20px; margin-top:20px;" border="0" cellspacing="0" cellpadding="0">
			<tr>
				
			    <td align="right"  style="color:#336699;">共<?php echo "$page";?></td>
				
			</tr>
    	</table> 
    </div> 
<script language="javascript">
	//changeTable("表格名称","奇数行背景","偶数行背景","鼠标经过背景","点击后背景");
	changeTable("senfe","#fff","#f1f4f8","#cfc","#7ab9f0");
</script>    
</body>

</html>