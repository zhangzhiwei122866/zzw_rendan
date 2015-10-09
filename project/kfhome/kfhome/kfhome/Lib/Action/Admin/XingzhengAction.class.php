<?php
/**
     * @author 
     * @version 
 */
class XingzhengAction extends Action
{
	public function index()
	{
		$form =M("Gov_department");
		$form1 =M("Gov_dep_type");
		import("ORG.Util.Page"); //导入分页类
		$count = $form->count();    //计算总数
		$p = new Page ( $count, 10);
		$list2 = $form1->limit($p->firstRow.','.$p->listRows)->join('gov_department ON gov_department.dep_type = gov_dep_type.gdt_id')->order('gd_id desc')->select();
		//var_dump($list2);
		$this->assign("list",$list2);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->display();
	}
	public function add()
	{
		$form =M("Gov_dep_type");
		$list=$form->select();
		//$this->redirect('lab_allocation');
		$this->assign("list",$list);
		$this->display();
	}
	public function update()
	{
		$gd_id['gd_id']=$_GET["gd_id"];
		//var_dump($gd_id);
		$form =M("Gov_department");
		$form1 =M("Gov_dep_type");
		$list = $form1->join('gov_department ON gov_department.dep_type = gov_dep_type.gdt_id')->where($gd_id)->select();
		$list1 = $form1->select();
		$this->assign("list",$list);
		$this->assign("list1",$list1);
		$this->display();
	}
	public function delete()
	{
		$gd_id['gd_id']=$_GET["gd_id"];
		$form =M("Gov_department");
		$list = $form->where($gd_id)->delete();
		$this->redirect('index');
	}
	public function query()
	{
		$gd_id['gd_id']=$_POST["gd_id"];
		$form =M("Gov_department");
		
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//类型
		$upload->allowExts = explode(',','jpg');
		//设置附件上传目录
		$upload->savePath = './Public/File/';
		
		if (!$upload->upload()) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		}else{ // 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		$add['dep_logo'] =  $info[0]["savepath"].$info[0]["name"];
		$add['dep_name']=$_POST['dep_name'];
		$add['dep_type'] = $_POST['option'];
		$add['dep_url']=$_POST['dep_url'];
		$add['phone']=$_POST['phone'];
		$list=$form->where($gd_id)->save($add);
		$this->redirect('index');
	}
	public function zheng_add()
	{
		$form =M("Gov_department");
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//类型
		$upload->allowExts = explode(',','jpg');
		//设置附件上传目录
		$upload->savePath = './Public/File/';
		
		if (!$upload->upload()) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		}else{ // 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		//$data['dep_logo'] =  $info[0]["savepath"].$info[0]["name"];
		//保存当前数据对象
		$add['dep_logo'] =  $info[0]["savepath"].$info[0]["name"];
		$add['dep_name']=$_POST['dep_name'];
		$add['dep_type'] = $_POST['option'];
		$add['dep_url']=$_POST['dep_url'];
		$add['phone']=$_POST['phone'];
		$list=$form->add($add);
		$this->redirect('index');
	}
	public function check()
	{
		
	}
	public function type()
	{
		$form = M("gov_dep_type");
		import("ORG.Util.Page"); //导入分页类
		$count = $form->count();    //计算总数
		$p = new Page ( $count, 10);
		$list = $form->limit($p->firstRow.','.$p->listRows)->select();
		$this->assign("list",$list);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->display();
	}
	public function type_add()
	{
		$form =M("Gov_dep_type");
		$list=$form->select();
		//$this->redirect('lab_allocation');
		$this->assign("list",$list);
		$this->display();
	}
	public function type_zheng_add()
	{
		$form =M("Gov_dep_type");
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//类型
		$upload->allowExts = explode(',','jpg');
		//设置附件上传目录
		$upload->savePath = './Public/File/';
		
		if (!$upload->upload()) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		}else{ // 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		//$data['dep_logo'] =  $info[0]["savepath"].$info[0]["name"];
		//保存当前数据对象
		$add['type_logo'] =  $info[0]["savepath"].$info[0]["name"];
		$add['type_name']=$_POST['type_name'];
		$list=$form->add($add);
		$this->redirect('type');
	}
	public function type_delete()
	{
		$gd_id['gdt_id']=$_GET["gdt_id"];
		$form =M("Gov_dep_type");
		$list = $form->where($gd_id)->delete();
		$this->redirect('type');
	}
	public function type_update()
	{
		$gd_id['gdt_id']=$_GET["gdt_id"];
		//var_dump($gd_id);
		$form1 =M("Gov_dep_type");
		$list = $form1->where($gd_id)->select();
		$list1 = $form1->select();
		$this->assign("list",$list);
		$this->assign("list1",$list1);
		$this->display();
	}
	public function type_query()
	{
		$gd_id['gdt_id']=$_POST["gdt_id"];
		$form =M("Gov_department");
		
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//类型
		$upload->allowExts = explode(',','jpg');
		//设置附件上传目录
		$upload->savePath = './Public/File/';
		
		if (!$upload->upload()) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		}else{ // 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		$add['type_logo'] =  $info[0]["savepath"].$info[0]["name"];
		$add['type_name']=$_POST['type_name'];
		
		$list=$form->where($gd_id)->save($add);
		$this->redirect('type');
	}
	
