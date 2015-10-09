<?php
session_start();
class PublicAction extends Action
{
    public function login ()
    {
        $this->display();
    }
    public function doLogin ()
    {
    	
       $data['number'] = htmlentities(trim($_POST['number']));
       $data['password'] = htmlentities(trim($_POST['password']));
       if ($data['number'] !=="" || $data['password'] !==""){
	       $verify = strtolower($_POST['yanzheng']);
	       // 验证码合法性
	       if(md5($verify) != $_SESSION['verify'])
	       {
	       	$this->error('验证码错误');
	       }
	       unset($_SESSION['verify']);
	       $user = M('user');
	       $info = $user->where($data)->find();     
	       if ($info !== null){
	       	    Session::set('name',$info['name']);
	            Session::set('number',$info['number']) ;    
	            Session::set('role',$info['role']) ;
				$this->redirect('/Index/index');			
	//        		if ($data['status'] == 0){
	//        			$this->error('对不起，目前您的账号处于限制登录状态，如有疑问请您联系管理员。');
	//        		}
	       }else{
	       			$this->error('账号或密码错误！');
	       		}	
       	}else {
       			$this->error('用户名或密码不能为空！');
       	}
    }
    public function logout ()
    {    	
    	if (isset($_SESSION['number'])){
    		Session::set('number',NULL);
    		Session::set('name',NULL);
    	    $this->redirect('/Public/login');
    	}else{
    		$this->redirect('/Public/login');
    	}
    }
    /**
     * 验证码显示
     *
     * @author gsx
     * @version 2013-11-26
     */
    public function verify()
    {
    	import('ORG.Util.Image');
    	Image::buildImageVerify(4);
    }
   
}