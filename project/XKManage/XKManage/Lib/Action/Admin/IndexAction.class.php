<?php
/**
 * 网站后台主框架
     * @author hjq
     * @version 2013-4-16
 */
class IndexAction extends AdminAction
{
    public function _initialize ()
    {
        parent::_initialize();
    }
    /**
     * 后台主页
     * @author hjq
     * @version 2013-4-16
     */
  public function index ()
    {
        $this->display();
    }
    /**
     * 后台欢迎页
     * @author hjq
     * @version 2013-4-16
     */
   public function main ()
    {
        $this->display();
    }
}