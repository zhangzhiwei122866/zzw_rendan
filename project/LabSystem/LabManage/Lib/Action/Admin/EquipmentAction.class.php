<?php
/**
 *仪器管理模块
 *注释格式
 */
class EquipmentAction extends Action
{
	/*****基本信息*******/
    public function index ()
    {
    	$equipment_info=M('equipment_info');
		$list = $equipment_info -> order('id asc') -> select();
       	import("ORG.Util.Page"); //导入分页类
    	$count = $equipment_info->count();    //计算总数
    	$p = new Page ( $count, 20);
    	$list1=$equipment_info->limit($p->firstRow.','.$p->listRows)->order('id desc')->select();
    	//var_dump($list1);
    	$page = $p->show ();
    	$this->assign ( "page", $page );
    	$this->assign ( "list1", $list1 );
    	$this->display();
       
    }
    
    public function insertequipment()
    {   	
        		$lab = M('equipment_info');
	        	$data['number'] = trim($_POST['number']);
	            $data['name'] = trim($_POST['name']);
	            $data['type_name'] = trim($_POST['type_name']);
	            $data['lab_name'] = trim($_POST['lab_name']);
	            $data['lab_number'] = trim($_POST['lab_number']);
	            $data['academy_number'] = trim($_POST['academy_number']);
	            $data['value'] = trim($_POST['value']);
	            $data['status'] = trim($_POST['status']);
	            $data['buy_time'] = trim($_POST['buy_time']);
	            $data['location'] = trim($_POST['location']);
	            $data['use_people'] = trim($_POST['use_people']);
	            $data['manage_people'] = trim($_POST['manage_people']);	
				if ($data['number'] !=null && $data['name'] !=null &&  $data['type_name']!=null &&  $data['lab_number']!=null &&  $data['academy_number']!=null &&  $data['lab_name']!=null &&  $data['value']!=null &&  $data['status']!=null &&  $data['buy_time']!=null  ) 
				{
	            	$result = $lab->where('number='.$data['number'])->select();
					if ($result) {
						$this->error('已经存在的设备不能重复添加');
						//$this->redirect('/Equipment/addequipment');						
					}else {
						$lab->add($data);
						$this->assign("jumpUrl","/Admin/Equipment/index");
						$this->success('添加成功');
					}
				}else{
        			$this->error('信息不完整，请重新填写!');
        		} 	
        }
        public function addequipment()
        {  
        	$this->display();
        }	
        public function editequipment(){
        	$lab = M('equipment_info');
        	$data['id']=$_GET['id'];
        	$info=$lab->where($data)->select();
        	$this->assign( "info", $info );
        	$this->display();
        }
        public function deleteequipment()
        {
        	$lab = new Model("equipment_info");
        	$data['id']=$_GET['id'];
        	$info = $lab ->where($data)->delete();
        	$this->redirect('/Equipment/index');
        }
        public  function submitequipment(){
        	$lab = M('equipment_info');
        	$dataid['id']=trim($_POST['id']);
        	$data['number'] = trim($_POST['number']);
        	$data['name'] = trim($_POST['name']);
        	$data['type_name'] = trim($_POST['type_name']);
        	$data['lab_name'] = trim($_POST['lab_name']);
        	$data['lab_number'] = trim($_POST['lab_number']);
        	$data['academy_number'] = trim($_POST['academy_number']);
        	$data['value'] = trim($_POST['value']);
        	$data['status'] = trim($_POST['status']);
        	$data['buy_time'] = trim($_POST['buy_time']);
        	$data['location'] = trim($_POST['location']);
        	$data['use_people'] = trim($_POST['use_people']);
        	$data['manage_people'] = trim($_POST['manage_people']);
        
        	$info = $lab->where($dataid)->save($data);
        	$this->redirect('index');
        }       
/**********************仪器维修*************************************/
        public function repair(){
        	$equipment_info=M('equipment_repair');
        	$list = $equipment_info -> order('id asc') -> select();
        	import("ORG.Util.Page"); //导入分页类
	    	$count = $equipment_info->count();    //计算总数
	    	
	    	$p = new Page ( $count, 5);
	    	$list1=$equipment_info->limit($p->firstRow.','.$p->listRows)->order('id desc')->select();
	    	
	    	$page = $p->show ();
	    	$this->assign ( "page", $page );
	    	$this->assign ( "list1", $list1 );
	    	$this->display();
        }
        public function insertrepair()
        {
        	$lab = M('equipment_repair');
        	$data['equipment_number'] = $_POST['equipment_number'];
        	$data['equipment_name'] = $_POST['equipment_name'];
        	$data['manage_man'] = $_POST['manage_man'];
        	$data['lab_name'] = $_POST['lab_name'];
        	$data['repair_cost'] = $_POST['repair_cost'];
        	$data['repair_man'] = $_POST['repair_man'];
        	$data['approval_man'] =$_POST['approval_man'];
        	$data['repair_department'] = $_POST['repair_department'];
        	$data['malfunction'] = $_POST['malfunction'];
        	$data['remark'] = $_POST['remark'];
        	if ($data['equipment_number'] !=null && $data['equipment_name'] !=null && $data['manage_man']!=null &&  $data['lab_name']!=null &&  $data['repair_cost']!=null &&  $data['repair_man']!=null &&  $data['approval_man']!=null &&  $data['repair_department'] !=null ) {
        		$result = $lab->where('equipment_number='.$data['equipment_number'])->select();
				if ($result) {
					$this->error('已经存在的设备不能重复添加');								
				}else {
					$lab->add($data);
					$this->assign("jumpUrl","/Admin/Equipment/repair");
					$this->success('添加成功');
				}
			}  
        	 else {
        		$this->error('信息填写不完整，请重新填写！');
        	}
        }
        public function addrepair()
        {
        	$this->display();
        }
        public function editrepair(){
        	$lab = M('equipment_repair');
        	$data['id']=$_GET['id'];
        	$info=$lab->where($data)->select();
        	$this->assign( "info", $info );
        	$this->display();
        }
        public function deleterepair()
        {
        	$lab = new Model("equipment_repair");
        	$data['id']=$_GET['id'];
        	$info = $lab ->where($data)->delete();
        	$this->redirect('/Equipment/repair');
        }
        public  function submitrepair(){
        	$lab = M('equipment_repair');
        	$dataid['id']=trim($_POST['id']);
        	$data['equipment_number'] = $_POST['equipment_number'];
        	$data['equipment_name'] = $_POST['equipment_name'];
        	$data['manage_man'] = $_POST['manage_man'];
        	$data['lab_name'] = $_POST['lab_name'];
        	$data['repair_cost'] = $_POST['repair_cost'];
        	$data['repair_man'] = $_POST['repair_man'];
        	$data['approval_man'] =$_POST['approval_man'];
        	$data['repair_department'] = $_POST['repair_department'];
        	$data['malfunction'] = $_POST['malfunction'];
        	$data['remark'] = $_POST['remark'];
        	$info = $lab->where($dataid)->save($data);
        	$this->redirect('/Equipment/repair');
        } 
/********************************仪器借用*************************************/
        public function borrow()
        {
        	$equipment_info=M('equipment_borrow');
        	$list = $equipment_info -> order('id asc') -> select();
        	import("ORG.Util.Page"); //导入分页类
	    	$count = $equipment_info->count();    //计算总数
	    	$p = new Page ( $count, 20);
	    	$list1=$equipment_info->limit($p->firstRow.','.$p->listRows)->order('id desc')->select();	    
	    	$page = $p->show ();
	    	$this->assign ( "page", $page );
	    	$this->assign ( "list1", $list1 );
	    	$this->display();
        }
        public function insertborrow()
        {
        	$lab = M('equipment_borrow');
        	$data['equipment_number'] = $_POST['equipment_number'];
        	$data['equipment_name'] = $_POST['equipment_name'];
        	$data['borrow_man'] = $_POST['borrow_man'];
        	$data['location'] = $_POST['location'];
        	$data['approval_man'] = $_POST['approval_man'];
        	$data['manage_man'] = $_POST['manage_man'];
        	$data['borrow_date'] = $_POST['borrow_date'];
        	$data['return_date'] = $_POST['return_date'];
        	$data['borrow_reason'] = $_POST['borrow_reason'];
        	$data['remark'] = $_POST['remark'];
        	if ($data['equipment_number'] !=null && $data['equipment_name'] !=null &&  $data['borrow_man']!=null &&  $data['location']!=null &&  $data['approval_man']!=null &&  $data['borrow_date']!=null &&  $data['borrow_reason']!=null &&  $data['manage_man']!=null &&  $data['return_date'] !=null ) {	        						
				$lab->add($data);
				$this->assign("jumpUrl","/Admin/Equipment/borrow");
				$this->success('添加成功');		
			} else {
	        	$this->error('信息填写不完整，请重新填写');
	        }
        }
		public function addborrow(){
			$this->display();
		}
		public function editborrow(){
			$lab = M('equipment_borrow');
			$data['id']=$_GET['id'];
			$info=$lab->where($data)->select();
			$this->assign( "info", $info );
			$this->display();
		}
		public function deleteborrow()
		{
			$lab = new Model("equipment_borrow");
			$data['id']=$_GET['id'];
			$info = $lab ->where($data)->delete();
			$this->redirect('/Equipment/borrow');
		}
		public  function submitborrow(){
			$lab = M('equipment_borrow');
			$dataid['id']=trim($_POST['id']);
			$data['equipment_number'] = $_POST['equipment_number'];
			$data['equipment_name'] = $_POST['equipment_name'];
			$data['borrow_man'] = $_POST['borrow_man'];
			$data['location'] = $_POST['location'];
			$data['approval_man'] = $_POST['approval_man'];
			$data['manage_man'] = $_POST['manage_man'];
			$data['borrow_date'] = $_POST['borrow_date'];
			$data['return_date'] = $_POST['return_date'];
			$data['borrow_reason'] = $_POST['borrow_reason'];
			$data['remark'] = $_POST['remark'];
			$info = $lab->where($dataid)->save($data);
			$this->redirect('/Equipment/borrow');
		}
/***************************仪器报损*****************************************/
        public function break_info()
        {
        	$equipment_info=M('equipment_break_info');
        	$list = $equipment_info -> order('id asc') -> select();
        	import("ORG.Util.Page"); //导入分页类
	    	$count = $equipment_info->count();    //计算总数
	    	$p = new Page ( $count, 20);
	    	$list1=$equipment_info->limit($p->firstRow.','.$p->listRows)->order('id desc')->select();
	    	//var_dump($list1);
	    	$page = $p->show ();
	    	$this->assign ( "page", $page );
	    	$this->assign ( "list1", $list1 );
	    	$this->display();
        }
        public function insertbreak()
        {
        	$lab = M('equipment_break_info');
        	$data['equipment_number'] = $_POST['equipment_number'];
        	$data['equipment_name'] = $_POST['equipment_name'];
        	$data['value'] = $_POST['value'];
        	$data['buy_date'] = $_POST['buy_date'];
        	$data['manage_man'] = $_POST['manage_man'];
        	$data['approval_man'] = $_POST['approval_man'];
        	$data['break_reason'] = $_POST['break_reason'];
        	$data['approval_reason'] = $_POST['approval_reason'];
        	$data['remark'] = $_POST['remark'];
        	if ($data['equipment_number'] !=null && $data['equipment_name'] !=null && $data['value']!=null &&  $data['buy_date']!=null &&  $data['manage_man']!=null &&  $data['approval_man']!=null &&  $data['break_reason']!=null &&  $data['approval_reason'] !=null  ) {
        		$result = $lab->where('equipment_number='.$data['equipment_number'])->select();
				if ($result) {
					$this->error('已经存在的设备不能重复添加');											
				}else {
					$lab->add($data);
					$this->assign("jumpUrl","/Admin/Equipment/break_info");
					$this->success('添加成功');
				}
			}  
        	 else {
        		$this->error('添加失败');
        	}
        }
        public function addbreak()
        {
        	$this->display();
        }
        public function editbreak(){
        	$lab = M('equipment_break_info');
        	$data['id']=$_GET['id'];
        	$info=$lab->where($data)->select();
        	$this->assign( "info", $info );
        	$this->display();
        }
        public function deletebreak()
        {
        	$lab = new Model("equipment_break_info");
        	$data['id']=$_GET['id'];
        	$info = $lab ->where($data)->delete();
        	$this->redirect('/Equipment/break_info');
        }
        public  function submitbreak(){
        	$lab = M('equipment_break_info');
        	$dataid['id']=trim($_POST['id']);
        	$data['equipment_number'] = $_POST['equipment_number'];
        	$data['equipment_name'] = $_POST['equipment_name'];
        	$data['value'] = $_POST['value'];
        	$data['buy_date'] = $_POST['buy_date'];
        	$data['manage_man'] = $_POST['manage_man'];
        	$data['approval_man'] = $_POST['approval_man'];
        	$data['break_reason'] = $_POST['break_reason'];
        	$data['approval_reason'] = $_POST['approval_reason'];
        	$data['remark'] = $_POST['remark'];
        	$info = $lab->where($dataid)->save($data);
        	$this->redirect('/Equipment/break_info');
        }
       
}

