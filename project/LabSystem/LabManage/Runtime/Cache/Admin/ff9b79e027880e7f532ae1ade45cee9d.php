<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/admin.css" />
<title>后台管理</title>
</head>
<body>
<div id="head">
    <div id="logo"><a href="#nogo"><img src="__PUBLIC__/Images/admin/logo.gif" alt="实验室管理系统" /></a></div>
    <div id="menu">
    <span>您好&nbsp;<strong><?php echo ($_SESSION['name']); ?></strong>  <a href="__GROUP__/Public/logout">[退出]</a>&nbsp;&nbsp;<a href="/Default/Index/index" target="_blank">[网站首页]</a></span>
         <a href="#" class="menu_btn1" id="iframe_refresh">刷新</a>
        <a href="__URL__/delcache" class="menu_btn2" id="clear_cache">更新缓存</a>
        <a href="#" id="back_btn"><img src="__PUBLIC__/Images/admin/tiring_room_nav.gif" alt="后台导航" /></a> 
    </div>
    <ul id="nav">
    	<li><a id="control" href="#nogo" class="link actived">控制台</a></li>
        <li><a id="lab" href="#nogo" class="link">实验室一览</a></li>
        <li><a id="teach" href="#nogo" class="link">教学管理</a></li>
        <li><a id="instrument" href="#nogo" class="link">仪器管理</a></li>
        <li><a id="safe" href="#nogo" class="link">安全管理</a></li>
        <li><a id="assess" href="#nogo" class="link">评估管理</a></li>
        <li><a id="workload" href="#nogo" class="link">工作量管理</a></li>
    </ul>
    <div class="back_nav">
        <div class="back_nav_list">   
            <dl>
                <dt>设置</dt>            
                <dd><a href="#nogo">网站设置</a></dd>                
            </dl>
            <dl>
                <dt>设置</dt>    
                <dd><a href="#nogo">网站设置</a></dd>                
            </dl>
        </div>
        <div class="close_float"><img src="__PUBLIC__/Images/icon/close2.gif" alt="关闭" /></div>
    </div>
    <div id="headBg"></div>
