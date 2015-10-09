<?php
/**
     * @author hjq
     * @version 2013-4-28
 */
class PublicAction extends Action
{
    /**
     * 网站登录
     * @author hjq
     * @version 2013-4-28
     */
    public function login ()
    {
        $this->display();
    }
    /**
     * 网站登录检测
     * @author hjq
     * @version 2013-4-16
     */
public function doLogin ()
    {
//        $result['username']= htmlentities(trim($_POST['username']));
//        $result['password'] =htmlentities(trim($_POST['password']));
//        $result['power'] =htmlentities(trim($_POST['power']));
//        if ($result['username'] !=="" & $result['power'] !==""){
// 		       $verify = strtolower($_POST['yanzheng']);
// 		        // 验证码合法性
// 		        if(md5($verify) != $_SESSION['verify'])
// 		        {
// 		            $this->error('验证码错误');
// 		        }
// 		        unset($_SESSION['verify']);
// 		       $user = D('User');
// 		       $data = $user->where($result)->find(); 
// 		       $res = D('Researchers');
// 		       $data2= $res->where('id ='.$data['researcher_id'])->find(); 
// 		       //var_dump($data2);
// 		       $arr['username'] = $result['username'];
// 		       $arr['password'] = $result['password'];
// 		       $data1 = $user->where($arr)->find();
// 		      // var_dump($data1);s
// 		       if ($data !== null){
// 		       	    Session::set('account_name',$data['account_name']);
// 		       	    Session::set('user_id',$data['id']);
// 		       		Session::set('power',$data['power']);
// 					Session::set('researcher_id',$data['researcher_id']);
// 					Session::set('des_id',$data2['des_id']);
// 		       		//var_dump($_SESSION);
// 					$this->redirect('/Index/index');
// 		       }
// 		       else if($data1 !== null){
// 		       			$this->error('对不起，您的账号没有此种用户的登陆权限，请检查您选择的用户类型，如有疑问请您联系管理员。');
// 		       		}	
// 		       		else{
// 		       			$this->error('用户名或密码填写错误！');
// 		       		}
//          }else {
//        		$this->error('用户名或密码不能为空！');
//        }

    	$result['username']= htmlentities(trim($_POST['username']));
    	$result['password'] =htmlentities(trim($_POST['password']));
    	
    	if ($result['username'] !=="" || $result['password']){
    		$verify = strtolower($_POST['yanzheng']);
    		// 验证码合法性
    		if(md5($verify) != $_SESSION['verify'])
    		{
    			$this->error('验证码错误');
    		}
    		unset($_SESSION['verify']);
    		$user = D('User');
    		$data = $user->where($result)->find();
    		 
    		$arr['username'] = $result['username'];
    		$arr['password'] = $result['password'];
    		$arr['power'] = $data['power'];
    		//print_r($arr['power']);return ;
    		$data1 = $user->where($arr)->find();
    		$res = D('Researchers');
    	    $data2= $res->where('id ='.$data['researcher_id'])->find();
    		if ($data1 !== null){
    			Session::set('account_name',$data['account_name']);
    			Session::set('user_id',$data['id']);
    			Session::set('power',$data['power']);
    			Session::set('researcher_id',$data['researcher_id']);
    			Session::set('des_id',$data2['des_id']);
    			
    			$logs=M('logs');
    			$datas['login_time']=date('Y-m-j H:i:s');
    			$datas['user']=$arr['username'];
    			$datas['ip']=$_SERVER['REMOTE_ADDR'];
    			$logs->add($datas);
    			
    			$this->redirect('/Index/index');
    		}
    		else{
    			$this->error('用户名或密码填写错误！');
    		}
    	}else {
    		$this->error('用户名或密码不能为空！');
    	}
    }
 /**
     * 退出登录
     * @author hjq
     * @version 2013-4-16
     */
    public function logout ()
    {
    	if (isset($_SESSION['user_id'])){
    		unset($_SESSION['user_id']);
    		unset($_SESSION['account_name']);
    		unset($_SESSION['power']);
    	   $this->redirect('/Public/login');
    	}
    }
    
    /**
     * 验证码显示
     *
     * @authorhjq
     * @version 2013-05-11
     */
    public function verify()
    {
        import('ORG.Util.Image');
        Image::buildImageVerify(4);
    }

  public function left()
    { 
    	$discipline = new Model("Discipline");
    	$studybranch = new Model("Studybranch");
    	$academiny = new Model("academy");
    	$list = $discipline->select();
    	$list1 = $studybranch->select();
    	$list2 = $academiny->select();
    	$list3=$studybranch->join('discipline ON discipline.des_id=studybranch.des_id')->select();
    	$this->assign("list",$list);
    	$this->assign("list1",$list1);
    	$this->assign("list2",$list2);
    	$this->assign("list3",$list3);
    	$this->display();
    }

    public function top()
    { 
    	$form = new Model("User");
    	$name['id'] = $_SESSION['user_id'];
    	$list1 = $form ->where($name)->find();
    	$list4 = $list1['account_name'];
    	$this->assign("list2",$list1['account_name']);
    	$this->display();
    }
    
public function success()
    {
    	/* 通过传过来的数据进行修改密码  */
    	$repassword['account_name']=$_POST['account_name'];
    	$user['password']=$_POST['password'];
    	$repassword['password'] = $_POST['repassword'];
    	$user['id']=$_SESSION['user_id'];
    	$form = new Model("User");
    	$list2=$form->where($user)->find(); 	
    	if($list2['password']==$_POST['password']&&$_POST['repassword']!=null ){
    		$list=$form->where($user)->save($repassword);
    		$_SESSION['account_name']=$_POST['account_name'];
    		$this->message = "恭喜您已成功更改您的密码,您当前密码和用户名为：";
    		$this->waitSecond = 2 ;
    		$this->assign ( "list", $repassword['password'] );
    		$this->assign ( "list1", $repassword['account_name'] );
    		$this->jumpUrl="/Admin/Notice/noticeList";
    	}
    	elseif($list2['password']!=$_POST['password']&&$_POST['repassword']!=null){
    		$this->message = "对不起，您填写的原密码不对有错误";
    		$this->waitSecond = 2 ;
    		$this->jumpUrl="/Admin/User/userEdit";
    	}else{
    		$this->message = "对不起，您填写信息有错误";
    		$this->waitSecond = 2 ;
    		$this->jumpUrl="/Admin/User/userEdit";
    	}
    	$this->display();
    }
}