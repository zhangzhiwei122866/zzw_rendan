<?php
/**
 * 网站后台主框架
     * @author 
     * @version 
 */
class IndexAction extends AdminAction
{
    public function _initialize ()
    {
        parent::_initialize();
    }
    /**
     * 后台主页
     * @author 
     * @version 
     */
    public function index ()
    {
        $this->display();
    }
    /**
     * 后台欢迎页
     * @author 
     * @version 
     */
    public function main ()
    {
        $this->display();
    }
}