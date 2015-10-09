<?php
/**
     * @author hjq
     * @version 2013-4-19
 */
class DisciplineAction extends Action
{
    public function disciplineList()
	{
		$des = M('Discipline');
		if (isset($_SESSION['des_id'])){
			$des_id = Session::get("des_id");
			Session::set('des_id',NULL);
			$list = $des->where( 'des_id=' .$des_id)->select();
			$this->assign('list',$list);
			$this->display();
		}else{
		$list = $des->order('des_id asc')->select();
		$this->assign('list',$list);
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
		$this->redirect('/Discipline/disciplineList');
	}
	
	public function add(){
		$des_id =trim( $_GET['des_id']);
		$forr = M('discipline');
		$jiguo = $forr ->where('des_id='.$des_id)->select();  
		$this ->assign('jiguo', $jiguo);
		Session::set('des_id1',$des_id);
		//var_dump($_SESSION);
		$academy = M("Academy");
		$lis = $academy->select();
		$this ->assign('lis', $lis);
		$res = $academy->where('academy_id='.$jiguo[0]['academy_id'])->select();
		$data['academy_name'] = $res[0]['academy_name'] ;
		$aca_id = $jiguo[0]['academy_id'];
		$this ->assign('da', $data['academy_name']);
		$this ->assign('aca_id', $aca_id);
		//var_dump($data['academy_name']);
		$this->display();
	}
	
	public function insert(){
	 //判断是更新操作还是添加操作
		$academy = M("Academy");
        if ($_SESSION['des_id1'] != NULL) {
        	//var_dump("des_id1="+$_SESSION['des_id1']);
        	$des_id = $_SESSION['des_id1'];
			unset($_SESSION['des_id1']);
        	$des = M('Discipline');
        	$data['des_name'] = trim($_POST['des_name']);
        	$data['academy_id'] = trim($_POST['option']);
            $data['des_no'] = trim($_POST['des_no']);
            $res = $academy->where('academy_id='.$data['academy_id'])->select();
            //$data['academy_name'] = $res['academy_name'] ;
            $this ->assign('res', $res);
            if ($data['des_name']==null | $data['des_no'] ==null  && $data['academy_id'] ==null) {
                $this->error('信息填写不完善，更新失败');
            } else {
            	$des->where( 'des_id=' .$des_id )->save($data);
            	$this->success('更新成功');
                $this->redirect('/Discipline/disciplineList');
            }
        } else {
        	$des = M('Discipline');
        	$datamoney = M("money");
        	$datatroops = M("academin_troops");
        	$datatime = M("time");
        	//$Formresear=M('researchers');
        	$Formtscistudy=M('science_study');
        	$data['des_name'] = trim($_POST['des_name']);
            $data['des_no'] = trim($_POST['des_no']);
            $data['academy_id'] = trim($_POST['option']);
            $res1 = $academy->where('academy_id='.$data['academy_id'])->select();
            $data['academy_name'] = $res1[0]['academy_name'] ;
            //var_dump($res1[0]['academy_name'] );
        	if ($data['des_name']!=null && $data['des_no'] !=null && $data['academy_id'] !=null) {
             $id = $des->add($data);
			 $data2['des_id'] = $id;
			 $data3['des_id'] = $id;
			 //$data3['name'] = NULL;
			 //$data3['leader'] = 1;
               //各表分别插入空值 $id 为新增学科返回的主键des_id的值
            $list0 = $des->add($data2);
            $list10 = $datamoney->add($data3);
            $list11 = $datamoney->add($data3);
            $list12 = $datamoney->add($data3);
            $list2 = $datatroops->add($data2);
            $list3 = $datatime->add($data2);
            $list4 = $Formtscistudy->add($data2);
            //$list5 = $Formresear->add($data3);   
            $this->success('添加成功');
                $this->redirect('/Discipline/disciplineList');
            } else {
            	$this->error('添加失败');
            }
        }
	}
	
public function delete(){
	for($i=0;$i<2;$i++){
		$id=$_GET['des_id'];
	    $des = M('Discipline');
	    $researchers = M("researchers");
		$studybranch = M("studybranch");
		$project = M("project");
		$course = M("course");
		$money = M("money");
		$academin_troops = M("academin_troops");
		$science_study = M("science_study");
		$time = M("time");
		$user = M("user");
	    $des->where( 'des_id='.$id)->delete();
		$researchers->where('des_id='.$id)->delete();
		$studybranch->where('des_id='.$id)->delete();
		$project->where('des_id='.$id)->delete();
		$course ->where('research_id='.$id)->delete();
		$money->where('des_id='.$id)->delete();
		$science_study->where('des_id='.$id)->delete();
		$academin_troops ->where('des_id='.$id)->delete();
		$time->where('des_id='.$id)->delete();
		
		$user->where('des_id='.$id)->delete();
		$this->success("删除成功！");
	}
	$this->redirect('/Discipline/disciplineList');
  }
}