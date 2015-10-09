<?php
/**
     * @author hjq
     * @version 2013-4-19
 */
class KeyDisciplineAction extends Action
{
	public function keyDiscipline()
	{
		/*Discipline表查询*/	
		$disciplineid = $_GET['desid'];
		Session::set('destest',$disciplineid);
		//var_dump($disciplineid);
		$form = D("discipline");
		$list=$form-> where('des_id='.$disciplineid)->findAll();
		$this->assign ( "list", $list );
		
		/********权限user*********/
		 $formuser=D("user");
		$ID['id'] = $_SESSION['user_id'];
		$listuser=$formuser->where($ID)->find();
		$power = $listuser['power'];
		$this->assign ( "power", $power );
		/***********统计时间time***********/
	    $formtime1=D("time");
		$listtime=$formtime1->where('des_id='.$disciplineid)->select();
		$this->assign ( "listtime", $listtime );
		
		/*time 表查询  lhy*/
		$formtime = D('time');
		$listime=$formtime->where('des_id='.$disciplineid)->select();
		$this->assign ( "listime", $listime );
		
		/*******科学研究science_study*******/
		$formstudy=D("science_study");
		$liststudy=$formstudy->where('des_id='.$disciplineid)->select();
		$this->assign ( "liststudy", $liststudy );
		
		
		/*Science_study表查询*/
		$Formtscistudy=M('science_study');
		$listscistudy=$Formtscistudy->where('des_id='.$disciplineid)->select();
		$this->assign ( "listscistudy", $listscistudy );
		
		/*********学术队伍**********/
     	$formtroops=D("academin_troops");
		$listtroops=$formtroops->where('des_id='.$disciplineid)->select();
		$this->assign ( "listtroops", $listtroops );
		
		/*academin_troops表查询*/
		$Formtroop=M('academin_troops');
		$listroops=$Formtroop->where('des_id='.$disciplineid)->select();
		$this->assign ( "listroops", $listroops );
		
		/*researchers表查询 lhy */
		$Formresear=M('researchers');
		$listresear=$Formresear->where('leader=1 AND des_id='.$disciplineid)->select();
		$this->assign ( "listresear", $listresear );
		//var_dump($listresear);
		
		$listresear1=$Formresear->where('des_id='.$disciplineid)->select();
		$this->assign ( "listresear1", $listresear1 );
		
		/*Money表查询*/
		$Formmoney=M('Money');
		$listmoney=$Formmoney->where('des_id='.$disciplineid)->select();
		$this->assign ( "listmoney", $listmoney);	
		
		$this->display();
		}
	public function edit()
	{
		$disciplineid = $_GET['desid'];
		Session::set('destest',$disciplineid);
		
		/*Discipline表查询*/
		$form = D("discipline");
		$disciplineid = $_SESSION['destest'];
		$this->assign('dess',$disciplineid);
		$list=$form-> where('des_id='.$disciplineid)->findAll();
		$this->assign ( "list", $list );
		
		/*time 表查询*/
		$formtime = D('time');
		$listime=$formtime->where('des_id='.$disciplineid)->select();
		$this->assign ( "listime", $listime );
		
		/*Money表查询*/
		$Formmoney=M('Money');
		//var_dump($disciplineid);
		$listmoney=$Formmoney->where('des_id='.$disciplineid)->select();
		//var_dump($listmoney);
		$this->assign ( "listmoney", $listmoney);

		/*academin_troops表查询*/
		$Formtroops=M('academin_troops');
		$listroops=$Formtroops->where('des_id='.$disciplineid)->select();
		$this->assign ( "listroops", $listroops );
		
		/*researchers表查询 */
		$Formresear=M('researchers');
		$listresear=$Formresear->where('leader=1 AND des_id='.$disciplineid)->select();
		//var_dump($listresear);
		$this->assign ( "listresear", $listresear );
	
		$listresear1=$Formresear->where('des_id='.$disciplineid)->select();
		//var_dump($listresear1);
		$this->assign ( "listresear1", $listresear1 );
		
		/*Science_study表查询*/
		$Formtscistudy=M('science_study');
		$listscistudy=$Formtscistudy->where('des_id='.$disciplineid)->select();
		$this->assign ( "listscistudy", $listscistudy );
		
		$this->display();
	}
	
