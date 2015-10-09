<?php
class RecordAction extends Action
{
	
	public function record()
	{
		if($_SESSION['phone']==null)
		{
			$this->redirect('/public/fail');
		}else{
			
/***********************************  根据登陆的手机号查询出该用户的等级和积分  ***********************/
			
			import("ORG.Util.Page"); //导入分页类
			$user=M('User');
			$record=M('Record');
			$friend = M('Friend');
			$record_count = $record->count();    //计算总数
			$p = new Page ( $record_count, 2);
			//var_dump($record_count);
			//$l['phone']=$_SESSION['phone'];
			//var_dump($phone['phone']);
			//$f['Fphone']=$_SESSION['phone'];
			$condition['Fphone']=$_SESSION['phone'];
			$condition['phone']=$_SESSION['phone'];
			$condition['_logic'] = 'OR';
			$user1 =$user->where($condition)->find();
			//$user1 =$user->where($l or $f)->find();
			//var_dump($user1);
			$_SESSION['grade']=$user1["grade"];
			$_SESSION['integral']=$user1["integral"];
			
/*****************************  根据friend和record中的user_id查询出friend_id进而得出    该用户好友     的动态    **************/
			
			$id['user_id'] = $_SESSION['id'];
			$id['friend_status']=1;
			$friend_count = $friend->where($id)->count();    //计算总数
			$friend_p = new Page ( $friend_count, 2);
			$fri = $friend->where($id)->find();
			$friend_id['user_id'] = $fri['friend_id'];
			$friend_record=$record->limit($p->firstRow.','.$p->listRows)->order('record_id desc')->where($friend_id)->findAll();
			//var_dump($friend_record);
			//var_dump($friend_record);
			$fri_page = $friend_p->show ();
			$this->assign ( "friend_page", $fri_page );
			$this->assign("friend",$friend_record);
			
			//$this->assign ( "user", $user1 );

/*********************   根据friend和record中的user_id查询出friend_id进而得出    该用户特别关注     的动态     ***********************/		

			$special['user_id'] = $_SESSION['id'];
			$special['friend_status']=2;
			$special_count = $friend->where($id)->count();    //计算总数
			$special_p = new Page ( $special_count, 2);
			$special_fri = $friend->where($special)->find();
			$special_id['user_id'] = $special_fri['friend_id'];
			$special_record=$record->limit($p->firstRow.','.$p->listRows)->order('record_id desc')->where($special_id)->findAll();
			//var_dump($friend_record);
			$spec_page = $special_p->show ();
			$this->assign ( "special_page", $spec_page );
			$this->assign("special",$special_record);
			
/************************************* 得到全部用户的动态和时间的差值   **********************************/
			
			
			$rec1=$record->select();
			foreach($rec1 as $reco)
			{
				
				$user_time=$rec1["user_time"];
				$reco1=$reco["record_time"];
				$reco2['record_time']=$reco["record_time"];
				$user_id=$reco["user_id"];
				$time1=$_SESSION['time'];
				//var_dump($user_time);
				
/***********************************  时间差值的计算 和将全部用户的动态在前台显示    **********************************************/	
							
				if(strtotime($time1)<strtotime($reco1))
				{
					$record_time=date("Y-m-d H:i:s");
					$time2= strtotime($record_time)-strtotime($reco1);
				}else{
					$time2= strtotime($time1)-strtotime($reco1);
				}
				//$time4=intval($time2/3600);
				if($time2<=60){
					$time4=intval($time2);
					$time5['user_time']=$time4."秒之前";
					if($user_id!==0 && $user_time==null){
					$record1=$record->where($reco2)->save($time5);
					$rec=$record->limit($p->firstRow.','.$p->listRows)->order('record_id desc')->select();
					$rec_page = $p->show ();
					$this->assign ( "record_page", $rec_page );
					$this->assign ( "rec", $rec );
					}else{
						return false;
					}
				}elseif ($time2>60 && $time2<=3600 )
				{
					$time4=intval($time2/60);
					$time5['user_time']=$time4."分钟之前";
					if($user_time==null  && $user_id!==0){
						$record1=$record->where($reco2)->save($time5);
						$rec=$record->limit($p->firstRow.','.$p->listRows)->order('record_id desc')->select();
						$rec_page = $p->show ();
						$this->assign ( "record_page", $rec_page );
						$this->assign ( "rec", $rec );
					}else{
						return false;
					}
				}elseif ($time2>3600 && $time2<=86400)
				{
					$time4=intval($time2/3600);
					$time5['user_time']=$time4."小时之前";
					if($user_time==null  && $user_id!==0){
						$record1=$record->where($reco2)->save($time5);
						$rec=$record->limit($p->firstRow.','.$p->listRows)->order('record_id desc')->select();
						$rec_page = $p->show ();
						$this->assign ( "record_page", $rec_page );
						$this->assign ( "rec", $rec );
					}else{
						return false;
					}
				}elseif ($time2>86400 && $time2<=2592000)
				{
					$time4=intval($time2/86400);
					$time5['user_time']=$time4."天之前";
					if($user_time==null  && $user_id!==0){
						$record1=$record->where($reco2)->save($time5);
						$rec=$record->limit($p->firstRow.','.$p->listRows)->order('record_id desc')->select();
						$rec_page = $p->show ();
						$this->assign ( "record_page", $rec_page );
						$this->assign ( "rec", $rec );
					}else{
						return false;
					}
				}elseif ($time2>2592000 && $time2<=31104000)
				{
					$time4['user_time']=intval($time2/2592000);
					$time5['user_time']=$time4."月之前";
					if($user_time==null  && $user_id!==0){
						$record1=$record->where($reco2)->save($time5);
						$rec=$record->limit($p->firstRow.','.$p->listRows)->order('record_id desc')->select();
						$rec_page = $p->show ();
						$this->assign ( "record_page", $rec_page );
						$this->assign ( "rec", $rec );
					}else{
						return false;
					}
				}
			//var_dump($time5['user_time']);
			}
			$this->display();
		}
	}
	