	public function project()
	{
		$form = M("gov_dep_project");
		import("ORG.Util.Page"); //导入分页类
		$count = $form->count();    //计算总数
		$p = new Page ( $count, 10);
		$list = $form->join('gov_department ON gov_department.gd_id = gov_dep_project.dep_id')->limit($p->firstRow.','.$p->listRows)->select();
		$this->assign("list",$list);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->display();
	}
	public function project_delete()
	{
		$gd_id['gdp_id']=$_GET["gdp_id"];
		$form =M("Gov_dep_project");
		$list = $form->where($gd_id)->delete();
		$this->redirect('project');
	}
	public function project_add()
	{
		$form = M("gov_dep_project");
		$list = $form->join('gov_department ON gov_department.gd_id = gov_dep_project.dep_id')->select();
		$this->assign("list",$list);
		$this->display();
	}	
	public function project_zheng_add()
	{
		$form = M("gov_dep_project");
		$add['project_title']=$_POST['project_title'];
		$add['dep_id']=$_POST['dep_name'];
		$add['number']=$_POST['number'];
		$add['status']=$_POST['status'];
		$add['time']=$_POST['time'];
		$add['project_content']=$_POST['project_content'];
		$list = $form->add($add);
		$this->redirect('project');
	}
	public function project_update()
	{
		$gd_id['gdp_id']=$_GET["gdp_id"];
		$form =M("Gov_department");
		//var_dump($gd_id);
		$form1 =M("Gov_dep_project");
		$list = $form1->join('gov_department ON gov_department.gd_id = gov_dep_project.dep_id')->where($gd_id)->select();
		$list1 = $form1->select();
		$list2 = $form->select();
		$this->assign("list",$list);
		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->display();
	}
	public function project_query()
	{
		$form = M("gov_dep_project");
		$dep_id['gdp_id'] = $_POST['gdp_id'];
		$add['project_title']=$_POST['project_title'];
		$add['dep_id']=$_POST['dep_name'];
		$add['number']=$_POST['number'];
		$add['status']=$_POST['status'];
		$add['time']=$_POST['time'];
		$add['project_content']=$_POST['project_content'];
		$list = $form->where($dep_id)->save($add);
		$this->redirect('project');
	}
	public function table()
	{
		$form = M("gov_dep_table_download");
		$list = $form->join('gov_department ON gov_department.gd_id = gov_dep_table_download.dep_id')->join('gov_dep_project ON gov_dep_project.gdp_id = gov_dep_table_download.project_id')->select();
		$this->assign("list",$list);
		$this->display();
	}
	public function table_update()
	{
		$gd_id['gdtd_id']=$_GET["gd_id"];
		$form2 =M("Gov_department");
		//var_dump($gd_id);
		$form1 =M("Gov_dep_project");
		$form = M("gov_dep_table_download");
		$list = $form->join('gov_department ON gov_department.gd_id = gov_dep_table_download.dep_id')->join('gov_dep_project ON gov_dep_project.gdp_id = gov_dep_table_download.project_id')->where($gd_id)->select();
		$list1 = $form1->select();
		$list2 = $form2->select();
		$this->assign("list",$list);
		$this->assign("list1",$list1);
		$this->assign("list2",$list2);
		$this->display();
	}
	public function table_delete()
	{
		$gd_id['gdtd_id']=$_GET["gd_id"];
		$form =M("gov_dep_table_download");
		$list = $form->where($gd_id)->delete();
		$this->redirect('table');
	}
	public function table_query()
	{
		
	}
	public function table_add()
	{
		
	}
	
}
