<?php
/**
 * 信息修改
     * @author hjq
     * @version 2013-4-16
 */
class UserAction extends Action
{
    public function edit()
	{
		$this->display();
	}
	public function userEdit()
	{
		/*  根据用户名查询与他相对应的权限    */
		$form = new Model("User");
		$name['id'] = $_SESSION['user_id'];
		$list1 = $form ->where($name)->find();
		$list3 = $list1['power'];
		$list4 = $list1['account_name'];
		$this->assign("list1",$list1['power']);
		$this->assign("list2",$list1['account_name']);
		$this->display();
	}
}