	public function guestbook()
	{
		$this->display();
	}
	public function zan()
	{
		//$id = $_GET('id');这个错误犯的真是太可笑了
		$id=$_GET['id'];
		//var_dump($id);
	}
	public function pinglun()
	{
		$id=$_GET['id'];
	}
	public function zhuanbo()
	{
		$id=$_GET['id'];
	}
	public function write()
	{
		$this->display();
	}
	public function help()
	{
		$this->display();
	}
	public function upload_img()
	{
		
/***********************  得到相册的id和name ********************/
		
		$userphoto = M ( 'Album' );
		$album = $userphoto->select ();
		$this->assign ( "albumid", $album );
		$this->display();
	}
	public function upload()
	{
		
/*********  根据传回来的用户的id用swfupload上传的图片添加到数据库  *********/
		
		$user_id=$_POST['user_id'];
		//var_dump($user_id);
		$file=$_FILES['FileData'];
		import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $path = 'Public/images/';
        $upload->maxSize = 3292200;
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->savePath = $path . 'big_photo/';
 	    $upload->thumb = true;
        $upload->thumbPrefix = '';
        $upload->thumbMaxWidth = "800";
        $upload->thumbMaxHeight = "600";
        $upload->thumbPath = $path . 'small_photo/';
        $upload->thumbRemoveOrigin = false;
        $info=$upload->uploadOne($file);
        $photo=M('Photo');
        foreach ($info as $pic)
        {
           $src = $pic['savepath'] . $pic["savename"];
           $insert_data = array("src"=>$src,"user_id"=>$user_id,"info"=>$pic["name"],"add_time"=>date("Y-m-d H:i:s"));
           $photo->add($insert_data);
        }
	}
	public function upload_save()
	{
		
/****************** 将传回的相册的id和用户的id添加到photo中   *************************/
		
		$Photo = M ( 'Photo' );
		$id['photo_status']=$_POST['opinions'];
		$alb['user_id']=$_SESSION['id'];
		//var_dump($alb['user_id']);
		$id['album_id'] =$_POST['album'];
		$album=$Photo->where($alb)->findAll();
		if($album['album_id']==0)
		{
			$album_id=$Photo->where($alb)->save($id);
			$this->redirect('Record/upload_img');
		}
		// 跳转到该相册页面
		//$this->display();
		//$this->redirect('Record/upload_img');
	}
	public function question()
	{
		$this->display();
	}
	public function change()
	{
		$this->display();
	}
	public function addfriend()
	{
		$this->display();
	}
	public function addfocus()
	{
		$this->display();
	}
	public function jiechu_friend()
	{
		$this->display();
	}
	public function quxiao_focus()
	{
		$this->display();
	}
	public function blankpage()
	{
		$this->display();
	}
	public function portraitSelect()
	{
		$this->display();
	}
	public function rizhi()
	{
		
/******************将用户写的日志添加到数据库*****************************/		
		
		$ti['record_title']=$_POST['rizhi_biaoti'];
		$ti['record_content']=$_POST['sourceEditor'];
		$ti['record_time']=date("Y-m-d H:i:s");
		$ti['user_id']=$_SESSION['id'];
		$ti['record_status']=$_POST['opinions'];
		$ti['record_attribute']=$_POST['rizhi'];
		$Record=M('Record');
		//var_dump($ti);
		$re=$Record->add($ti);
		$this->redirect('Record/record');
		//$this->display();
	}
	public function save_record()
	{
		
/******************将用户写的日志草稿添加到数据库*****************************/
		
		$ti['draft_title']=$_POST['rizhi_biaoti'];
		$ti['draft_content']=$_POST['sourceEditor'];
		$ti['draft_time']=date("Y-m-d H:i:s");
		$ti['user_id']=$_SESSION['id'];
		$ti['draft_status']=$_POST['opinions'];
		$ti['draft_attribute']=$_POST['rizhi'];
		$Record=M('Draft');
		//var_dump($ti);
		$re=$Record->add($ti);
		$this->redirect('Record/write');
		//$this->display();
	}
}
?>