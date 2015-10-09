<?php
/**
 * 后台管理操作Action
     * @author 
     * @version 2013-4-16
 */
class AdminAction extends Action
{
      /**
     * 初始化操作
     * @author gsx
     * @version 2013-4-16
     */
  public function _initialize()
    {
        self::check_login();
    }
    /**
     * 判断用户是否已经登陆
     */
    final public function check_login()
    {
        if(!isset($_SESSION['number']))
        {
        	$this->redirect('/Public/login');           
        }
    }
}