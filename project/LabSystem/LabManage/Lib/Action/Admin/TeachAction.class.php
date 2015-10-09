<?php
/**
 *教学管理模块
 *注释格式
 */
class TeachAction extends Action
{

	/**********************************课程分配表**************************/
	
	public function ajhuo(){
		$table =new Model("Lesson_allocation");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['lab_number'] = trim($huoqu['option_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo1(){
		$table =new Model("Lesson_allocation");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['lab_name'] = trim($huoqu['option_name']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo2(){
		$table =new Model("Lesson_allocation");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['teacher_number'] = trim($huoqu['teacher_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo3(){
		$table =new Model("Lesson_allocation");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['teacher_name'] = trim($huoqu['teacher_name']);
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
    public function index ()
    {
        $form= new Model("Lesson_allocation");
		$list=$form->order('convert(lab_name using gbk)')->select();
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
    public function add()
    {
    	$form= new Model("Lab_info");
    	$list=$form->order('convert(name using gbk)')->select();
    	$this->assign('lab_list',$list);
    	$this->display();
    }
    public function insert()
    {
    	$lab_info= new Model("Lesson_allocation");
    	$lab_id['lab_name']=$_POST['lab_name'];
    	$lab_id['lab_number']=$_POST['lab_number'];
    	$lab_id['lesson_name']=$_POST['lesson_name'];
    	$lab_id['lesson_number']=$_POST['lesson_number'];
    	$lab_id['teacher_name']=$_POST['teacher_name'];
    	$lab_id['teacher_number']=$_POST['teacher_number'];
    	$lab_id['date']=$_POST['time'];
    	$info = $lab_info->add($lab_id);
    	//$this->success("添加成功");
    	$this->redirect('index');
    }
    public function delete()
    {
    	$lab_info = new Model("Lesson_allocation");
    	$lab_id['id']=$_GET['lab_id'];
    	//var_dump($_GET['lab_id']);
    	$info = $lab_info->where($lab_id)->delete();
    	$this->redirect('index');
    }
    public function query()
    {
    	$lab_info= new Model("Lesson_allocation");
    	$list=$lab_info->order('convert(lab_name using gbk)')->select();
    	$this->assign('list',$list);
    	$lab['teacher_number'] = $_GET['teacher_number'];
    	$lab['teacher_name'] = $_GET['teacher_name'];
    	$lab_list= $lab_info->where($lab)->select();
    	//$this->assign("lab_inf",$lab_list);
    	//var_dump($lab_list["teacher_name"]);
    	if($lab_list[0]['teacher_name']!=null){
    		$this->assign("lab_inf",$lab_list);
    		$this->display();
    	}else{
    		$lab1['lab_number'] = $_GET['option_number'];
    		$lab1['teacher_number'] = $_GET['teacher_number'];
    		$lab1['_logic'] = 'OR';
    		$lab_list1= $lab_info->where($lab1)->select();
    		$this->assign("lab_inf1",$lab_list1);
    		$this->display();
    	}
    }
    public function redact()
    {
    	$form= new Model("Lab_info");
    	$list=$form->order('convert(name using gbk)')->select();
    	$this->assign('lab_list',$list);
    	$lab_info= new Model("Lesson_allocation");
    	$lab_id['id']=$_GET['lab_id'];
    	//var_dump($lab_id);
    	$info = $lab_info->where($lab_id)->select();
    	$this->assign("info",$info);
    	$this->display();
    }
	public function save()
	{
		$lab_info= new Model("Lesson_allocation");
		$lab['id'] = $_POST['lab_id'];
		$lab_id['lab_name']=$_POST['lab_name'];
		$lab_id['lab_number']=$_POST['lab_number'];
		$lab_id['lesson_name']=$_POST['lesson_name'];
		$lab_id['lesson_number']=$_POST['lesson_number'];
		$lab_id['teacher_name']=$_POST['teacher_name'];
		$lab_id['teacher_number']=$_POST['teacher_number'];
		$info = $lab_info->where($lab)->save($lab_id);
		//$this->success("添加成功");
		$this->redirect('index');
	}
	
/******************************************实验课项目*********************/	
	
	public function project()
	{
		$form= new Model("Lesson_project");
		$lesson_info = new Model("Lesson_info");
		
		$lis  =$lesson_info ->order('convert(lesson_name using gbk)')->select();
		$list=$lesson_info->join('lesson_project ON lesson_project.class_number = lesson_info.lesson_number')->order('convert(lab_name using gbk)')->select();
		$this->assign('list',$list);
		$this->assign('lis',$lis);
		import("ORG.Util.Page"); //导入分页类
		$count = $form->count();    //计算总数
		$p = new Page ( $count, 20);
		$list1 = $form->join('lesson_info ON lesson_info.lesson_number = lesson_project.class_number')->limit($p->firstRow.','.$p->listRows)->select();
		//var_dump($list1);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->assign ( "list1", $list1 );
		$this->display();
	}
	public function ajhuo4(){
		$table =new Model("Lesson_project");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['class_number'] = trim($huoqu['lesson_name']);
		$this ->ajfan1($table , $zui);
	}
	public function ajhuo5(){
		$table =new Model("Lesson_project");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['lesson_project']);
		$this ->ajfan1($table , $zui);
	}
	public function ajhuo6(){
		$table =new Model("Lesson_project");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['teacher_name'] = trim($huoqu['lesson_teacher']);
		$this ->ajfan1($table , $zui);
	}
	public function ajhuo17(){
		$table =new Model("lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['lab_name']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo18(){
		$table =new Model("lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['lab_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajfan1($table , $zui){
		$result = $table ->join('lesson_info ON lesson_info.lesson_number = lesson_project.class_number')-> where($zui) ->select();
		if(empty($result)){
			$this->ajaxReturn('','',0);
		}else{
			$this->ajaxReturn($result,'',1);
		}
	}
	public function delete1()
	{
		$lab_info = new Model("Lesson_project");
		$lab_id['lesson_id']=$_GET['lab_id'];
		//var_dump($_GET['lab_id']);
		$info = $lab_info->where($lab_id)->delete();
		$this->redirect('project');
	}
	public function project_add()
	{
		$form= new Model("Lab_info");
		$lesson_info = new Model("Lesson_info");
		$list=$form->order('convert(name using gbk)')->select();
		
		
		$lis  =$lesson_info ->order('convert(lesson_name using gbk)')->select();
		$this->assign('lis',$lis);
		$this->assign('lab_list',$list);
		$this->display();
	}
	public function project_insert()
	{
		$lab_info= new Model("Lesson_project");
		$lab_id['lab_name']=$_POST['lab_name'];
		$lab_id['lab_number']=$_POST['lab_number'];
		$lab_id['number']=$_POST['number'];
		$lab_id['class_number']=$_POST['lesson_name'];
		$lab_id['name']=$_POST['name'];
		$lab_id['character']=$_POST['character'];
		$lab_id['teacher_name']=$_POST['teacher_name'];
		$lab_id['period']=$_POST['period'];
		$lab_id['date']=$_POST['time'];
		//var_dump($lab_id);
		$info = $lab_info->add($lab_id);
		//$this->success("添加成功");
		$this->redirect('project');
	}
	public function project_redact()
	{
		$form= new Model("Lab_info");
		$lab_info= new Model("Lesson_project");
		$lab_type= new Model("Lesson_info");
		$list12=$form->order('convert(name using gbk)')->select();
		$lab_id=$_GET['lab_id'];
		//var_dump($_GET['lab_id']);
		$list = $lab_type->select();
		$info = $lab_info->join('lesson_info ON lesson_info.lesson_number = lesson_project.class_number')->where('lesson_project.lesson_id='.$lab_id)->select();
		//$info = $lab_info->where($lab_id)->select();
		$this->assign("info",$info);
		$this->assign("lab_id",$lab_id);
		$this->assign("list",$list);
		$this->assign('lab_list',$list12);
		$this->display();
	}
	public function project_xiugai()
	{
		$lab_info= new Model("Lesson_project");
		$lab['lesson_id'] = $_POST['lab_id'];
		$lab_id['lab_name']=$_POST['lab_name'];
		$lab_id['name']=$_POST['name'];
		$lab_id['class_number']=$_POST['lesson_name'];
		$lab_id['period']=$_POST['period'];
		$lab_id['teacher_name']=$_POST['teacher_name'];
		$lab_id['character']=$_POST['character'];
		$info = $lab_info->where($lab)->save($lab_id);
		//$this->success("添加成功");
		$this->redirect('project');
	}
	public function project_query()
	{
		$form= new Model("Lesson_project");
		$lesson_info = new Model("Lesson_info");
		$lis  =$lesson_info ->order('convert(lesson_name using gbk)')->select();
		$list=$lesson_info->join('lesson_project ON lesson_project.class_number = lesson_info.lesson_number')->order('convert(lab_name using gbk)')->select();
		$this->assign('list',$list);
		$this->assign('lis',$lis);
		$lab['class_number'] = $_GET['lesson_name'];
		$lab['teacher_name'] = $_GET['lesson_teacher'];
		$lab['_logic'] = 'OR';
		$lab_list= $form->join('lesson_info ON lesson_info.lesson_number = lesson_project.class_number')->where($lab)->select();
		//var_dump($lab_list);
		//$this->assign("lab_inf",$lab_list);
		//var_dump($lab_list["teacher_name"]);
		//var_dump($lab_list[0]['teacher_name']);
		
			$this->assign("lab_inf",$lab_list);
			$this->display();
	}

/**********************************出勤考察 *****************************/	
	public function allocation()
	{
		$form= new Model("Lesson_cheching");
		$lesson_info = new Model("Lesson_info");
		$lesson_project = new Model("Lesson_project");
		$lis  =$lesson_info ->order('convert(lesson_name using gbk)')->select();
		$list  =$lesson_project ->order('convert(name using gbk)')->select();
		//$list1=$form->join('lesson_info ON lesson_info.lesson_number = lesson_cheching.class_number')->join('lesson_project ON lesson_project.number = lesson_cheching.progect_number')->order('convert(teacher_name using gbk)')->select();
		$list1  =$form ->order('convert(teacher_name1 using gbk)')->select();
		//var_dump($list);
		$this->assign('list1',$list1);
		$this->assign('list',$list);
		$this->assign('lis',$lis);
		import("ORG.Util.Page"); //导入分页类
		$count = $form->count();    //计算总数
		$p = new Page ( $count, 20);
		$list2=$form->join('lesson_info ON lesson_info.lesson_number = lesson_cheching.class_number')->join('lesson_project ON lesson_project.number = lesson_cheching.progect_number')->limit($p->firstRow.','.$p->listRows)->select();
		//var_dump($list1);
		$page = $p->show ();
		$this->assign ( "page", $page );
		$this->assign ( "list2", $list2);
		$this->display();
	}
	public function cheching_add()
	{
		$lesson_info = new Model("Lesson_info");
		$lab_info= new Model("Lab_info");
		$project_info= new Model("Lesson_project");
		$lis  =$lesson_info ->order('convert(lesson_name using gbk)')->select();
		$lab_list=$lab_info->order('convert(name using gbk)')->select();
		$pro_list=$project_info->order('convert(name using gbk)')->select();
		//var_dump($lab_list[0]['name']);
		$this->assign('lis',$lis);
		$this->assign('lab_list',$lab_list);
		$this->assign('project_list',$pro_list);
		$this->display();
	}
	public function ajhuo7(){
		$table =new Model("lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['lab_name']);
		$this ->ajfan2($table , $zui);
	}
	public function ajhuo8(){
		$table =new Model("lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['lab_number']);
		$this ->ajfan2($table , $zui);
	}
	
	public function ajhuo15(){
		$table =new Model("lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['name'] = trim($huoqu['lab_name']);
		$this ->ajfan($table , $zui);
	}
	public function ajhuo16(){
		$table =new Model("lab_info");
		$huoqu = array_merge($_GET ,$_POST);
		$zui['number'] = trim($huoqu['lab_number']);
		$this ->ajfan($table , $zui);
	}
	public function ajfan2($table , $zui){
		$result = $table -> where($zui) ->select();
		if(empty($result)){
			$this->ajaxReturn('','',0);
		}else{
			$this->ajaxReturn($result,'',1);
		}
	}
	public function cheching_insert()
	{
		$form= new Model("Lesson_cheching");
		$cheching['class_number'] = $_POST['lesson_name'];
		$cheching['progect_number'] = $_POST['project_name'];
		$cheching['class'] = $_POST['class'];
		$cheching['class_time'] = $_POST['lesson_time'];
		$cheching['teacher_name'] = $_POST['teacher_name1'];
		$cheching['cheching_date'] = $_POST['lesson_date'];
		$cheching['monitor'] = $_POST['monitor'];
		$cheching['attendence'] = $_POST['attendence'];
		$cheching['absence'] = $_POST['absence'];
		$cheching['remark'] = $_POST['remark'];
		$cheching['lab_name'] = $_POST['lab_number'];
		$cheching['lab_number'] = $_POST['lab_name'];
		//var_dump($cheching);
		$info = $form->add($cheching);
		//$this->success("添加成功");
		$this->redirect('allocation');
	}
	public function cheching_delete()
	{
		$lab_info = new Model("Lesson_cheching");
		$lab_id['cheching_id']=$_GET['lab_id'];
		//var_dump($_GET['lab_id']);
		$info = $lab_info->where($lab_id)->delete();
		$this->redirect('allocation');
	}
	public function cheching_query()
	{
		$form= new Model("Lesson_cheching");
		$lesson_info = new Model("Lesson_info");
		$lesson_project = new Model("Lesson_project");
		$lis  =$lesson_info ->order('convert(lesson_name using gbk)')->select();
		$list  =$lesson_project ->order('convert(name using gbk)')->select();
		//$list1=$form->join('lesson_info ON lesson_info.lesson_number = lesson_cheching.class_number')->join('lesson_project ON lesson_project.number = lesson_cheching.progect_number')->order('convert(teacher_name using gbk)')->select();
		$list1  =$form ->order('convert(teacher_name1 using gbk)')->select();
		//var_dump($list);
		$this->assign('list1',$list1);
		$this->assign('list',$list);
		$this->assign('lis',$lis);
		$lab1['lesson_cheching.class_number'] = $_GET['lesson_name'];
		$lab2['teacher_name1'] = $_GET['lesson_teacher'];
		$lab_class['class'] = $_GET['class'];
		
		//var_dump($lab1['class_number']);	
		//var_dump($lab2['teacher_name1']);
		//var_dump($lab_class['class']);
		
		
		$list_class=$form->join('lesson_info ON lesson_info.lesson_number = lesson_cheching.class_number')->join('lesson_project ON lesson_project.number = lesson_cheching.progect_number')->where($lab_class)->select();
		//print_r($list_class);return;
		$list3=$form->join('lesson_info ON lesson_info.lesson_number = lesson_cheching.class_number')->join('lesson_project ON lesson_project.number = lesson_cheching.progect_number')->where($lab1)->select();
		$list2=$form->join('lesson_info ON lesson_info.lesson_number = lesson_cheching.class_number')->join('lesson_project ON lesson_project.number = lesson_cheching.progect_number')->where($lab2)->select();
		//var_dump($list_class[0]['teacher_name1']);
		if($list_class[0]['teacher_name1']==$_GET['lesson_teacher'] && $list_class[0]['class_number']==$_GET['lesson_name']){
			$this->assign("list_number1",$list_class);
		}else{
			$this->assign("list_number2",$list3);
			$this->assign("list_number3",$list2);
			$this->display();
		}
		
	}
	public function cheching_redact()
	{
		$cheching_id['cheching_id'] = $_GET['lab_id'];
		$form= new Model("Lesson_cheching");
		$lesson_info = new Model("Lesson_info");
		$lab_info= new Model("Lab_info");
		$project_info= new Model("Lesson_project");
		$lis  =$lesson_info ->order('convert(lesson_name using gbk)')->select();
		$lab_list=$lab_info->order('convert(name using gbk)')->select();
		$pro_list=$project_info->order('convert(name using gbk)')->select();
		//var_dump($lab_list[0]['name']);
		$this->assign('lis',$lis);
		$this->assign('lab_list',$lab_list);
		$this->assign('project_list',$pro_list);
		//$list3 = $form->where($cheching_id)->select();
		//var_dump($list3);
		//$this->assign ( "list_cheching", $list3);
		$list2=$form->join('lesson_info ON lesson_info.lesson_number = lesson_cheching.class_number')->join('lesson_project ON lesson_project.number = lesson_cheching.progect_number')->where($cheching_id)->select();
		//var_dump($list2[0]['lab_name']);
		
		$this->assign ( "list1", $list2);
		$this->display();
	}
// 	public function ajhuo9(){
// 		$table =new Model("Lesson_cheching");
// 		$huoqu = array_merge($_GET ,$_POST);
// 		$zui['class_number'] = trim($huoqu['lesson_name']);
// 		$this ->ajfan3($table , $zui);
// 	}
// 	public function ajhuo10(){
// 		$table =new Model("Lesson_cheching");
// 		$huoqu = array_merge($_GET ,$_POST);
// 		$zui['project_number'] = trim($huoqu['lesson_project']);
// 		$this ->ajfan3($table , $zui);
// 	}
// 	public function ajhuo11(){
// 		$table =new Model("Lesson_cheching");
// 		$huoqu = array_merge($_GET ,$_POST);
// 		$zui['teacher_name1'] = trim($huoqu['lesson_teacher']);
// 		$this ->ajfan3($table , $zui);
// 	}
// 	public function ajhuo12(){
// 		$table =new Model("Lesson_cheching");
// 		$huoqu = array_merge($_GET ,$_POST);
// 		$zui['class'] = trim($huoqu['class']);
// 		$this ->ajfan3($table , $zui);
// 	}
// 	public function ajhuo13(){
// 		$table =new Model("Lesson_cheching");
// 		$huoqu = array_merge($_GET ,$_POST);
// 		$zui['monitor'] = trim($huoqu['monitor']);
// 		$this ->ajfan3($table , $zui);
// 	}
	public function ajfan3($table , $zui){
		$table= new Model("Lesson_cheching");
		$result = $table -> where($zui) ->select();
		//var_dump($result);
		if(empty($result)){
			$this->ajaxReturn('','',0);
		}else{
			$this->ajaxReturn($result,'',1);
		}
	}
	public function cheching_xiugai()
	{
		$lab_info= new Model("Lesson_cheching");
		$cheching1['cheching_id'] = $_POST['cheching_id'];
		$cheching['class_number'] = $_POST['lesson_name'];
		$cheching['progect_number'] = $_POST['project_name'];
		$cheching['class'] = $_POST['class'];
		$cheching['class_time'] = $_POST['lesson_time'];
		$cheching['teacher_name1'] = $_POST['teacher_name'];
		$cheching['cheching_date'] = $_POST['lesson_date'];
		$cheching['monitor'] = $_POST['monitor'];
		$cheching['attendence'] = $_POST['attendence'];
		$cheching['absence'] = $_POST['absence'];
		$cheching['remark'] = $_POST['remark'];
		$cheching['lab_name'] = $_POST['lab_number'];
		$cheching['lab_number'] = $_POST['lab_name'];
		var_dump($cheching);
		$info = $lab_info->where($cheching1)->save($cheching);
		//$this->success("添加成功");
		$this->redirect('allocation');
	}
}