<?php
class IndexAction extends AdminAction
{
    public function _initialize ()
    {
        parent::_initialize();
    }
    public function index ()
    {      	
        $this->display();
    }
    public function main ()
    {
        $this->display();
    }
    //更新缓存
    public function delcache(){
    	import("ORG.Io.Dir");
    	$dir = new Dir;
    	@unlink(RUNTIME_PATH.'~app.php');
    	if(is_dir(RUNTIME_PATH.'Cache')){
    		$dir->delDir(RUNTIME_PATH.'Cache');
    	}
    	if(is_dir(RUNTIME_PATH.'Data')){
    		$dir->delDir(RUNTIME_PATH.'Data');
    	}
    	if(is_dir(RUNTIME_PATH.'Logs')){
    		$dir->delDir(RUNTIME_PATH.'Logs');
    	}
    	if(is_dir(RUNTIME_PATH.'Temp')){
    		$dir->delDir(RUNTIME_PATH.'Temp');
    	}
    	$this->assign("jumpUrl","/Admin/Index/index");
    	$this->success('更新成功！');
    }
}