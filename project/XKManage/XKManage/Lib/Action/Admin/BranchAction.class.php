<?php
/**
     * @author hjq
     * @version 2013-4-19
 */
class BranchAction extends Action
{
public function branch()
	{
		$branch = M('Studybranch');
		$des = M("Discipline");
		$academy= M('Academy');
		if (isset($_SESSION['des_id'])){
			$des_id = Session::get("des_id");
			Session::set('des_id',NULL);
			$list = $branch->where( 'branch_id=' .$branch_id)->select();
			$this->assign('list',$list);
			$list1 = $des->where( 'des_id=' .$des_id)->select();
			$this->assign('list1',$list1);
			$this->display();
		}else{
		$list = $branch->order('branch_id asc')->select();
		$this->assign('list',$list);
		//2表联合查询
		$dis_id=$branch->join('discipline ON discipline.des_id=studybranch.des_id')->order('branch_id asc')->select();
		$this->assign('dis_id',$dis_id);
		$list1 = $des->order( 'des_id asc')->select();
		$list2= $academy->order( 'academy_id asc')->select();
		$this->assign('list1',$list1);
		$this->assign('list2',$list2);
		$this->display();
		}
	}

public function query(){
		$des = M('Discipline');
		$des_id = $_GET['option'];
		if ($des_id!=NULL)
		{
			Session::set('des_id',$des_id);
		}
		$this->redirect('/Branch/branch');
	}
	
	public function add(){
		$br = M('studybranch');
        $data['branch_name'] = trim($_GET['branch_name']);
        $data['des_id'] = trim( $_GET['option']);
        
        if ($data['branch_name']!=null &&  $data['des_id'] !=null) {
         $br->add($data);
              $this->success('添加成功');
              $this->redirect('/Branch/branch');
         } else {
            	$this->error('添加失败');
         }
	}

	public function edit(){
		$des = M('Discipline');
		$branch = M('Studybranch');
		$branch_id = trim( $_GET['branch_id']);
		$branch_name = trim( $_GET['branch_name']);
		Session::set('br_id',$branch_id);
	    $list = $des->order('des_id asc')->select();
		$this->assign('list',$list);
		$list1 = $branch->where('branch_id=' .$branch_id)->select();
		$list2 = $des->where('des_id=' .$list1[0]['des_id'])->select();
		$this->assign('list2',$list2);
		
		$this->assign('branch_name',$branch_name);
		$this->display();
	}
	
	public function update(){
        	$br = M('studybranch');
        	$data['branch_name'] = trim($_GET['branch_name']);
            $data['des_id'] = trim( $_GET['option']);
            var_dump($data['des_id']);
        	if ($data['branch_name']!=null && $data['des_id'] !=null) {
               $br->where( 'branch_id=' .$_SESSION['br_id'] )->save($data);
                $this->success('编辑成功');
                $this->redirect('/Branch/branch');
            } else {
            	$this->error('编辑失败');
            }
	}
	
public function delete(){
		$br = M('studybranch');
		$branch_id=$_GET['branch_id'];
	    $br-> where( 'branch_id='.$branch_id)->delete();
	    $this->success('删除成功');
	    $this->redirect('/Branch/branch');
	}
}