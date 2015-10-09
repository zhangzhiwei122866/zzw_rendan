<?php
/**
     * @author 
     * @version 
 */
class XingzhengAction extends Action
{
	public function index()
	{
	
	/************按部门查询************/

		$form = M("Gov_department");
		$list = $form->findAll();
		//print_r($list["dep_name"]);
		$list1 = array_chunk($list,10);
		$this->assign("list",$list1);
		$this->assign("list_dep",$list);
	/*************按主题查询*************/	
		
		$form1 = M("Gov_dep_type");
		$list_type = $form1->findAll();
		//print_r($list["dep_name"]);
		$listty = array_chunk($list_type,10);
		$this->assign("list_type",$listty);
		
	/***********按部门查询对应的事项列表*************/	
		
		$form2 = M("Gov_dep_project");
		import("ORG.Util.Page"); //导入分页类
		$count = $form2->count();    //计算总数
		$p = new Page ( $count, 10);
		$list2 = $form2->limit($p->firstRow.','.$p->listRows)->join('gov_department ON gov_department.gd_id = gov_dep_project.dep_id')->order('gdp_id desc')->select();
		//var_dump($list2);
		$this->assign("project_list",$list2);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->display();
	}
	public function xiangxi()
	{
		/************按部门查询************/
		
		$form = M("Gov_department");
		$list = $form->findAll();
		//print_r($list["dep_name"]);
		$list1 = array_chunk($list,10);
		$this->assign("list",$list1);
		
		/*************按主题查询*************/
		
		$form1 = M("Gov_dep_type");
		$list_type = $form1->findAll();
		//print_r($list["dep_name"]);
		$listty = array_chunk($list_type,10);
		$this->assign("list_type",$listty);
		
		/***********按部门查询对应的事项列表*************/
		
		$gd_id=$_GET['gd_id'];
		$type_id=$_GET['type_id'];
		$form2 = M("Gov_dep_project");
		import("ORG.Util.Page"); //导入分页类
		$count = $form2->where(' dep_id='.$gd_id)->count();    //计算总数
		$p = new Page ( $count, 10);
		$list2 = $form2->limit($p->firstRow.','.$p->listRows)->join('gov_department ON gov_department.gd_id = gov_dep_project.dep_id')->where('dep_id='.$gd_id)->order('gdp_id desc')->select();
		$this->assign("project_list",$list2);
		$page = $p->show ();
		$this->assign ( "page", $page );
		
		/***********按zhuti查询对应的事项列表*************/
		
		$form3 = $form->where('dep_type='.$type_id)->select();
		foreach($form3 as $key=>$list_id)
		{
			$gd_type_id = $list_id['gd_id'];
			//$count1 = $form2->where('dep_id='.$gd_type_id)->count();    //计算总数
			//$p1 = new Page ( $count1, 10);
			$form4 = $form2->where('dep_id='.$gd_type_id)->select();
			//$page1 = $p->show ();
			//$this->assign ( "page1", $page1 );
			$hu = $list_id['dep_name'];
			$xx[$key] = $hu;
			foreach ($form4 as $key => $val)
			{
				$xx[$hu][$key] = $val['project_title'];
			}
		}
		$this->assign("project_list1",$xx);
// 		echo "<pre>";
// 		print_r($xx);
// 		echo "</pre>";
		$this->display();
	}
	public function xiangxi1()
	{
		/************按部门查询************/
		$dep_id = $_SERVER["QUERY_STRING"][7];
		$dep_id1 = $_SERVER["QUERY_STRING"][8];
		//echo $dep_id1;
		$form = M("Gov_department");
		$list = $form->findAll();
		//print_r($list["dep_name"]);
		$list1 = array_chunk($list,10);
		$this->assign("list",$list1);
		$this->assign("list_dep",$list);
		/*************按主题查询*************/
		
		$form1 = M("Gov_dep_type");
		$list_type = $form1->findAll();
		//print_r($list["dep_name"]);
		$listty = array_chunk($list_type,10);
		$this->assign("list_type",$listty);
		
		/***********按部门查询对应的事项列表*************/
		
		$form2 = M("Gov_dep_project");
		import("ORG.Util.Page"); //导入分页类
		$count = $form2->count();    //计算总数
		$count1 = $form2->where("dep_id=".$dep_id)->count();
		$p = new Page ( $count, 10);
		$p1 = new Page ( $count1, 10);
		$list2 = $form2->limit($p->firstRow.','.$p->listRows)->join('gov_department ON gov_department.gd_id = gov_dep_project.dep_id')->order('gdp_id desc')->select();
		//var_dump($list2);
		$list3 = $form2->limit($p1->firstRow.','.$p1->listRows)->join('gov_department ON gov_department.gd_id = gov_dep_project.dep_id')->where("dep_id=".$dep_id)->order('gdp_id desc')->select();
		//var_dump($list2);
		$list4 = $form2->limit($p1->firstRow.','.$p1->listRows)->join('gov_dep_table_download ON gov_dep_table_download.dep_id = gov_dep_project.dep_id')->where("gov_dep_project.dep_id=".$dep_id1)->select();
		$this->assign("project_list",$list2);
		$this->assign("dep_li",$list3);
		$this->assign("table_li",$list4);
		$page = $p->show ();
		$page1 = $p1->show ();
		$this->assign ( "page", $page );
		$this->assign ( "page1", $page1 );
		$this->display();
	}
}