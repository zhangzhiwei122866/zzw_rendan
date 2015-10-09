<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$this -> display();
    }
    public function getAjax(){
    	$user = M('xue');
    	$huoqu = array_merge($_GET ,$_POST);
    	$brand['name'] = $huoqu['user'];
    	$result = $user->where($brand)->find();
    	if($result['name'] == "" ){
    		$this->ajaxReturn('','注册成功',0);
    	}else{
    		$this->ajaxReturn('','用户已存在',1);
    	}
    }
    public function denglu(){
    	$user = M('xue');
    	$huoqu = array_merge($_GET ,$_POST);
    	if($huoqu['user'] == "" && $huoqu['pwd'] == ""){
    		$this->ajaxReturn('','失败',2);
    	}else{
    		$brand['name'] = $huoqu['user'];
    		$brand['password'] = $huoqu['pwd'];
    		$result = $user->where($brand)->find();
    		if($result['name'] == $brand['name'] ){
    			$this->ajaxReturn('','成功',0);
    		}else{
    			$this->ajaxReturn('','失败',1);
    		}	
    	}
    }
    public function zhuce(){
    	$this->display();
    }
    public function  dozhuce(){
    	$user = M('xue');
    	$huoqu = array_merge($_GET , $_POST);
    	$shuju['name'] = $huoqu['user'];
    	$shuju['password'] = $huoqu['pwd'];
    	$shuju['email'] = $huoqu['email'];
    	$shuju['seal'] = $huoqu['sex'];
    	$res = $user -> add($shuju);
    	if($res){
    		$this->ajaxReturn('',$res,1);
    	}else{
    		$this->ajaxReturn('',$res,0);
    	}
    }
}