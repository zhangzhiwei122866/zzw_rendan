<?php
class PublicAction extends Action
{
	public function register()
	{
		$this->display();
	}
	public function doregister()
	{

/*******************************************  将用户注册的信息添加到数据库 ********************/		
		
		$r['username']=$_POST['username'];
		$r['phone']=$_POST['phone'];
		$r['Fphone']=$_POST['Fphone'];
		$r['password']=$_POST['password'];
		$r['repassword']=$_POST['repassword'];
		$r['mail']=$_POST['mail'];
		$m['mail']=$_POST['mail'];
		//var_dump($r['mail']);
		$r['sex']=$_POST['sex'];
		$form=M('User');
		$list = $form->where('phone=' .$r['phone'])->find();
		$list1 = $form->where('Fphone=' .$r['phone'])->find();
		$list2 = $form->where($m)->find();
		//var_dump($list2);
		if($list['phone']!=null)
		{
			$this->message = "您的手机号：";
			$this->assign( "list",$r['phone']);
			$this->message1 = "已经注册了！";
			$this->jumpUrl="/Public/register";
		}elseif($list1['Fphone']!=null){
				$this->message = "对方的手机号：";
				$this->assign( "list",$r['Fphone']);
				$this->message1 = "已经注册了！";
				$this->jumpUrl="register";
		}elseif($list2['mail']!=null){
				$this->message = "您的邮箱：";
				$this->assign( "list",$r['mail']);
				$this->message1 = "已经注册了！";
				$this->jumpUrl="/Public/register";
		}else{
				$list3 = $form->add($r);
				$this->redirect('/Public/login');
			}
			$this->display();
		}
	
	public function dologin()
	{
		$this->display();
	}
    public function login()
    {
        $this->display();
    }
    
    public function qqlogin()
    {
    	$this->display();
    }
    public function renrenlogin()
    {
    	$this->display();
    }
    public function xinlanglogin()
    {
    	$this->display();
    }
    public function success()
    {
    	
/*********************用户登陆成功**************************/    	
    	
    	$l['phone']=$_POST['phone'];
    	$f['Fphone']=$_POST['phone'];
    	$condition['Fphone']=$_POST['phone'];
    	$condition['phone']=$_POST['phone'];
    	$l['password']=$_POST['password'];
    	$f['password']=$_POST['password'];
    	$condition['_logic'] = 'OR';
    	//var_dump($_POST['phone']);
    	//var_dump($_POST['password']);
    	$form = M('User');
    	$list =$form->where($condition)->find();     //用来获取mail进而添加积分和等级到数据库
    	$list8 =$form->where($l)->find();
    	$list9 =$form->where($f)->find();    //用来判断用户登陆的信息
    	$m['mail']=$list['mail'];
    	//var_dump($_POST['phone']);
    	//var_dump($list);
    	if($list8!==null || $list9!==null)
    	{
    		
/*************************************积分和等级的计算**********************/    		
    		
    		$integral=$list["integral"];
    		$grade4=$list["grade"];
    		if($integral<30 && $grade4<1 && $integral>=0){
    			$integral1['integral']=intval($integral)+1;
    			$list4=$form->where($m)->save($integral1);
    			//var_dump($list4);
    			$_SESSION['phone']=$_POST['phone'];
    			$_SESSION['username']=$list["username"];
    			$_SESSION['id']=$list["id"];
    			$_SESSION['mail']=$list["mail"];
    			$_SESSION['time']=date("Y-m-d H:i:s");
    			$this->redirect('/Record/record');
    		}
    		elseif($integral>=30 && $integral<50)
    		{
    			$grade1['integral']=$integral+1;
    			$g['integral']=$integral+1;
 				$grade1['grade']=$grade4+1;
 				if($grade4==0)
 				{
	 				$list1=$form->where($m)->save($grade1);
	 				//var_dump($list1);
	 				$_SESSION['phone']=$_POST['phone'];
	 				$_SESSION['username']=$list["username"];
	 				$_SESSION['id']=$list["id"];
	 				$_SESSION['time']=date("Y-m-d H:i:s");
	 				$this->redirect('/Record/record');
 				}elseif($grade4==1){
 					$list1=$form->where($m)->save($g);
 					//var_dump($list1);
 					$_SESSION['phone']=$_POST['phone'];
 					$_SESSION['username']=$list["username"];
 					$_SESSION['id']=$list["id"];
 					$_SESSION['time']=date("Y-m-d H:i:s");
 					$this->redirect('/Record/record');
 				}
    		}elseif($integral>=50 && $integral<80){
    			$grade1['integral']=$integral+1;
    			$g['integral']=$integral+1;
 				$grade1['grade']=$grade4+1;
 				if($grade4==1)
 				{
	 				$list1=$form->where($m)->save($grade1);
	 				//var_dump($list1);
	 				$_SESSION['phone']=$_POST['phone'];
	 				$_SESSION['username']=$list["username"];
	 				$_SESSION['id']=$list["id"];
	 				$_SESSION['time']=date("Y-m-d H:i:s");
	 				$this->redirect('/Record/record');
 				}elseif($grade4==2){
 					$list1=$form->where($m)->save($g);
 					//var_dump($list1);
 					$_SESSION['phone']=$_POST['phone'];
 					$_SESSION['username']=$list["username"];
 					$_SESSION['id']=$list["id"];
 					$_SESSION['time']=date("Y-m-d H:i:s");
 					$this->redirect('/Record/record');
 				}
    		}elseif($integral>=80 && $integral<100){
    			$grade1['integral']=$integral+1;
    			$g['integral']=$integral+1;
 				$grade1['grade']=$grade4+1;
 				if($grade4==2)
 				{
	 				$list1=$form->where($m)->save($grade1);
	 				//var_dump($list1);
	 				$_SESSION['phone']=$_POST['phone'];
	 				$_SESSION['username']=$list["username"];
	 				$_SESSION['id']=$list["id"];
	 				$_SESSION['time']=date("Y-m-d H:i:s");
	 				$this->redirect('/Record/record');
 				}elseif($grade4==3){
 					$list1=$form->where($m)->save($g);
 					//var_dump($list1);
 					$_SESSION['phone']=$_POST['phone'];
 					$_SESSION['username']=$list["username"];
 					$_SESSION['id']=$list["id"];
 					$_SESSION['time']=date("Y-m-d H:i:s");
 					$this->redirect('/Record/record');
 				}
    		}elseif($integral==100 && $grade4==3){
	    			$_SESSION['phone']=$_POST['phone'];
	    			$_SESSION['username']=$list["username"];
	    			$_SESSION['id']=$list["id"];
	    			$_SESSION['time']=date("Y-m-d H:i:s");
	    			$this ->message="您已经达到100级，将成为我们的管理员";
	    			$this->waitSecond = 2 ;
	    			$this->jumpUrl="/Record/record";
    		}
    	}else{
    		$this ->message="手机号或密码错误，请核对后重新登录！";
    		$this->waitSecond = 2 ;
    		$this->jumpUrl="/Public/login";
    	}
    	$this->display();
    }
    	
    public function fail()
    {
    	
/***************************************当没有登录点击进入首页时显示的信息************************/
    	   	
    	$this ->message="您还没有的登录，请先登录.....";
    	$this->jumpUrl="/Public/login";
    	$this->display();
    }
    public function NOFind()
    {
    	$this->display();
    }
}
?>