<?php
/**
     * @author 
     * @version 
 */
session_start();
class PublicAction extends Action
{
    /**
     * 网站登录
     * @author 
     * @version 
     */
    public function login ()
    {
        $this->display();
    }
    /**
     * 网站登录检测
     * @author 
     * @version 
     */
    public function doLogin ()
    {

    }
    /**
     * 退出登录
     * @author 
     * @version 
     */
    public function logout ()
    {

    }
    /**
     * 用户注册
     * @author 
     * @version 
     */
    public function register ()
    {
        $this->display();
    }
    /**
     * 注册信息处理
     * @author 
     * @version 
     */
    public function doReg ()
    {
       
    }
}