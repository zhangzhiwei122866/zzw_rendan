<?php
/**
 * 公用操作Action
 * @author hjq
 * @version 2013-4-14
 */
class CommonAction extends Action
{
    /**
     * 初始化操作
     * @author hjq
     * @version 2013-4-14
     */
    public function _initialize ()
    {
        //用户权限验证
       //登录验证
    }
    /**
     * 判断用户是否已经登陆
     */
    final public function check_login()
    {
        if(!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']))
        {
            $this->assign("jumpUrl", U('Admin-Public/login'));
            $this->error('您尚未登录，请登录');
        }
    }

    /**
     * 权限判断
     */
    final public function check_priv()
    {
        if(GROUP_NAME == 'admin' && MODULE_NAME == 'index' && in_array(ACTION_NAME, array('main', 'index')))
        {
            return true;
        }
        if($_SESSION['role_id'] == 1)
        {
            return true;
        }
        $priv = M('admin_role_priv');
        $r = $priv->where("m='GROUP_NAME' AND c='MODULE_NAME' AND a='ACTION_NAME'")->select();
        if(!$r)
        {
            $this->error('你没有此项操作权限');
        }
    }

}