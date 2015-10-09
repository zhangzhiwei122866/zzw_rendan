<?php
/**
 *ʵ����һ��ģ��
 *ע�͸�ʽ
 */
class LabListAction extends Action
{
	public function ajhuo(){
		$table =new Model("Lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['option_number']);
		$this ->ajfan($table , $zui);
	}
	public function only(){
		$table =new Model("Lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['lab_name']);
		$this ->onlycheck($table , $zui);
	}
	public function only1(){
		$table =new Model("Lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['number']);
		$this ->onlycheck($table , $zui);
	}
	public function only2(){
		$table =new Model("Lab_manager");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['manager_name']);
		$this ->onlycheck($table , $zui);
	}
	public function only3(){
		$table =new Model("Lab_manager");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['manager_number']);
		$this ->onlycheck($table , $zui);
	}
	public function onlycheck($table , $zui){
		$result = $table -> where($zui) ->select();
		if(empty($result)){
			$this->ajaxReturn('','',0);
		}else{
			$this->ajaxReturn($result,'',1);
		}
	}
	public function ajhuo1(){
		$table =new Model("Lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['option_name']);
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
	public function labList()
	{
		$form= new Model("Lab_info");
		$list=$form->order('convert(name using gbk)')->select();
		$this->assign('list',$list);
		
/*********************分页部分************************/
		
		import("ORG.Util.Page"); //导入分页类
		$count = $form->count();    //计算总数
		$p = new Page ( $count, 10);
		$list1=$form->limit($p->firstRow.','.$p->listRows)->order('id desc')->select();
		//var_dump($list1);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->assign ( "list1", $list1 );
		$this->display();
	}
	public function query()
	{
		$lab_number['number'] = $_GET['option_number'];
		$lab_name = $_GET['option_name'];
		//var_dump($lab_number);
		//var_dump($lab_name);
		$lab_info= new Model("Lab_info");
		$list=$lab_info->select();
		$this->assign('list',$list);
		$lab_list= $lab_info->where($lab_number)->select();
		$this->assign("lab_inf",$lab_list);
		$this->display();
	}
	public function info()
	{
		$lab_info= new Model("Lab_info");
		$list=$lab_info->order('convert(name using gbk)')->select();
		$this->assign('list',$list);
		$lab_id['id']=$_GET['lab_id'];
		//var_dump($lab_id);
		$info = $lab_info->where($lab_id)->select();
		$this->assign("info",$info);
		$this->display();
	}
	public function lab_info()
	{
		$lab_info= new Model("Lab_info");
		$list=$lab_info->order('convert(name using gbk)')->select();
		$this->assign('list',$list);
		$lab_number['number'] = $_GET['option_number'];
		$lab_name['name'] = $_GET['option_name'];
		//var_dump($lab_id);
		$lab_list= $lab_info->where($lab_number)->select();
		$this->assign("lab_inf",$lab_list);
		$this->display();
	}
	public function add()
	{
		$lab_type=new  Model("Lab_type");
		$academy = M('academy');				
		$academyList = $academy -> order('CONVERT(name USING gbk)') -> select();
		

		$list=$lab_type->select();
		$this->assign("type",$list);
		$this -> assign('academyList' , $academyList);
		$this->display();
	}
	public  function redact()
	{
		$lab_info= new Model("Lab_info");
		$lab_type= new Model("Lab_type");
		$lab_type=new  Model("Lab_type");
		$academy = M('academy');
		$academyList = $academy -> order('CONVERT(name USING gbk)') -> select();
		$lab_id=$_GET['lab_id'];
		//var_dump($_GET['lab_id']);return;
		$list = $lab_type->select();
		$info = $lab_info->join('lab_type ON lab_type.lab_type_number = lab_info.type')->where('lab_info.id='.$lab_id)->select();
		//$info = $lab_info->where($lab_id)->select();
		$this->assign("info",$info);
		$this -> assign('academyList' , $academyList);
		//var_dump($info);return;
		$this->assign("lab_id",$lab_id);
		$this->assign("list",$list);		
		$this->display();
	}
	public function ajhuo13(){
		$table =new Model("academy");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['s_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo14(){
		$table =new Model("academy");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['s_name']);
		$this ->ajfan($table , $zui);
	}
	public function delete()
	{
		$lab_info= new Model("Lab_info");
		$lab_id['id']=$_GET['lab_id'];
		//var_dump($_GET['lab_id']);
		$info = $lab_info->where($lab_id)->delete();
		$this->redirect('labList');
	}
	public function insert()
	{
		$lab_info= new Model("Lab_info");
		$academy = M('academy');		
		$lab_id['name']=$_POST['lab_name'];
		$lab_id['number']=$_POST['number'];
		$where1['number']=$_POST['number'];
		//$lab_id['s_name']=$_POST['s_name'];
		$lab_id['s_number']=$_POST['s_number'];
		$lab_id['type']=$_POST['type'];
		$lab_id['area']=$_POST['area'];
		$lab_id['place']=$_POST['place'];
		$lab_id['subject']=$_POST['subject'];
		$lab_id['year']=$_POST['year'];
		$lab_id['teach_expenditure']=$_POST['teach_expenditure'];
		$lab_id['material_expenditure']=$_POST['material_expenditure'];
		$lab_id['enter_time']=$_POST['enter_time'];
		$lab_id['job_responsibility']=$_POST['job_responsibility'];
		$lab_id['institution']=$_POST['institution'];		
		$where['number']=$_POST['s_number'];		
		$que = $academy ->where($where)-> find();		
		$lab_id['s_name']=$que['name'];		
		if($lab_id['name'] != null && $lab_id['number'] != null ){
			$checknumber = $lab_info->where($where1)->find();
			if($checknumber){
				$this->error('实验室编号已经存在，请换其它编号!');
			}
			$info = $lab_info->add($lab_id);
			if($info){
				$this->assign("jumpUrl","/Admin/LabList/labList");
				$this->success('添加成功!');
			}else{
				$this->error('添加失败!');
			}	
		}else{
			$this->error('信息添加不完整!');
		}	
		
		$this->redirect('labList');
	}
	public function xiugai()
	{
		$lab_info= new Model("Lab_info");
		$lab_idq['id']=$_POST['lab_id'];
		$lab_id['name']=$_POST['lab_name'];
		$lab_id['number']=$_POST['number'];
		$lab_id['s_name']=$_POST['s_name'];
		$lab_id['s_number']=$_POST['s_number'];
		$lab_id['type']=$_POST['type'];
		$lab_id['area']=$_POST['area'];
		$lab_id['place']=$_POST['place'];
		$lab_id['subject']=$_POST['subject'];
		$lab_id['year']=$_POST['year'];
		$lab_id['teach_expenditure']=$_POST['teach_expenditure'];
		$lab_id['material_expenditure']=$_POST['material_expenditure'];
		$lab_id['enter_time']=$_POST['enter_time'];
		$lab_id['job_responsibility']=$_POST['job_responsibility'];
		$lab_id['institution']=$_POST['institution'];
		//var_dump($_POST['lab_id']);
		$info = $lab_info->where($lab_idq)->save($lab_id);
		//$this->success("修改成功");
		$this->redirect('labList');
	}
	
/*************************************实验室管理员个人信息**********************/	
	
	public function lab_manager()
	{
		$form= new Model("Lab_manager");
		$list=$form->order('convert(name using gbk)')->select();
		$this->assign('list',$list);
		import("ORG.Util.Page"); //导入分页类
		$count = $form->count();    //计算总数
		$p = new Page ( $count, 20);
		$list1=$form->limit($p->firstRow.','.$p->listRows)->select();
		//var_dump($list1);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->assign ( "list1", $list1 );
		$this->display();
	}
	public function ajhuo2(){
		$table = new Model("Lab_manager");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['manager_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo3(){
		$table = new Model("Lab_manager");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['manager_name']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo4(){
		$table =new Model("Lab_manager");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['lab_number'] = trim($huoqu['lab_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo5(){
		$table =new Model("Lab_manager");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['lab_name'] = trim($huoqu['lab_name']);
		$this ->ajfan($table , $zui);
	}
	public function manager_query()
	{
		$manager['number'] = $_GET['manager_number'];
		
		$manager['lab_number'] = $_GET['lab_number'];
		//var_dump($manager);
		$manager['_logic'] = 'OR';
		$form= new Model("Lab_manager");
		$list=$form->order('convert(name using gbk)')->select();
		$this->assign('list',$list);
		import("ORG.Util.Page"); //导入分页类
		$count = $form->where($manager)->count();    //计算总数
		$p = new Page ( $count, 2);
		$list1=$form->limit($p->firstRow.','.$p->listRows)->where($manager)->select();
		//var_dump($list1);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->assign ( "list1", $list1 );
		$this->display();
	}
	public function manager_add()
	{
		$form= new Model("Lab_info");
		$list=$form->order('convert(name using gbk)')->select();
		$this->assign('lab_list',$list);
		$this->display();
	}
	public function ajhuo7(){
		$table =new Model("lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['lab_name']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo8(){
		$table =new Model("lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['lab_number']);
		$this ->ajfan($table , $zui);
	}
	public function manager_insert()
	{
		$form= new Model("Lab_manager");
		$manager['number'] = $_POST['manager_number'];
		$where['number'] = $_POST['manager_number'];
		$manager['name'] = $_POST['manager_name'];
		$manager['lab_name'] = $_POST['lab_number'];
		$manager['lab_number'] = $_POST['lab_name'];
		$manager['sex'] = $_POST['sex'];
		$manager['birthday'] = $_POST['birthday'];
		$manager['subject'] = $_POST['subject'];
		$manager['education'] = $_POST['education'];
		$manager['inland_train'] = $_POST['inland_train'];
		$manager['foreign_train'] = $_POST['foreign_train'];
		$manager['enter_time'] = $_POST['enter_time'];
		$manager['remark'] = $_POST['remark'];
		//var_dump($manager);
		if($manager['number'] != null && $manager['name'] != null ){
			$checknumber = $form->where($where)->find();
			if($checknumber){
				$this->error('管理员编号已经存在，请换其它编号!');
			}
			$list=$form->add($manager);
			if($list){
				$this->assign("jumpUrl","/Admin/LabList/lab_magager");
				$this->success('添加成功!');
			}else{
				$this->error('添加失败!');
			}
		}else{
			$this->error('信息添加不完整!');
		}
		//$this->redirect('lab_manager');
	}
	public function manager_delete()
	{
		$manager_id['id']=$_GET['lab_id'];
		$form= new Model("Lab_manager");
		$lsit=$form ->where($manager_id)->delete();
		$this->redirect('lab_manager');
	}
	public function manager_redact()
	{
		$form1= new Model("Lab_info");
		$list=$form1->order('convert(name using gbk)')->select();
		$this->assign('lab_list',$list);
		$manager_id['id']=$_GET['lab_id'];
		$form= new Model("Lab_manager");
		$list1=$form->order('convert(name using gbk)')->select();
		$this->assign('list',$list1);
		$list2=$form->where($manager_id)->select();
		$this->assign('manager_list',$list2);
		$this->display();
	}
	public function manager_xiugai()
	{
		$form= new Model("Lab_manager");
		$manager_id['id'] = $_POST['manager_id'];
		$manager['number'] = $_POST['manager_number'];
		$manager['name'] = $_POST['manager_name'];
		$manager['lab_name'] = $_POST['lab_number'];
		$manager['lab_number'] = $_POST['lab_name'];
		$manager['sex'] = $_POST['sex'];
		$manager['birthday'] = $_POST['birthday'];
		$manager['subject'] = $_POST['subject'];
		$manager['education'] = $_POST['education'];
		$manager['inland_train'] = $_POST['inland_train'];
		$manager['foreign_train'] = $_POST['foreign_train'];
		$manager['enter_time'] = $_POST['enter_time'];
		$manager['remark'] = $_POST['remark'];
		//var_dump($manager);
		$list=$form->where($manager_id)->save($manager);
		$this->redirect('lab_manager');
	}
	
/*************************************实验室管理员分配添加***************************/

	public function lab_allocation()
	{
		$form= new Model("Lab_allocation");
		$list=$form->order('convert(teacher using gbk)')->select();
		$this->assign('list',$list);
		import("ORG.Util.Page"); //导入分页类
		$count = $form->count();    //计算总数
		$p = new Page ( $count, 20);
		$list1=$form->limit($p->firstRow.','.$p->listRows)->select();
		//var_dump($list1);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->assign ( "list1", $list1 );
		$this->display();
	}
	public function ajhuo9(){
		$table = new Model("Lab_allocation");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['job_number'] = trim($huoqu['manager_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo10(){
		$table = new Model("Lab_allocation");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['teacher'] = trim($huoqu['manager_name']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo11(){
		$table =new Model("Lab_allocation");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['lab_number'] = trim($huoqu['lab_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo12(){
		$table =new Model("Lab_allocation");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['lab_name'] = trim($huoqu['lab_name']);
		$this ->ajfan($table , $zui);
	}
	public function allocation_query()
	{
		$form= new Model("Lab_allocation");
		$list=$form->order('convert(teacher using gbk)')->select();
		$this->assign('list',$list);
		$manager1['job_number'] = $_GET['manager_number'];
		$manager1['lab_number'] = $_GET['lab_number'];
		//var_dump($manager1);
		$manager1['_logic'] = 'OR';
		$list1=$form->where($manager1)->select();
		//var_dump($list1);
		$this->assign ("list1", $list1 );
		$this->display();
	}
	public function allocation_add()
	{
		$form= new Model("Lab_info");
		$list=$form->order('convert(name using gbk)')->select();
		$this->assign('lab_list',$list);
		$this->display();
	}
	public function allocation_insert()
	{
		$form= new Model("Lab_allocation");
		$manager['job_number'] = $_POST['manager_number'];
		$manager['teacher'] = $_POST['manager_name'];
		$manager['lab_name'] = $_POST['lab_number'];
		$manager['lab_number'] = $_POST['lab_name'];
		$list=$form->add($manager);
		$this->redirect('lab_allocation');
	}
	public function allocation_delete()
	{
		$manager_id['id']=$_GET['lab_id'];
		$form= new Model("Lab_allocation");
		$lsit=$form ->where($manager_id)->delete();
		$this->redirect('lab_allocation');
	}
	public function allocation_redact()
	{
		$form1= new Model("Lab_info");
		$list=$form1->order('convert(name using gbk)')->select();
		$this->assign('lab_list',$list);
		$manager_id['id']=$_GET['lab_id'];
		$form= new Model("Lab_allocation");
		//$list1=$form->order('convert(teacher using gbk)')->select();
		//$this->assign('list',$list1);
		$list2=$form->where($manager_id)->select();
		$this->assign('manager_list',$list2);
		var_dump($list2);
		$this->display();
	}
	public function allocation_xiugai()
	{
		$form= new Model("Lab_allocation");
		$manager_id['id'] = $_POST['manager_id'];
		$manager['job_number'] = $_POST['manager_number'];
		$manager['teacher'] = $_POST['manager_name'];
		$manager['lab_name'] = $_POST['lab_number'];
		$manager['lab_number'] = $_POST['lab_name'];
		$list=$form->where($manager_id)->save($manager);
		$this->redirect('lab_allocation');
	}
	
}