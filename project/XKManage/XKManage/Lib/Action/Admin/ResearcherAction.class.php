<?php
class ResearcherAction extends Action
{
	public function researcherList()
	{
		$researchers = M("researchers");
		$studybranch = M("studybranch");
		$discipline = M("discipline");
		$user=M('user');
		$academyid = $_GET['academyid'];
		$power = $_SESSION['power'];
		import('ORG.Util.Page');
		$count = $researchers->join('discipline ON discipline.des_id=researchers.des_id')->where('academy_id='.$academyid)->count();
		$Page = new Page($count,15);
		$list = $researchers->join('discipline ON discipline.des_id=researchers.des_id')->where('academy_id='.$academyid)->limit($Page->firstRow.','.$Page->listRows)->select();
		$show = $Page->show();
		//新增的$result
		$result=$user->order('researcher_id asc')->select();
		$this->assign('count',$count);
		$this->assign('result',$result);
		$this->assign('page',$show);
		$this->assign ('list', $list );
		$this->assign('power',$power);
		//这个foreach也是新增的
		foreach ($list  as $key => $val){
			$id=$list[$key]['id'];
			$temp[$id]=0;
			foreach ($result as $key1 => $val1){
				if($result[$key1]['researcher_id'] == $id){
					$temp[$id]=1;
				}
			}			
		}
		$this->assign('temp',$temp);
		$this->assign('academyid',$academyid);
		$this->display();
	}
	
    public function researcher()
	{
		$id = $_GET['id'];
		$study_branch = $_GET['study_branch'];
		$desid = $_GET['desid'];
		$researcher_achievement = M("researcher_achievement");
		$researchers = M("researchers");
		$studybranch = M("studybranch");
		$project = M("project");
		$course = M("course");
		$money = M("money");
		$researcher_id = $_SESSION['researcher_id'];//必须写在else外面，否则报错
		if($id){
			$list = $researchers->where('id='.$id)->select();
			$achievement_list = $researcher_achievement->where('researcher_id='.$id)->select();
			$branchlist = $studybranch->where('des_id='.$desid)->order( 'branch_id asc')->select();
			$branch_name = $studybranch->where('researcher_id='.$id)->getField('branch_name');
			$project = $project->where('researcher_id='.$id)->select();
			$count_pro = count($project);
			$course = $course->where('research_id='.$id)->select();
			$count_cla = count($course);
			$money = $money->where('researcher_id='.$id)->select();
			$stubranch = $studybranch->where('branch_id='.$study_branch)->getField('branch_name');
 		}
 		else{			
			$list = $researchers->where('id='.$researcher_id)->select();
			$branch_name = $studybranch->where('researcher_id='.$researcher_id)->getField('branch_name');
			$project = $project->where('researcher_id='.$researcher_id)->select();
			$course = $course->where('research_id='.$researcher_id)->select();
			$money = $money->where('researcher_id='.$researcher_id)->select();
			$branchlist = $studybranch->where('des_id='.$desid)->order( 'branch_id asc')->select();
			$stubranch = $studybranch->where('branch_id='.$study_branch)->getField('branch_name');
		}
		$bran = $researchers->where('id ='.$researcher_id)->find();
		$branch_na = $studybranch->where('branch_id='.$bran['study_branch'])->getField('branch_name');
		$this->assign ('stud_branch', $branch_na );
		$this->assign ('list', $list );
		$this->assign ('achievement_list', $achievement_list );
		$this->assign ('branch_name', $branchlist );
		$this->assign ('study_branch', $stubranch );
		$this->assign ('branch', $_GET['study_branch'] );
		$this->assign ('project', $project );
		$this->assign ('course', $course );
		$this->assign ('money', $money );
		$this->assign ('count_pro', $count_pro );
		$this->assign ('count_cla', $count_cla );
		$this->assign ('value', $id  );
		$this->display();
	}
	
