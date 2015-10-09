<?php
/**
     * @author zwx
     * @version 2013-5-30
 */
class LogsAction extends Action
{
	public function logList()
	{
		$logs=M('logs');
		import("@.ORG.Page"); //导入分页类
		$count=$logs->count();
		$p = new Page ( $count, 15 );
		$page = $p->show ();
		$list = $logs->limit($p->firstRow.','.$p->listRows)->findAll();
		$p->setConfig('header','条记录');
		$p->setConfig('prev',"上一页");
		$p->setConfig('next','下一页');
		$p->setConfig('first','首页');
		$p->setConfig('last','尾页');
		$this->assign( "page", $page );
		$this->assign('list',$list);
		$this->display();
    }

   public function delete(){
		$logs=M('logs');
		$log_id=$_GET['log_id'];
		$logs-> where( 'log_id='.$log_id)->delete();
		$this->success('删除成功');
		$this->redirect('/Logs/logList');
	}
}