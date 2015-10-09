<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/Public/Js/assess.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Css/admin/assess.css" />
<title>实验室容量</title>
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
	$('select[name = scnumber]').bind("change" ,function(){
		var scnumber = $('select[name = scnumber]').serialize();
		$.get('__URL__/ajhuo2',scnumber,function(cc){
			if(cc.status == 0){
				$('select[name = scuser]').val("无此学院").css("color","red");
			}else{
				$('select[name = scuser]').val(cc.data[0]['name']);
			}
		},'json')
	});
	$('select[name = scuser]').bind("change" ,function(){
		var scuser = $('select[name = scuser]').serialize();
		$.get('__URL__/ajhuo3',scuser,function(cc){
			if(cc.status == 0){
				$('select[name = scnumber]').val("名称有误").css("color","red");
			}else{
				$('select[name = scnumber]').val(cc.data[0]['number']);
			}
		},'json')
	});
	$('input[name = select]').bind("click" , function(){
		$('input[name = typ]').val("1");
	})
	$('input[name = huizong]').bind("click" , function(){
		$('input[name = typ]').val("2");
	})
});
</script>
</head>
<body>
<div class="mrightTop">
	<form method="get" enctype="multipart/form-data" action="__URL__/index">
		实验室编号：<select type = "text" name="shinumber">
        				 <?php foreach($selectShi as $key => $val ): ?> 
        					<option> <?php echo $val['number']; ?></option>
                        <?php endforeach; ?>
        		  </select>
        实验室名称：<select type = "text" name="shiuser">
        			    <?php foreach($selectShi as $key => $val ): ?> 
        					<option> <?php echo $val['name']; ?></option>
                        <?php endforeach; ?>
        		  </select>&nbsp;
        实验室年份：<input type="text" name="date" maxlength="4" class="topinput" value="0000"/>&nbsp;
        <span style="color:blue;">学院</span>编号：<select type = "text" name="scnumber">
                                                         <?php foreach($selectXue as $key => $val ): ?> 
                                                            <option> <?php echo $val['number']; ?></option>
                                                        <?php endforeach; ?>
                                                 </select>&nbsp;
        <span style="color:blue;">学院</span>名称：<select type = "text" name="scuser">
                                                         <?php foreach($selectXue as $key => $val ): ?> 
                                                            <option> <?php echo $val['name']; ?></option>
                                                        <?php endforeach; ?>
                                                 </select>&nbsp;
		<input type="hidden" name="typ" value="1" />
        <input type="submit" name = "select" value="查询" class="formbtn searchbtn" style="margin-top:2px;"/>&nbsp;
        <input type="submit" name = "huizong" value="汇总" class="formbtn searchbtn" style="margin-top:2px;"/>
	</form>
</div>
<div class = "tdare">
	<table width="100%" cellspacing="0" class="dataTable">
    	<caption class="tatr0">
        		<?php if($rong['typ'] == 1){ ?>
                    <?php if($rong['year'] != null) { ?>
                        <span style="color:#F00"><?php echo $rong['year']; ?></span>年
                    <?php } ?>
                    <?php if($rong['shiuser'] != null) { ?>
                        <span style="color:#F00"><?php echo $rong['shiuser']; ?></span>
                    <?php }else{ ?>实验室 <?php } ?>
                    的总容量是<span style="color:#F00"> <?php echo $rong['zong'];?> </span>
                 <?php }else{ ?>
                 	<span style="color:#F00"><?php echo $rong['scuser']; ?></span>实验室的总容量是<span style="color:#F00"> <?php echo $rong['zong'];?> </span>
                 <?php } ?>
        </caption>
		<tr class="tatr1">
			<th width="10%" class="firstCell">序列</th>
			<th width="25%">实验室编号</th>
			<th width="25%">实验室名称</th>
			<th width="25%">年份</th>
			<th width="10%">实验室容量</th>
		</tr>	
        <?php $a = 0;$q = 1;if($select):?>
            <?php foreach($select as $key => $val ): ?> 
                <tr class="tatr2 tatr3">
                    <td style="border-right:1px solid #CCC;"><?php echo $q; ?></td>
                    <td style="border-right:1px solid #CCC;"><?php echo $val['number']; ?></td>
                    <td style="border-right:1px solid #CCC;"><?php echo $val['name']; ?></td>
                    <td style="border-right:1px solid #CCC;"><?php echo substr($val['year'] ,0 ,4); ?></td>
                    <td style="border-right:1px solid #CCC;"><?php echo $rong[$a];?></td>
                </tr>
            <?php $a = $a + 1 ; $q = $q + 1; endforeach; ?>
        <?php else: ?>
        	<div style="color:red;line-height:250px;font-size:52px;text-align:center;width:100%;height:250px;color:#ccc;font-height:600;position:absolute;">
            	暂无信息
            </div>
        <?php endif; ?>
	</table>
	<div class="pageLinks">
	</div>
	</div>
</body>
</html>