	public function edit()
	{
		$id = $_POST['id'];
		$researchers = M('researchers');
		$listreasercher = false;
		$listreasercher = $researchers->where('id='.$id)->save(array(
				'name'=>$_POST['name'],
				'sex'=>$_POST['sex'],
				'position'=>$_POST['position'],
				'set_time'=>$_POST['set_time'],
				'note'=>$_POST['note'],
				'birthday'=>$_POST['birthday'],
				'job'=>$_POST['job'],
				'graduate_record'=>$_POST['graduate_record'],
				'work_section'=>$_POST['work_section'],
				'part_time'=>$_POST['part_time'],
				'academic_name'=>$_POST['academic_name'],
				'graduated_doctor'=>$_POST['graduated_doctor'],
				'graduated_master'=>$_POST['graduated_master'],
				'school_doctor'=>$_POST['school_doctor'],
				'school_master'=>$_POST['school_master'],
			    'study_branch'=> $_POST['option']
		));
	
	/*	$studybranch = M("studybranch");
		$liststudybranch = false;
		$liststudybranch = $studybranch->where('researcher_id='.$id)->save(array(
				'branch_name'=>$_POST['branch_name']
		));*/
	
		$n=0;$i=1;
		$project = M("project");
		$listproject = false;
		$pro=$project->where('researcher_id='.$id)->select();
		foreach ($pro as $key=>$val){
			$pro_id[$n]=$val['pro_id'];
			$listproject = $project->where('researcher_id='.$id.' AND pro_id='.$pro_id[$n])->save(array(
					'pro_name' => $_POST['pro_name'][$i],
					'pro_from' => $_POST['pro_from'][$i],
					'start_time' => $_POST['start_time'][$i],
					'end_time' => $_POST['end_time'][$i],
					'give_money' => $_POST['give_money'][$i],
					'pro_position' => $_POST['pro_position'][$i],
			));
			$n++;$i++;
		}
		//新方法JS插入PRO
		$pro_num = $_POST['pro_num'];
		for($i=1;$i<$pro_num+1;$i++){
			$provalue = $_POST["pro$i"];
			$result = $project->add(array('pro_name' => $provalue[0],
					'pro_from' => $provalue[1],
					'start_time' => $provalue[2],
					'end_time' => $provalue[3],
					'give_money' => $provalue[4],
					'pro_position' =>$provalue[5],
					'researcher_id'=>$id,));
			}
		
		$n=0;$i=0;
		$course = M("course");
		$listcourse = false;
		$cour = $course->where('research_id='.$id)->select();
		foreach ($cour as $key=>$val){
			$course_id[$n]=$val['course_id'];
			$listcourse = $course->where('research_id='.$id.' AND course_id='.$course_id[$n])->save(array(
					'course_name' => $_POST['course_name'][$i],
					'time' => $_POST['time'][$i],
					'study_time' => $_POST['study_time'][$i],
					'object' => $_POST['object'][$i],
					'people_sum' => $_POST['people_sum'][$i]
			));
			$n++;$i++;
		}
		//新方法JS插入cla
		$cla_num = $_POST['cla_num'];
		for($j=1;$j<$cla_num+1;$j++){
			$clavalue = $_POST["new$j"];
			$result = $course->add(array('course_name' => $clavalue[0],
					'time' => $clavalue[1],
					'study_time' => $clavalue[2],
					'object' => $clavalue[3],
					'people_sum' => $clavalue[4],
					'research_id'=>$id,));
			}
		
		$n=0;$i=0;
		$money = M("money");
		$listmoney = false;
		$mon = $money->where('researcher_id='.$id)->select();	
		foreach ($mon as $key=>$val){
			$money_id[$n] = $val['money_id'];
			$listmoney = $money->where('researcher_id='.$id.' AND money_id='.$money_id[$n])->save(array(
					'time' => $_POST['time'][$i],
					'plan_use' => $_POST['plan_use'][$i],
					'reality_use' => $_POST['reality_use'][$i],
			));
			$n++;$i++;
		}

		if( $listreasercher!=0|$liststudybranch!=0|$listproject!=0|$listcourse!=0|$listmoney!=0) {
			$this->success("修改成功");
		}else{
			$this->error("提交成功");
		}
	}
		
	public function add(){
		$studybranch = M("studybranch");
		$discipline = M("Discipline");
		$academyid = $_GET['academyid'];
		$branchlist = $studybranch->join('discipline ON discipline.des_id=studybranch.des_id')->where('academy_id='.$academyid)->order( 'branch_id asc')->select();
		$this->assign('dess',$branchlist[0]['des_id']);
		$this->assign ('branch_name', $branchlist );
		$this->display();
	}
	
