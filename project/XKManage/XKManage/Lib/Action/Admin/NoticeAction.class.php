<?php
/**
     * @author hjq
     * @version 2013-4-19
 */
class NoticeAction extends Action
{
	public function noticeList()
	{
		$notice = M('Notice');
		import("@.ORG.Page"); //导入分页类
    	$count = $notice->where("des_id=1")->count();    //计算总数
    	$p = new Page ( $count, 15 );
    	$page = $p->show ();
    	$list = $notice->where('des_id=1')->limit($p->firstRow.','.$p->listRows)->findAll();
    	$p->setConfig('header','条记录');
    	$p->setConfig('prev',"上一页");
    	$p->setConfig('next','下一页');
    	$p->setConfig('first','首页');
    	$p->setConfig('last','尾页');
    	$this->assign( "page", $page );
    	$this->assign('list',$list);
		$this->display();
}
	
    public function notice()
	{
		$notice = M('Notice');
		$result['notice_id']=$_GET['notice_id'];
	    $content = $notice-> where($result)->find();
	    $this->assign('list',$content);
		$this->display();
	}
	
    public function add()
	{
		F('data', $_GET['notice_id']);//保存数据到缓存
		
		$notice = M('Notice');
		$result['notice_id']=$_GET['notice_id'];
	    $content = $notice-> where($result)->find();
	    $this->assign('list',$content);
		
		$this->display();
	}
	
public function insert(){
	 //判断是更新操作还是添加操作
        if (F('data')!=null) {
        	$notice_id = F('data');
        	F('data', null);//清除数据缓存
        	$notice = M('Notice');
        	$data['notice_name'] = trim($_POST['notice_name']);
            $data['notice_company'] = trim($_POST['notice_company']);
            $data['notice_content'] = trim($_POST['notice_content']);
            $data['notice_time'] = trim($_POST['notice_time']);
            if ($data['notice_name']==null | $data['notice_company'] ==null |  $data['notice_content']==null  |  $data['notice_time']==null ) {
                $this->error('信息填写不完善，更新失败');
            } else {
            	$notice->where( 'notice_id=' .$notice_id )->save($data);
            	$this->success('更新成功');
                $this->redirect('/Notice/noticeList/');
            }
        } else {
        		$notice = M('Notice');
	        	$data['notice_name'] = trim($_POST['notice_name']);
	            $data['notice_company'] = trim($_POST['notice_company']);
	            $data['notice_content'] =trim($_POST['notice_content']);
	            $data['notice_time'] = trim($_POST['notice_time']);
	        if ($data['notice_name']==null | $data['notice_company'] ==null | $data['notice_content']==null  |  $data['notice_time']==null ) {
	        	$this->error('添加失败');
            } else {
                $notice->add($data);
                $this->success('添加成功');
                $this->redirect('/Notice/noticeList');
            }
        }
	}
	
public function delete(){
		$notice = M('Notice');
		$notice_id=$_GET['notice_id'];
	    $notice-> where( 'notice_id='.$notice_id)->delete();
	    $this->success('删除成功');
	    $this->redirect('/Notice/noticeList');
	}
}