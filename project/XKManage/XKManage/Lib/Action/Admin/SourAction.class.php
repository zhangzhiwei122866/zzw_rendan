<?php
/**
     * @author hjq
     * @version 2013-4-19
 */
class SourAction extends Action
{
	public function sourList()
	{
		$form = D("researchers");
		$form1 = D("project");
		$form2 = D("studybranch");
		$con= $_GET['study_branch'];
		$jiao = "教授";
		$fujiao = "副教授";
		$boshi = "博士";
		$shuoshi ="硕士";
		import("ORG.Util.Page"); //导入分页类
		$list= $form2 -> where('branch_id='.$con)->select();
		foreach ($list as $key=>$val){}
		$branch_id = $val['branch_id'];
		$count4 = $form->where('study_branch='.$branch_id)->count();  
		$p = new Page ( $count4, 10);
		$list2=$form->where('study_branch='.$branch_id)->limit($p->firstRow.','.$p->listRows)->findAll();
		$s = 0;
		
		foreach ($list2 as $key=>$nihao){
			$mon1 = 0;
			$id[$s] = $nihao['id'];
			$count[$s] = $form1-> where('researcher_id='.$id[$s])->count();
			$money = $form1->where('researcher_id='.$id[$s])->findAll();
			foreach ($money as $key => $mon)
			{
				$mon1 = $mon['give_money'] + $mon1;
			}
			$money1[$s] =$mon1;
			$s++;
		}
		$n = count($list2);$jia=0;$fujia=0;$bosh=0;$shuosh=0;
		for($i = 0; $i< $n ; $i++){
			if($list2[$i]['position'] == $jiao){$jia = $jia +1;}
			if($list2[$i]['position'] == $fujiao){$fujia = $fujia +1;}
			if($list2[$i]['degree'] == $boshi){$bosh = $bosh +1;}
			if($list2[$i]['degree'] == $shuoshi){$shuosh = $shuosh +1;}
		}
		$p->setConfig('header', '条记录');//共有多少条记录
		$p->setConfig('prev', "上一页");//上一页
		$p->setConfig('next', '下一页');//下一页
		$p->setConfig('first', '<<');//第一页
		$p->setConfig('last', '>>');//最后一页
		$page = $p->show();                        //分页的导航条的输出变量
		$this->assign("page", $page);

		$this->assign ( "jia", $jia );
		$this->assign ( "fujia", $fujia );
		$this->assign ( "bosh", $bosh );
		$this->assign ( "shuosh", $shuosh );
		$this->assign ("study_branch", $con);
		$this->assign ( "list1", $list );
		$this->assign ( "list2", $list2 );
		$this ->assign("money1" , $money1);
		$this->assign("count" , $count);
		$this->display();
	}

	public function de()
	{
			$id = $_GET["id"];
			$branch_id = $_GET["study_branch"];
			$form = D("researchers");
			$form1 = D("project");
			$form2 = D("studybranch");
			$course = M("course");
			$money = M("money");
			$user = M("user");
			$form->where('id='.$id)->delete();
			$form1 ->where('research_id='.$id)->delete();
			$form2 ->where('research_id='.$id)->delete();
			$course ->where('research_id='.$id)->delete();
			$money->where('researcher_id='.$id)->delete();
			$user->where('researcher_id='.$id)->delete();
		$this->redirect('sourList',array('study_branch'=>$branch_id));
	}
}