	public function insert()
	{
		$power = $_SESSION['power'];
		
		if($power == 2 | $power == 3){			
			$researchers = M('researchers');
			$listreasercher = $researchers->add(array(
					'des_id'=>$_POST['des'],
					'name'=>$_POST['name'],
					'sex'=>$_POST['sex'],
					'position'=>$_POST['position'],
					'set_time'=>$_POST['set_time'],
					'note'=>$_POST['note'],
					'birthday'=>$_POST['birthday'],
					'job'=>$_POST['job'],
					'graduate_record'=>$_POST['graduate_record'],
					'work_section'=>$_POST['work_section'],
					'part_time'=>$_POST['part_time'],
					'academic_name'=>$_POST['academic_name'],
					'graduated_doctor'=>$_POST['graduated_doctor'],
					'graduated_master'=>$_POST['graduated_master'],
					'school_doctor'=>$_POST['school_doctor'],
					'school_master'=>$_POST['school_master'],
					'study_branch'=> $_POST['option']
			));
			
			//var_dump($listreasercher);
			$id = $listreasercher;
			//echo $id;
				
			/*$studybranch = M("studybranch");
			$liststudybranch = $studybranch->add(array(
					'researcher_id'=>$id,
					'branch_name'=>$_POST['option']
			));*/
//新方法JS插入PRO
				$project = M("project");
 				$pro_num = $_POST['pro_num'];
 				for($i=1;$i<$pro_num+1;$i++){
 				$provalue = $_POST["pro$i"];
 				$result = $project->add(array('pro_name' => $provalue[0],
					'pro_from' => $provalue[1],
					'start_time' => $provalue[2],
					'end_time' => $provalue[3],
 					'give_money' => $provalue[4],
					'pro_position' =>$provalue[5],
 					'researcher_id'=>$id,));
  				}
				
//新方法JS插入cla			
			$course = M("course");
			$cla_num = $_POST['cla_num'];
			for($j=1;$j<$cla_num+1;$j++){
				$clavalue = $_POST["new$j"];
				$result = $course->add(array('course_name' => $clavalue[0],
					'time' => $clavalue[1],
					'study_time' => $clavalue[2],
					'object' => $clavalue[3],
					'people_sum' => $clavalue[4],
					'research_id'=>$id,)); 
			}
			
			
			
			$money = M("money");
			$listmoney1 = $money->add(array(
					'researcher_id'=>$id,
					'time' => $_POST['time1'],
					'plan_use' => $_POST['plan_use1'],
					'reality_use' => $_POST['reality_use1']
			));
			$listmoney2 = $money->add(array(
					'researcher_id'=>$id,
					'time' => $_POST['time2'],
					'plan_use' => $_POST['plan_use2'],
					'reality_use' => $_POST['reality_use2']
			));
			$listmoney3 = $money->add(array(
					'researcher_id'=>$id,
					'time' => $_POST['time3'],
					'plan_use' => $_POST['plan_use3'],
					'reality_use' => $_POST['reality_use3']
			));			
			$this->success("添加成功！");
			$this->redirect('researcherList');
		}
		else{
			echo "<script> alert('对不起，添加出错！');javascript:history.back(1);</script>";
		}
		$this->display();
	}
	
	public function allow(){
		$desid = $_GET['desid'];
		$this->assign('desid',$desid);
		Session::set('temp',$_GET['id']);
		$this->display();
	}

	public function setLogin(){
		$data['researcher_id'] = Session::get('temp');
		$data['username']= htmlentities(trim($_POST['username']));
		$data['password'] =htmlentities(trim($_POST['password']));
		if ($data['username'] != null & $data['password'] != null){
			$users = M("user");
			$result = $users-> where( 'username='.$data['username'])->select();
			if ($result){
				$this->error("此账户已经被分配，请改一个账户！");
			}else{
			//var_dump($data['username']);	
			$users->add($data);	
			$this->success("设置成功，已为此用户分配登陆权限！");
			$this->redirect('/Researcher/researcherList');
			}
		}else {
			$this->error("账号或密码不能分配为空，请重新填写！");
		}
		unset($_SESSION['temp']);
	}
	
	public function delete(){
		for ($i=0;$i<2;$i++){
			$id = $_GET['id'];		
			$researchers = M("researchers");
			$studybranch = M("studybranch");
			$project = M("project");
			$course = M("course");
			$money = M("money");
			$user = M("user");
			$researchers->where('id='.$id)->delete();
			$studybranch->where('researcher_id='.$id)->delete();
			$project->where('researcher_id='.$id)->delete();
			$course ->where('research_id='.$id)->delete();
			$money->where('researcher_id='.$id)->delete();
			$user->where('researcher_id='.$id)->delete();
			$this->success("删除成功！");
		}
		//var_dump($id);
		$this->redirect('Researcher/researcherList');
	}
}