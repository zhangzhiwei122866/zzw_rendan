<?php
class UserModel extends Model{
	protected $_validate = array(
		array('user_name','require','请输入正确的姓名'),
		array('email','email','邮箱格式错误'),
		array('password','require','密码必须'),
		array('repassword','require','确认密码必须'),
		array('repassword','password','确认密码不一致',0,'confirm'),
		array('email','','帐号已经存在',0,'unique',1)
	);
}