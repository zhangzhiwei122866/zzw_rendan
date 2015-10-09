<?php
/**
 *评估管理模块
 *注释格式
 */
class AssessAction extends Action{	/**
	 *武杰	
	 */
	public function conn()
	{	
		$table['academy'] = M('academy');
		$table['lab_info'] = M('lab_info');
		$selectShi = $table['lab_info'] ->order('CONVERT(name USING gbk)') -> select();
		$selectXue = $table['academy'] -> order('CONVERT(name USING gbk)') -> select();
		$this -> assign('selectXue' , $selectXue);
		$this -> assign('selectShi' , $selectShi);
	}
	//所有表里面对应ajax查询
	public function ajhuo(){
		$table = M('lab_info');
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['shinumber']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo1(){
		$table = M('lab_info');
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['shiuser']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo2(){
		$table = M('academy');
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['scnumber']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo3(){
		$table = M('academy');
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['scuser']);
		$this ->ajfan($table , $zui);
	}
	public function ajfan($table , $zui){
		$result = $table -> where($zui) ->select();
		if(empty($result)){
			$this->ajaxReturn('','',0);
		}else{
			$this->ajaxReturn($result,'',1);
		}
	}
	
	//前台获取数据
	public function get(){
		$data['shiuser'] = trim($_GET['shiuser']);
		$data['shinumber'] = trim($_GET['shinumber']);
		$data['date'] = trim($_GET['date']);
		$data['scuser'] = trim($_GET['scuser']);
		$data['scnumber'] = trim($_GET['scnumber']);
		$data['typ'] = trim($_GET['typ']);
		return $data;
	}
	//容量所对应的Action
	public function index ()
	{
		$this -> conn();
		$table['lab_info'] = M('lab_info');
		$data = $this ->get();
		if($data['typ'] == 2){
			if($data['scnumber'] == null && $data['scuser'] == null){
				echo "当点击<span style='color:red;'>汇总</span>时学院信息是必须填写的信息"	;
			}else{
				$selectWhere['s_number'] = $data['scnumber'];
				$selectWhere['s_name'] = $data['scuser'];
				$this -> indexselectN($selectWhere,$data,$table);
			}
		}
		if($data['shinumber'] == null && $data['shiuser'] == null && $data['date'] == null){
			$selectAll = $table['lab_info'] -> select();
			$rong = $this -> jisuan($selectAll);
			$this ->assign('rong' , $rong);
			$this ->assign('select' ,$selectAll);
			$this ->display();
		}else{
			if($data['typ'] == 1){
				if($data['shinumber'] == null && $data['shiuser'] == null){
					echo "实验室编号和名称不能同时为空";
					$this -> display();
				}else{
					if($data['date'] == null){
						echo "查询年份不能为空";
						$this -> display();
					}else{
						$selectWhere['year(year)'] = $data['date'];
						$selectWhere['number'] = $data['shinumber'];
						$selectWhere['name'] = $data['shiuser'];
						$this -> indexselectN($selectWhere,$data,$table);
					}
				}
			}
		}
	}
	//有条件查询的时候多对应的返回
	public function indexselectN($selectWhere,$data,$table){
		$selectN = $table['lab_info'] ->where($selectWhere) -> select();
		$rong = $this -> jisuan($selectN);
		$rong['typ'] = $data['typ'];
		$rong['scuser'] = $data['scuser'];
		$rong['year'] = $data['date'];
		$rong['shiuser'] = $data['shiuser'];
		$this ->assign('rong' , $rong);
		$this ->assign('select' ,$selectN);
		$this ->display();
	}
	//利用率所对应的Action
	public function liyong()
	{
		$mianji = array();
		$liyong = array();
		$table['info'] = M('lab_info');
		$table['lesson_cheching'] = M('lesson_cheching');
		$table['lesson_project'] = M('lesson_project');
		$data = $this -> get();
		$this -> conn();
		if($data['typ'] == 2){
			if($data['scnumber'] == null && $data['scuser'] == null){
				echo "当点击<span style='color:red;'>汇总</span>时学院信息是必须填写的信息"	;
			}else{
				$selectWhere['s_number'] = $data['scnumber'];
				$selectWhere['s_name'] = $data['scuser'];
				$selectAll =  $table['info'] ->where($selectWhere) -> select();
				$this -> liyongcha($selectAll,$table ,$data);
			}
		}
		if($data['shinumber'] == null && $data['shiuser'] == null && $data['date'] == null){
			//查询基本信息
			$selectAll = $table['info'] -> select();
			$this -> liyongcha($selectAll,$table ,$data);
				
		}else{
			if($data['typ'] == 1){
				if($data['shinumber'] == null && $data['shiuser'] == null){
					echo "实验室编号和名称不能同时为空";
					$this -> display();
				}else{
					if($data['date'] == null){
						echo "查询年份不能为空";
						$this -> display();
					}else{
						$selectWhere['year(year)'] = $data['date'];
						$selectWhere['number'] = $data['shinumber'];
						$selectWhere['name'] = $data['shiuser'];
						$selectAll = $table['info'] ->where($selectWhere)-> select();
						$this -> liyongcha($selectAll,$table ,$data);
					}
				}
			}
		}
	}
	//查询利用率的时候进行的查询
	public function liyongcha($selectAll,$table ,$data){
		$a = 0 ;
		$renshi = 0;
		$liyong['zong'] = 0;
		foreach($selectAll as $key => $val){
			if($val['type'] == 1){
				$zhuanye =  floor($val['area']/3) * 900;
				$mianji[$a] = $zhuanye;
			}else{
				if($val['type'] == 2){
					$jichu = floor($val['area']/1.5) * 1050;
					$mianji[$a] = $jichu;
				}
			}
			$a = $a + 1;
			$whereRen['lab_name'] = $val['name'];
			$selectRen = $table['lesson_cheching'] -> where($whereRen) -> select();
			foreach($selectRen as $key => $val2){
				$renZong = $val2['attendence'] + $val2['absence'];
				$whereShi['lab_name'] = $val2['cheching_lab_name'];
				$whereShi['class_number'] = $val2['class_number'];
				$selectRen =$table['lesson_project'] -> where($whereShi) -> select();
				$keshi = 0;
				foreach($selectRen as $key => $val3){
					$keshi = $keshi + $val3['period'];
				}
				//每门实验室的总人时数
				$zongRenshi = $renZong * $keshi;
				$liyong[$renshi] =(substr($zongRenshi/$mianji[$renshi],0,6)*100).'%' ;
				$liyong['zong'] = $liyong['zong'] +  $liyong[$renshi];
				$renshi = $renshi + 1;
			}
		}
		$liyong['shiuser'] = $data['shiuser'];
		$liyong['typ'] = $data['typ'];
		$liyong['scuser'] = $data['scuser'];
		$liyong['year'] = $data['date'];
		$liyong['zong'] = ($liyong['zong']).'%';
		$this -> assign('selectAll',$selectAll);
		$this ->assign('liyong' , $liyong);
		$this ->display();
	}
	
	//index计算所有的容量
	public function chaxunquan($info){
		$rongliang = $info -> select();
		$rong['rong'] = $this ->jisuan($rongliang);
		$rong['biao'] = 0;
		$this ->assign('rong' , $rong);
		$this ->assign('rongliang' , $rongliang);
		$this->display();
	}
	//计算容量
	public function jisuan($selectAll)
	{
		$a = 0 ;
		foreach($selectAll as $key => $val){
			if($val['type'] == 1){
				$zhuanye =  floor($val['area']/3);
				$mianji[$a] = $zhuanye;
			}else{
				if($val['type'] == 2){
					$jichu = floor($val['area']/1.5);
					$mianji[$a] = $jichu;
				}
			}
			$a= $a+1;
		}
		$mianji['zong'] = $zhuanye + $jichu;
		return $mianji;
	}
	//表示查询正在使用的仪器
	public function zaiyiqi()
	{
		$table['equipment_info'] = M('equipment_info');
		$data = $this -> get();
		$this -> conn();
		$whereYiqi['status'] = "在用";
		if($data['typ'] == 2){
			if($data['scnumber'] == null && $data['scuser'] == null){
				echo "当点击<span style='color:red;'>汇总</span>时学院信息是必须填写的信息"	;
				$this -> display();
			}else{
				$whereYiqi['academy_number'] = $data['scnumber'];
				$this -> zaiyiCha($table,$whereYiqi ,$data);
			}
		}
		if($data['shinumber'] == null && $data['shiuser'] == null){
			$this -> zaiyiCha($table,$whereYiqi ,$data);
		}else{
			if($data['typ'] == 1){
				if($data['shinumber'] == null && $data['shiuser'] == null){
					echo "实验室编号和名称不能同时为空";
					$this -> display();
				}else{
					$whereYiqi['lab_number'] = $data['shinumber'];
					$whereYiqi['lab_name'] = $data['shiuser'];
					$this -> zaiyiCha($table,$whereYiqi ,$data);
				}
			}
		}
	}
	
	public function zaiyiCha($table,$whereYiqi ,$data){
		$selectYiqi = $table['equipment_info'] ->where($whereYiqi) -> select();
		$biao = 0;
		foreach($selectYiqi as $key => $val){
			$whereYiqi['lab_name'] = $val['lab_name'];
			$selectCon[$biao] = $table['equipment_info'] ->where($whereYiqi) -> count();
			$selectCon['zong'] = $selectCon[$biao] + $selectCon['zong'];
			$biao = $biao + 1;
		}
		$selectCon['shiuser'] = $data['shiuser'];
		$selectCon['typ'] = $data['typ'];
		$selectCon['scuser'] = $data['scuser'];
		$selectCon['year'] = $data['date'];
		$this -> assign('zaiyiqi' , $selectYiqi);
		$this -> assign('selectCon', $selectCon);
		$this -> display();
	}
	public function wanhao(){
		$table['equipment_break_info'] = M('equipment_break_info');
		$table['equipment_info'] = M('equipment_info');
		$data = $this -> get();
		$this -> conn();
		if($data['typ'] == 2){
			if($data['scnumber'] == null && $data['scuser'] == null){
				echo "当点击<span style='color:red;'>汇总</span>时学院信息是必须填写的信息"	;
				$this -> display();
			}else{
				$whereXue['academy_number'] = $data['scnumber'];
				$selectXue = $table['equipment_info'] ->where($whereXue) -> select();
				$this -> wanhaoselect($selectXue,$table,$data);
			}
		}
		if($data['shinumber'] == null && $data['shiuser'] == null && $data['date'] == null){
			$selectXue = $table['equipment_info'] -> select();
			$this -> wanhaoselect($selectXue,$table,$data);
		}else{
			if($data['typ'] == 1){
				if($data['shinumber'] == null && $data['shiuser'] == null){
					echo "实验室编号和名称不能同时为空";
					$this -> display();
				}else{
					$wherewanhao = array(
							"lab_name" => $data['shiuser'],
					);
					$selectwanhao = $table['equipment_info'] -> where($wherewanhao) -> select();
					$zongcon = 0;
					$huai = 0;
					foreach($selectwanhao as $key => $val){
						if(substr($val['buy_time'],0,4) <= $data['date']){
							$zongcon = $zongcon + 1;
							$wherebreak['equipment_number'] = $val['number'];
							$selectBreak = $table['equipment_break_info'] -> where($wherebreak) -> select();
							if($selectBreak){
								$huai = $huai + 1;
							}
						}
					}
					$wanhaolv = ((1 - substr($huai/$zongcon,0,6))*100).'%' ;
					$wan['lv'] = $wanhaolv;
					$wan['typ'] = $data['typ'];
					$wan['lab_name'] = $data['shiuser'];
					$wan['year'] = $data['date'];
					$this -> assign('wan',$wan);
					$this -> assign('selectwanhao',$selectwanhao);
					$this -> display();
				}
			}
		}
	}
	public function wanhaoselect($selectXue,$table,$data){
		$biao1 = 0;
		foreach($selectXue as $key => $val){
			$selectXueBian['lab_number'] = $val['lab_number'];
			$countXue[$biao1] = $table['equipment_info'] -> where($selectXueBian) -> count();
			$selectXue1 = $table['equipment_info'] -> where($selectXueBian) -> select();
			$huaiCon = 0;
			foreach($selectXue1 as $key => $val1){
				$whereShebei['equipment_number'] = $val1['number'];
				$selectShebei = $table['equipment_break_info'] -> where($whereShebei) ->select();
				if($selectShebei){
					$huaiCon = $huaiCon + 1;
				}
				$huaiConz[$biao1] = $huaiCon;
			}
				
			$wanhaoCon[$biao1] = ((1 - substr($huaiConz[$biao1]/$countXue[$biao1] , 0 , 6))*100).'%';
			$biao1 = $biao1 + 1;
		}
		$wan['typ'] = 3;
		$wan['lab_name'] = $data['shiuser'];
		$wan['year'] = $data['date'];
		$this -> assign('wan',$wan);
		$this -> assign('selectwanhao' , $selectXue);
		$this -> assign('wanhaoCon' , $wanhaoCon);
		$this -> display();
	}
	public function njingfei(){
		$table['equipment_info'] = M('equipment_info');
		$table['equipment_repair'] = M('equipment_repair');
		$data = $this -> get();
		$this ->conn();
		if($data['typ'] == 2){
			if($data['scnumber'] == null && $data['scuser'] == null){
				echo "当点击<span style='color:red;'>汇总</span>时学院信息是必须填写的信息"	;
				$this -> display();
			}else{
				$whereSelectXue['academy_number'] = $data['scnumber'];
				$selectCon = $table['equipment_info'] -> where($whereSelectXue) -> select();
				$this -> njingfeiSelect($selectCon,$table,$data);
			}
		}
		if($data['shinumber'] == null && $data['shiuser'] == null && $data['date'] == null){
			$selectCon = $table['equipment_info'] -> select();
			$this -> njingfeiSelect($selectCon,$table,$data);
		}else{
			if($data['typ'] == 1){
				if($data['shinumber'] == null && $data['shiuser'] == null){
					echo "实验室编号和名称不能同时为空";
					$this -> display();
				}else{
					$whereSelect['lab_name'] = $data['shiuser'];$whereSelect['year(buy_time)'] = $data['date'];
					$selectShi1 = $table['equipment_info'] -> where($whereSelect) ->Sum('value');
					$whereSelect1['lab_name'] = $data['shiuser'];$whereSelect1['year(date)'] = $data['date'];
					$selectShi2 = $table['equipment_repair']-> where($whereSelect1) ->Sum('repair_cost');
					$selectShi[0] = $selectShi1 + $selectShi2;
					$selectShi['year'] = $data['date'];
					$selectShi['typ'] = $data['typ'];
					$selectShi['shiuser'] = $data['shiuser'];
					$selectCon = $table['equipment_info'] -> where($whereSelect) ->select();
					$this -> assign('selectCQuan' , $selectShi);
					$this -> assign('selectCon' , $selectCon);
					$this ->display();
				}
			}
		}
	}
	public function njingfeiSelect($selectCon,$table,$data){
		$biao = 0;
		foreach($selectCon as $key => $val){
			$whereSelect['lab_name'] = $val['lab_name'];
			$selectQuan1 = $table['equipment_info'] -> where($whereSelect) ->Sum('value');
			$selectQuan2 = $table['equipment_repair']-> where($whereSelect) ->Sum('repair_cost');
			$selectCQuan[$biao] = $selectQuan1 + $selectQuan2;
			$selectCQuan['quan'] = $selectCQuan[$biao] + $selectCQuan['quan'];
			$biao = $biao + 1;
		}
		$selectCQuan['typ'] = $data['typ'];
		$selectCQuan['scuser'] = $data['scuser'];
		$this -> assign('selectCQuan' , $selectCQuan);
		$this -> assign('selectCon' , $selectCon);
		$this -> display();
	}
	
	
/**
 *高帅星
 *
 */
	public function xiangmukaichu()
	{
		$lesson_project = M('lesson_project');
		$lesson_info = M('lesson_info');
		$data = $this ->get();	
		$where['year(date)'] = $data['date'];
		if($data['typ'] == 1){
			$where['lab_number'] = $data['shinumber'];
			$kaichushulist=$lesson_project->where($where)->select();
			$kaichushu=$lesson_project->where($where)->count();	
			$this ->assign('kaichushulist' , $kaichushulist);
			$this ->assign('kaichushu' , $kaichushu);
			$this ->assign('lab' , $data['shiuser']);
			$this ->assign('typ' , $data['typ']);
		}
		if($data['typ'] == 2){
			$where['academy'] = $data['scnumber'];
			$xykaichushulist=$lesson_project->join('lesson_info ON lesson_info.lesson_number = lesson_project.class_number')->where($where)->select();
			//print_r($xykaichushulist);return;
			$xykaichushu=$lesson_project->join('lesson_info ON lesson_info.lesson_number = lesson_project.class_number')->where($where)->count();
			$this ->assign('xykaichushulist' , $xykaichushulist);
			$this ->assign('xykaichushu' , $xykaichushu);
			$this ->assign('academy' , $data['scuser']);
			$this ->assign('typ' , $data['typ']);
		}	
		$this ->assign('year' , $data['date']);
	    $this->conn();
		$this -> display();
	}
	public function xiangmukaichuzongshu()
	{
		$lesson_project = M('lesson_project');
		$data = $this ->get();
		$where['check_date'] = $data['date'];					
		if($data['typ'] == 1){                                                                  			
			$where['number'] = $data['shinumber'];
			$kaichushulist=$lesson_project->where($where)->select();			
			$kaichushu=$lesson_project->where($where)->count();
			$this ->assign('kaichushulist' , $kaichushulist);
			$this ->assign('kaichushu' , $kaichushu);
			$this ->assign('lab' , $data['shiuser']);
			$this ->assign('typ' , $data['typ']);
		}
		if($data['typ'] == 2){
			$where['academy_number'] = $data['scnumber'];
			$xykaichushulist=$lesson_project->where($where)->select();
			$xykaichushu=$lesson_project->where($where)->count();
			$this ->assign('xykaichushulist' , $xykaichushulist);
			$this ->assign('xykaichushu' , $xykaichushu);
			$this ->assign('academy' , $data['scuser']);
			$this ->assign('typ' , $data['typ']);
		}
		$this ->assign('year' , $data['date']);
		$this->conn();
		$this -> display();
	}
	public function xiangmukaichulv()
	{
		$lesson_project = M('lesson_project');
		$data = $this ->get();
		$where['check_date'] = $data['date'];
		$where1['check_date'] = $data['date'];
		$where['year(date)'] = $data['date'];
		
		if($data['typ'] == 1){
			$where['number'] = $data['shinumber'];	
			$where1['number'] = $data['shinumber'];
			$kaichushulist=$lesson_project->where($where1)->select();
			$kaichushu=$lesson_project->where($where)->count();
			$kaichushuzongshu=$lesson_project->where($where1)->count();
			$kaichulv= $kaichushu/$kaichushuzongshu*100;
			$this ->assign('kaichulv' , $kaichulv);
			$this ->assign('kaichushulist' , $kaichushulist);			
			$this ->assign('lab' , $data['shiuser']);
			$this ->assign('typ' , $data['typ']);
		}
		if($data['typ'] == 2){
			$where['academy_number'] = $data['scnumber'];
			$where1['academy_number'] = $data['scnumber'];
			$xykaichushulist=$lesson_project->where($where1)->select();			
			$xykaichushu=$lesson_project->where($where)->count();
			$xykaichuzongshu=$lesson_project->where($where1)->count();
			$xykaichulv= $xykaichushu/$xykaichuzongshu*100;
			$this ->assign('xykaichushulist' , $xykaichushulist);
			$this ->assign('xykaichulv' , $xykaichulv);
			$this ->assign('academy' , $data['scuser']);
			$this ->assign('typ' , $data['typ']);
		}
		$this ->assign('year' , $data['date']);
		$this->conn();
		$this -> display();
	}
	public function newEquipmentValue()
	{
		$equipment_info = M('equipment_info');
		$data = $this ->get();
		$where['year(buy_time)'] = $data['date'];	
		if($data['typ'] == 1){
			$where['lab_number'] = $data['shinumber'];
			$equipment=$equipment_info->where($where)->select();
			$mon = 0;
			foreach($equipment as $key=>$val){										
				$mon = $val['value'] + $mon;			
			}
			$this ->assign('mon' , $mon);
			$this ->assign('equipment' , $equipment);
			$this ->assign('lab' , $data['shiuser']);
			$this ->assign('typ' , $data['typ']);
		}
		if($data['typ'] == 2){
			$where['academy_number'] = $data['scnumber'];
			$equipment=$equipment_info->where($where)->select();
			$mon = 0;
			foreach($equipment as $key=>$val){										
				$mon = $val['value'] + $mon;			
			}
			$this ->assign('mon' , $mon);
			$this ->assign('equipment' , $equipment);			
			$this ->assign('academy' , $data['scuser']);
			$this ->assign('typ' , $data['typ']);
		}
		$this ->assign('year' , $data['date']);
		$this->conn();
		$this -> display();
	}
	public function allEquipmentValue()
	{
		$equipment_info = M('equipment_info');
		$data = $this ->get();
		if($data['typ'] == 1){
			$where['lab_number'] = $data['shinumber'];
			$equipment=$equipment_info->where($where)->select();
			$mon = 0;
			foreach($equipment as $key=>$val){
				$mon = $val['value'] + $mon;
			}
			$this ->assign('mon' , $mon);
			$this ->assign('equipment' , $equipment);
			$this ->assign('lab' , $data['shiuser']);
			$this ->assign('typ' , $data['typ']);
		}
		if($data['typ'] == 2){
			$where['academy_number'] = $data['scnumber'];
			$equipment=$equipment_info->where($where)->select();
			$mon = 0;
			foreach($equipment as $key=>$val){
				$mon = $val['value'] + $mon;
			}
			$this ->assign('mon' , $mon);
			$this ->assign('equipment' , $equipment);
			$this ->assign('academy' , $data['scuser']);
			$this ->assign('typ' , $data['typ']);
		}
		$this ->assign('year' , $data['date']);
		$this->conn();
		$this -> display();
	}
	public function equipmentUpdate()
	{
		$equipment_info = M('equipment_info');
		$data = $this ->get();
		$where['year(buy_time)'] = $data['date'];
		if($data['typ'] == 1){
			$where['lab_number'] = $data['shinumber'];
			$info['lab_number'] = $data['shinumber'];
			$equipment=$equipment_info->where($where)->select();
			$num=$equipment_info->where($where)->count();
			$nums=$equipment_info->where($info)->count();
			$updates= $num/$nums*100;
			$this ->assign('updates' , $updates);
			$this ->assign('equipment' , $equipment);
			$this ->assign('lab' , $data['shiuser']);
			$this ->assign('typ' , $data['typ']);
		}
		if($data['typ'] == 2){
			$where['academy_number'] = $data['scnumber'];
			$info['academy_number'] = $data['scnumber'];
			$equipment=$equipment_info->where($where)->select();
			$num=$equipment_info->where($where)->count();
			$nums=$equipment_info->where($info)->count();
			$updates= $num/$nums*100;
			$this ->assign('updates' , $updates);			
			$this ->assign('equipment' , $equipment);
			$this ->assign('academy' , $data['scuser']);
			$this ->assign('typ' , $data['typ']);
		}
		$this ->assign('year' , $data['date']);
		$this->conn();
		$this -> display();
	}

	
	

}