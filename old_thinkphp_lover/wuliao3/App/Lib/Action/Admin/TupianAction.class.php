<?php
class TupianAction extends Action
{
	public function tupian(){
		$result = "添加图片";
		$this->assign(result,$result);
		$this->display();
	}
	public function chakan(){
		$img = M('img');
		$result = $img -> select();
		$this->assign(result,$result);
		$this->display();
	}
	public function  shanchu(){
		$img = M('img');
		$huoqu = array_merge($_GET,$_POST);
		$id = $huoqu['shan'];
		$result = $img ->where("id='+$id+'") -> delete(); 
		$this->ajaxReturn('','成功',1);
		
	}
}