	public function update()
    {
    	$disciplineid = $_SESSION['destest'];
    	$data = M("discipline");
    	var_dump($_POST['option']);
    	$list = $data->where('des_id='.$disciplineid)->save(array(
    			'des_rank' => $_POST['rank'],
    			'is_doctor'=>$_POST['is_doctor'],
    			'is_master'=>$_POST['is_master'],
    			'is_pro_key'=>$_POST['is_pro_key'],
    			'ishave_pro_teach_job'=>$_POST['ishave_pro_teach_job'],
    			'ishave_pro_key_lab'=>$_POST['ishave_pro_key_lab'],
    			'ishave_pro_base'=>$_POST['ishave_pro_base'],
    			'get_doctor'=>$_POST['get_doctor'],
    			'give_doctor_degree'=>$_POST['give_doctor_degree'],
    			'get_academic_master'=>$_POST['get_academic_master'],
    			'get_professional_master'=>$_POST['get_professional_master'],
    			'give_academic_master'=>$_POST['give_academic_master'],
    			'give_professional_master'=>$_POST['give_professional_master'],
    			'get_pro_teach_prize'=>$_POST['get_pro_teach_prize'],
    			'publish_book'=>$_POST['publish_book'],
    			'key_magazine_public'=>$_POST['key_magazine_public'],
    			'publish_monographs'=>$_POST['publish_monographs'],
    			'get_pro_prize'=>$_POST['get_pro_prize'],
    			'hold_intl_meeting'=>$_POST['hold_intl_meeting'],
    			'hold_inland_meeting'=>$_POST['hold_inland_meeting'],
    			'join_out_meeting'=>$_POST['join_out_meeting'],
    			'join_in_meeting'=>$_POST['join_in_meeting'],
    			'go_scholar'=>$_POST['go_scholar'],
    			'get_outland_scholar'=>$_POST['get_outland_scholar'],
    			'inland_scholar'=>$_POST['inland_scholar'],
    			'get_inland_scholar'=>$_POST['get_inland_scholar'],
    			'cod_project'=>$_POST['cod_project'],
    			'co_project'=>$_POST['co_project'],
    			'store_books'=>$_POST['store_books'],
    			'have_magazine'=>$_POST['have_magazine'],
    			'facility_value'=>$_POST['facility_value'],
    			'school_give_money'=>$_POST['school_give_money'],
    			'pro_give_money'=>$_POST['pro_give_money'],
    			'other_give_money'=>$_POST['other_give_money'],
    			'start_time'=>$_POST['start_time'],
    			'end_time'=>$_POST['end_time'],
    			'des_name'=>$_POST['des_name'],
    			'des_no'=>$_POST['des_no']
    			));
    			
    	/*Money*/
    	$datamoney = M("money");
    	$n=0;$i=0;
		$money = M("money");
		$mon = $money->where('des_id='.$disciplineid)->select();	
		foreach ($mon as $key=>$val){
			$money_id[$n] = $val['money_id'];
			$listmoney = $money->where('des_id='.$disciplineid.' AND money_id='.$money_id[$n])->save(array(
					'time' => $_POST['time'][$i],
					'plan_use' => $_POST['plan_use'][$i],
					'reality_use' => $_POST['reality_use'][$i],
			));
			$n++;$i++;
		}

    	/*academin_troops更新*/
    	$datatroops = M("academin_troops");
    	$listtroop = $datatroops->where('des_id='.$disciplineid)->save(array(
    			'professor'=>$_POST['professor'],
    			'associate_professor'=>$_POST['associate_professor'],
    			'lecturer'=>$_POST['lecturer'],
    			'yuanshi'=>$_POST['yuanshi'],
    			'special_professor'=>$_POST['special_professor'],
    			'docter'=>$_POST['docter'],
    			'master'=>$_POST['master']
    			));
    	
    	/*time更新*/
    	$datatime = M("time");
    	$listime = $datatime->where('des_id='.$disciplineid)->save(array(
    			'basic_time'=>$_POST['basic_time'],
    			'study_troop'=>$_POST['study_troop'],
    			'science_study_start'=>$_POST['science_study_start'],
    			'science_study_end'=>$_POST['science_study_end'],
    			'science_study_end2'=>$_POST['science_study_end2'],
    			'people_start'=>$_POST['people_start'],
    			'people_end'=>$_POST['people_end'],
    			'chat_start'=>$_POST['chat_start'],
    			'chat_end'=>$_POST['chat_end'],
    			'now1'=>$_POST['now1'],
    			'now_start'=>$_POST['now_start'],
    			'now_end'=>$_POST['now_end'],	
    	));
    	
    	/*researchers表更新*/
    	$datareasear = M('researchers');
    	$findtheleader = $datareasear->where('id='.$_POST['option'])->select();
    	$all = $datareasear->where('des_id='.$disciplineid)->select();
    	$dat['leader']= 1;
    	if($findtheleader != NULL){
    		foreach($all as $key=>$val)
    		{
    			$all[$key]['leader'] = 0;
    			$datareasear->save($all[$key]);
    		}
    		$listreaser = $datareasear->where('id='.$_POST['option'])->save($dat);
    	}

    	/*Science_study更新*/
    	$datastudy = M('Science_study');
    	$liststudy = $datastudy->where('des_id='.$disciplineid)->save(array(
    			'core_article'=>$_POST['core_article'],
    			'sci'=>$_POST['sci'],
    			'publish_article'=>$_POST['publish_article'],
    			'national_award'=>$_POST['national_award'],
    			'province_award'=>$_POST['province_award'],
    			'other_award'=>$_POST['other_award'],
    			'own_invent_patent'=>$_POST['own_invent_patent'],
    			'science_result'=>$_POST['science_result'],
    			'direct_economy'=>$_POST['direct_economy'],
    			'all_science_funds'=>$_POST['all_science_funds'],
    			'year_average'=>$_POST['year_average'],
    			'over_national_science_education'=>$_POST['over_national_science_education'],
    			'over_national_socity_project'=>$_POST['over_national_socity_project'],
    			'over_other_national_project'=>$_POST['over_other_national_project'],
    			'over_local_govermment_project'=>$_POST['over_local_govermment_project'],
    			'over_company_project'=>$_POST['over_company_project'],
    			'in_national_science_education'=>$_POST['in_national_science_education'],
    			'in_national_socity_project'=>$_POST['in_national_socity_project'],
    			'in_other_national_project'=>$_POST['in_other_national_project'],
    			'in_local_govermment_project'=>$_POST['in_local_govermment_project'],
    			'in_company_project'=>$_POST['in_company_project'],
    			'in_have_project_funds'=>$_POST['in_have_project_funds'],
    			'person_average'=>$_POST['person_average']
    			));
    	
   
    if( $list!=0|$listmoney!=0|$listtroop!=0|$listmoney!=0|$listreaser!=0|$liststudy!=0|$listime!=0){
    		$this->success("修改保存成功！");
    		$this->redirect('/KeyDiscipline/edit/', array('cate_id'=>2), 3,'修改成功，页面跳转中');
    	}else{    		
    		$this->error("修改失败");
    	}
    }
    
	function basic(){
		$this->display();
	}
}