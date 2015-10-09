<?php
/**
 *实验室安全模块
 *注释格式
 */
class LabSafeAction extends Action
{
	public function conn()
	{
		$table['lab_allocation'] = M('lab_allocation');
		$selectShi = $table['lab_allocation'] -> order('CONVERT(lab_name USING gbk)') -> select();
		$this -> assign('selectShi' , $selectShi);
	}
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
	public function ajfan($table , $zui){
		$result = $table -> where($zui) ->select();
		if(empty($result)){
			$this->ajaxReturn('','',0);
		}else{
			$this->ajaxReturn($result,'',1);
			}
	}
	public function index()
	{
		$lab_info = M('lab_info');
		$labList=$lab_info->select();
		$this -> conn();
		$lab_safe = M('lab_safe');
		import('ORG.Util.Page');
		$huoqu = array_merge($_GET ,$_POST);
		$biao = $huoqu['biao'];
		$where['lab_number'] = trim($huoqu['shinumber']);
		$where['lab_name'] = trim($huoqu['shiuser']);
		if($biao == 1){
			$count = $lab_safe  -> where($where) -> count();
			$Page = new Page($count,10);
			$show = $Page-> show();
			$selectCon = $lab_safe -> where($where) -> limit($Page->firstRow.','.$Page->listRows) -> order('id desc') ->select();		
		}else{
			$count = $lab_safe -> count();
			$Page = new Page($count,10);
			$show = $Page-> show();
			$selectCon = $lab_safe -> limit($Page->firstRow.','.$Page->listRows)->order('id desc') ->select();
		}
		$this-> assign('page',$show);
		$this -> assign('labList' , $labList);
		$this -> assign('selectCon' , $selectCon);
		$this -> display();	
	}
	public function add()
    {
    	$lab_info = M('lab_info');
    	$labList=$lab_info->select();
		$this -> conn();
		$lab_safe = M('lab_safe');
		$huoqu = array_merge($_GET ,$_POST);
		$biao = $_POST['biao'];
		if($biao == 1){
			$date['lab_number'] = trim($huoqu['shinumber']);
			$date['lab_name'] = trim($huoqu['shiuser']);
			$date['equipment_lost'] = trim($huoqu['equipment_lost']);
			$date['equipment_button'] = trim($huoqu['equipment_button']);
			$date['power_button'] = trim($huoqu['power_button']);
			$date['light_button'] = trim($huoqu['light_button']);
			$date['windows'] = trim($huoqu['windows']);
			$date['door'] = trim($huoqu['door']);
			$date['heating'] = trim($huoqu['heating']);
			$date['check_date'] = trim($huoqu['start_date']);
			$date['remark'] = trim($huoqu['remark']);
			$add = $lab_safe -> add($date);
			if($add){
				echo "<script> alert('数据添加成功');</script>";
				$this -> redirect('/LabSafe/index');					
			}else{
				echo "<script> alert('数据添加失败');</script>";
				$this -> redirect('/LabSafe/add');
			}
		}
		$this -> assign('labList' , $labList);
		$this -> display();
    }
	public function Xiugai()
	{
		$lab_info = M('lab_info');
		$labList=$lab_info->select();
		$this -> conn();
		$lab_safe = M('lab_safe');
		import('ORG.Util.Page');
		$huoqu = array_merge($_GET ,$_POST);
		$biao = $huoqu['biao'];
		$where['lab_number'] = trim($huoqu['shinumber']);
		$where['lab_name'] = trim($huoqu['shiuser']);
		if($biao == 1){
			$count = $lab_safe  -> where($where) -> count();
			$Page = new Page($count,15);
			$show = $Page-> show();
			$selectCon = $lab_safe -> where($where) -> select();	
		}else{
			$count = $lab_safe -> count();
			$Page = new Page($count,15);
			$show = $Page-> show();
			$selectCon = $lab_safe -> limit($Page->firstRow.','.$Page->listRows) -> select();
		}
		$this-> assign('page',$show);
		$this -> assign('selectCon' , $selectCon);
		$this -> assign('labList' , $labList);
		$this -> display();	
	}
	public function updaSelect(){
		$lab_safe = M('lab_safe');
		$huoqu = array_merge($_GET ,$_POST);
		$cha['id'] = $huoqu['id'];
		$selectOne = $lab_safe -> where($cha)-> select();
		$this -> assign('selectOne' , $selectOne);
		$this -> display();
	}
	public function See(){
		$lab_safe = M('lab_safe');
		$huoqu = array_merge($_GET ,$_POST);
		$cha['id'] = $huoqu['id'];
		$selectOne = $lab_safe -> where($cha)-> select();
		$this -> assign('selectOne' , $selectOne);
		$this -> display();
	}
	public function update(){
		$lab_safe = M('lab_safe');
		$huoqu = array_merge($_GET ,$_POST);
		$date['lab_number'] = $huoqu['lab_number'];
		$date['lab_name'] = $huoqu['lab_name'];
		$date['equipment_lost'] =$huoqu['equipment_lost'];
		$date['equipment_button'] = $huoqu['equipment_button'];
		$date['power_button'] = $huoqu['power_button'];
		$date['light_button'] = $huoqu['light_button'];
		$date['windows'] = $huoqu['windows'];
		$date['door'] = $huoqu['door'];
		$date['heating'] = $huoqu['heating'];
		$date['check_date'] = $huoqu['start_date'];
		$date['remark'] = $huoqu['remark'];
		$id = $huoqu['id'];
		$whereU['id'] = $huoqu['id'];
		$upda = $lab_safe -> where($whereU) -> save($date);
		if($upda){
			echo "<script> alert('数据修改成功');</script>";
			$this -> redirect('/LabSafe/Xiugai');	
		}else{
			echo "<script> alert('数据修改失败');</script>";
			$this -> redirect('/LabSafe/updaSelect', array('id' => $id) ,0,'');
		}	
	}
	public function deleate(){
		$lab_safe = M('lab_safe');
		$huoqu = array_merge($_GET ,$_POST);
		$whereD['id'] = $huoqu['id'];
		$del = $lab_safe -> where($whereD) -> delete();
		$this -> redirect('/LabSafe/Xiugai');	
	}

}