</div>
<div id="content">
    <div id="left">
		<div id="leftMenus">
		    <dl class="submenu" id="control_0">
		   	    <dt><span class="ico1">控制台</span></dt>
		    <?php if($_SESSION['role'] == 11){ ?>				
				<dd><a href="__GROUP__/Index/main" target="workspace">欢迎页面</a></dd>
				<dt><span class="ico2">用户管理</span></dt>
				<dd><a href="__GROUP__/Control/userList" target="workspace">用户列表</a></dd>				
				<dt><span class="ico2">数据库管理</span></dt>
				<dd><a href="__GROUP__/Control/index" target="workspace">数据库备份</a></dd>
				<dd><a href="__GROUP__/Control/show" target="workspace">数据库还原</a></dd>				
				
			<?php }else{ ?>					
				<dd><a href="__GROUP__/Index/main" target="workspace">欢迎页面</a></dd>
			<?php } ?>
			</dl>
			<dl class="submenu" id="lab_0">
			    <dt><span class="ico1">实验室一览</span></dt>
			<?php if($_SESSION['role'] == 4 || $_SESSION['role'] == 5 || $_SESSION['role'] == 11){ ?>				
				<dd><a href="__GROUP__/LabList/labList"  target="workspace">实验室基本信息</a></dd>
				<dd><a href="__GROUP__/LabList/lab_manager"  target="workspace">实验室管理员个人信息</a></dd>
				<dd><a href="__GROUP__/LabList/lab_allocation"  target="workspace">实验室分配信息</a></dd>
			<?php }else{ ?>					
				<dd><a href="__GROUP__/Index/main" target="workspace">无操作权限</a></dd>
			<?php } ?>					
			</dl>
			<dl class="submenu" id="teach_0">
				<dt><span class="ico1">教学管理</span></dt>
			<?php if($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['role'] == 6 || $_SESSION['role'] == 9 || $_SESSION['role'] == 11){ ?>	
				<dd><a href="__GROUP__/Teach/index" target="workspace">课程分配信息</a></dd>
				<dd><a href="__GROUP__/Teach/project" target="workspace">实验课项目</a></dd>
				<dd><a href="__GROUP__/Teach/allocation" target="workspace">实验课出勤情况</a></dd>		
			<?php }else{ ?>					
				<dd><a href="__GROUP__/Index/main" target="workspace">无操作权限</a></dd>
			<?php } ?>	
			</dl>			
			<dl class="submenu" id="instrument_0">
				<dt><span class="ico1">仪器管理</span></dt>
			<?php if($_SESSION['role'] == 4 || $_SESSION['role'] == 5 || $_SESSION['role'] == 7 || $_SESSION['role'] == 11){ ?>		
				<dd><a href="__GROUP__/Equipment/index" target="workspace">实验仪器基本信息</a></dd>
				<dd><a href="__GROUP__/Equipment/repair" target="workspace">实验仪器维修记录</a></dd>
				<dd><a href="__GROUP__/Equipment/borrow" target="workspace">实验仪器借用记录</a></dd>
				<dd><a href="__GROUP__/Equipment/break_info" target="workspace">实验仪器报损记录</a></dd>
			<?php }else{ ?>					
				<dd><a href="__GROUP__/Index/main" target="workspace">无操作权限</a></dd>
			<?php } ?>	
			</dl>
			<dl class="submenu" id="safe_0">
				<dt><span class="ico1">安全管理</span></dt>	
			<?php if($_SESSION['role'] == 4 || $_SESSION['role'] == 7 || $_SESSION['role'] == 11){ ?>	
				<dd><a href="__GROUP__/LabSafe/index" target="workspace">实验室安全信息</a></dd>
                <dd><a href="__GROUP__/LabSafe/add" target="workspace">实验室安全添加</a></dd>
            <?php }else{ ?>					
				<dd><a href="__GROUP__/Index/main" target="workspace">无操作权限</a></dd>
			<?php } ?>	    
			</dl>
			<dl class="submenu" id="assess_0">
				<dt><span class="ico1">评估管理</span></dt>
			<?php if($_SESSION['role'] == 4 || $_SESSION['role'] == 7 || $_SESSION['role'] == 11){ ?>		
				<dd><a href="__GROUP__/Assess/index"   target="workspace">实验室容量</a></dd>
				<dd><a href="__GROUP__/Assess/liyong"  target="workspace">实验室利用率</a></dd>
				<dd><a href="__GROUP__/Assess/zaiyiqi" target="workspace">在用仪器台件数</a></dd>
				<dd><a href="__GROUP__/Assess/wanhao" target="workspace">设备的完好率</a></dd>
				<dd><a href="__GROUP__/Assess/xiangmukaichu" target="workspace">实验项目开出数</a></dd>
				<dd><a href="__GROUP__/Assess/xiangmukaichuzongshu" target="workspace">实验项目开出总数</a></dd>
				<dd><a href="__GROUP__/Assess/xiangmukaichulv" target="workspace">实验项目开出率</a></dd>
				<dd><a href="__GROUP__/Assess/newEquipmentValue" target="workspace">新加入设备价值</a></dd>
				<dd><a href="__GROUP__/Assess/allEquipmentValue" target="workspace">设备总价值</a></dd>
				<dd><a href="__GROUP__/Assess/equipmentUpdate" target="workspace">设备更新率</a></dd>
				<dd><a href="__GROUP__/Assess/njingfei" target="workspace">年运行经费</a></dd>
			<?php }else{ ?>					
				<dd><a href="__GROUP__/Index/main" target="workspace">无操作权限</a></dd>
			<?php } ?>		
			</dl>
			<dl class="submenu" id="workload_0">
				<dt><span class="ico1">工作量管理</span></dt>
			<?php if($_SESSION['role'] == 4 || $_SESSION['role'] == 6 || $_SESSION['role'] == 11){ ?>			
				<dd><a href="__GROUP__/Workload/teacherWorkload" target="workspace">实验课任课教师工作量</a></dd>
				<dd><a href="__GROUP__/Workload/managerWorkload" target="workspace">实验管理员工作量</a></dd>	
			<?php }else{ ?>					
				<dd><a href="__GROUP__/Index/main" target="workspace">无操作权限</a></dd>
			<?php } ?>				
			</dl>
		</div>
    </div>
    <div id="right">
        <iframe frameborder="0" border="0" id="workspace" style="display:none;" name="workspace" src="__URL__/main"></iframe>
    </div>
    <div class="clear"></div>
</div>
<script type="text/javascript" src="/Public/Js/jquery.js"></script><script type="text/javascript" src="/Public/Js/index.js"></script>
</body>
</html>