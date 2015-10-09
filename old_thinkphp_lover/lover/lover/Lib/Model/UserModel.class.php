<?php
class UserModel extends Model{
	protected $fields = array(
	
			'id','username','phone','Fphone','password','repassword','mail','sex','_pk'=>'lab_id','_autoinc'=>true
	);
}
?>