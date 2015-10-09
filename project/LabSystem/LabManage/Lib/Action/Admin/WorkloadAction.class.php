<?php
/**
 *注释格式
 */
class WorkloadAction extends Action
{
	public function conn(){
		$table['user'] = M('user');
		$table['lesson_info'] = M('lesson_info');
		$selectShi = $table['user'] -> select();
		$selectXue = $table['lesson_info'] -> select();
		$this -> assign('selectXue' , $selectXue);
		$this -> assign('selectShi' , $selectShi);
	}                                                                        
    //所有表里面对应ajax查询
	public function ajhuo(){
		$table = M('user');
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['shinumber']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo1(){
		$table = M('user');
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['shiuser']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo2(){
		$table = M('lesson_info');
		$huoqu = array_merge($_GET ,$_POST);
		$zui['lesson_number'] = trim($huoqu['scnumber']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo3(){
		$table = M('lesson_info');
		$huoqu = array_merge($_GET ,$_POST);
		$zui['lesson_name'] = trim($huoqu['scuser']);
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
	public function teacherWorkload()
	{
		$lesson_cheching = M('lesson_cheching');
		$lesson_project = M('lesson_project');
		$lesson_allocation = M('lesson_allocation');
		$data = $this ->get();
		$where['year(date)'] = $data['date'];		
		$where1['year(date)'] = $data['date'];
		if($data['typ'] == 1){		
			$tiaojian['year(cheching_date)'] = $data['date'];
			$tiaojian['class_number'] = $data['scnumber'];
			$where1['lesson_number'] = $data['scnumber'];
			$query=$lesson_cheching->where($tiaojian)->field('attendence,absence')->find(); 
			$num1=$query['attendence'];
			$num2=$query['absence'];
			$num=$num1+$num2;
			//var_dump($num);return;
			if($num<140){
				$xs=$num/70;
				$xishu=round($xs ,2);  
				//var_dump($xishu);return;
			}else{
				$xishu=2;
			}
			$query=$lesson_project->where($where)->field('period')->select();
			$i=0;
			$keshi=0;
			foreach($query as $key=>$val){				
					$keshi = $val['period'] + $keshi;								
			}
			$lesson_workload=$xishu*$keshi*0.8;
			$kecheng=$lesson_allocation->where($where1)->select();
			//var_dump($lesson_workload);return;						
			$this ->assign('lesson_workload' , $lesson_workload);
			$this ->assign('kecheng' , $kecheng);
			$this ->assign('lab' , $data['scuser']);
			$this ->assign('typ' , $data['typ']);
		}
		if($data['typ'] == 2){
			$tiaojian['year(date)'] = $data['date'];
			$where['teacher_number'] = $data['shinumber'];
			$info['academy_number'] = $data['shinumber'];
			$query=$lesson_allocation->where($where)->select();
			//var_dump($query);return;
			$n=0;
			$workload=0;
			foreach($query as $key=>$val){
			    $tiaojian1['class_number'] = $val['lesson_number'];
			    $tiaojian1['year(cheching_date)'] = $data['date'];
			    //var_dump($tiaojian['class_number']);return;
				$que=$lesson_cheching->where($tiaojian1)->field('attendence,absence')->find();
				$num1=$que['attendence'];
				$num2=$que['absence'];
				$num=$num1+$num2;
				//var_dump($num);return;
				if($num<140){
					$xs=$num/70;
					$xishu=round($xs ,2);
					//var_dump($xishu);return;
				}else{
					$xishu=2;
				}
				$qq=$lesson_project->where($tiaojian)->field('period')->select();
				$i=0;
				$keshi=0;
				foreach($qq as $key=>$val){
					$keshi = $val['period'] + $keshi;
				}
				$teacher_workload[$n]=$xishu*$keshi*0.8;
				$workload=$workload+$teacher_workload[$n];
				$n++;
			}
			//var_dump($teacher_workload);return;			
			$this ->assign('workload' , $workload);
			$this ->assign('teacher_workload' , $teacher_workload);
			$this ->assign('query' , $query);
			$this ->assign('academy' , $data['shiuser']);
			$this ->assign('typ' , $data['typ']);
		}
		$this ->assign('year' , $data['date']);
		$this->conn();
		$this -> display();
	}

}