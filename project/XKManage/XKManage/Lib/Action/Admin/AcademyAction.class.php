<?php
/**
     * @author hjq
     * @version 2013-4-19
 */
class AcademyAction extends Action
{
	public function academyList()
	{
		$aca = M('Academy');
		$list = $aca->order('academy_id asc')->select();
		$this->assign('list',$list);
		$this->display();
	}

	public function add(){
		$academy_id =trim( $_GET['academy_id']);
		$forr = M('Academy');
		$jiguo = $forr ->where('academy_id='.$academy_id)->select();  
		$this ->assign('jiguo', $jiguo);
		Session::set('academy_id',$academy_id);
		$this->display();
	}
	
	public function insert(){
	 //判断是更新操作还是添加操作
        if ($_SESSION['academy_id'] != NULL) {
        	$academy_id = $_SESSION['academy_id'];
			unset($_SESSION['academy_id']);
        	$des = M('Academy');
        	$data['academy_number'] = trim($_POST['academy_number']);
        	$data['academy_name'] = trim($_POST['academy_name']);      	
        	//print_r($data['academy_number']);return;
            if ($data['academy_name']==null && $data['academy_number']==null) {
                $this->error('信息填写不完善，更新失败');
            } else {
            	$result = $des->where('academy_number='.$data['academy_number'] )->find();
				if ($result) {
					$this->error('学院编号已经存在，请更换！');
				}else{
	            	$des->where( 'academy_id='.$academy_id )->save($data);
	            	$this->success('更新成功');
	                $this->redirect('/Academy/academyList');
	            }    
            }
        } else {
        	$des = M('Academy');
        	$data['academy_number'] = trim($_GET['academy_number']);
        	$data['academy_name'] = trim($_GET['academy_name']);
        	if ($data['academy_name']!=null && $data['academy_number']!=null) {
        		$result = $des->where('academy_number='.$data['academy_number'] )->find();
				if ($result) {
					$this->error('学院编号已经存在，请更换！');
				}else{
		            $des->add($data);
		            $this->success('添加成功');
	                $this->redirect('/Academy/academyList');
	            }
            } else {
            	$this->error('添加失败');
            }
        }
	}
	
public function delete(){
		$id=$_GET['academy_id'];
		$academy = M('Academy');
	    $des = M('Discipline');
	    $academy->where( 'academy_id='.$id)->delete();
	    $des->where( 'academy_id='.$id)->delete();
		$this->success("删除成功！");
	 	$this->redirect('/Academy/academyList');
  }
}