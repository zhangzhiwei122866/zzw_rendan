<?php
class IndexAction extends Action{
public function index(){
	$ip = get_client_ip();
	$xue = M("xue");
	$result = $xue -> where("ip='"+$ip+"'") -> select();
	if ($result['zidong'] == 1){
		$_SESSION['name'] = $result['user'];
		$this->assign('jumpUrl','index/shou');;
	}else {
		$this->display();
	}
	
}
public function shou(){
	$this->jiance();
	$this->display();

}
public function demo(){

	$this->display();

}
public function demo1(){

	$this->display();

}
public function demo2(){

	$this->display();

}
public function readme(){

	$this->display();

}
public function jiance(){
// 	if(!isset($_SESSION['name'])) {
// 		$this->assign('jumpUrl','index/index');
// 		$this->error('没有登录');
// 	}
}
public function tuichu(){

		unset($_SESSION);
		$_SESSION['name'] = null;
		session('name',null);
		session_destroy();
		$this->assign('jumpUrl','U(../index/admin)');

	
}
public function denglu(){
	$user = M('xue');
	$huoqu = array_merge($_GET ,$_POST);
	if($huoqu['user'] == "" && $huoqu['pwd'] == ""){
		$this->ajaxReturn('','失败',2);
	}else{
		$branda['name'] = $huoqu['user'];
		$branda['password'] = $huoqu['pwd'];
		$result = $user->where($branda)->find();
		
		if($result['name'] == $branda['name'] ){
			$_SESSION['name'] = $result['name'];
			$brand['zidong'] = $huoqu['wunai'];
			$brand['ip'] = get_client_ip();
			$user ->where("id='".$result['id']."'")->save($brand);
			
			$this->ajaxReturn('','成功',0);
		}else{
			$this->ajaxReturn('','失败',1);
		}
	}
}	
}