<?php
/**
 * 后台管理操作Action
     * @author hjq
     * @version 2013-4-28
 */
class AdminAction extends CommonAction
{
    /**
     * 初始化操作
     * @author hjq
     * @version 2013-4-28
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
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['account_name']))
        {
            $this->assign("jumpUrl", U('Public/login'));
            $this->error('您尚未登录，请登录');
        }
    }
}