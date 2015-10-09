<?php
/**
     * @author hjq
     * @version 2013-4-19
 */
class DsshanchuAction extends Action
{
	public function de()
	{
			$id = $_GET["id"];
			$form = D("researchers");
			$form1 = D("project");
			$form2 = D("studybranch");
			$course = M("course");
			$money = M("money");
			$user = M("user");
			$form->where('id='.$id)->delete();
			$form1 ->where('research_id='.$id)->delete();
			$form2 ->where('research_id='.$id)->delete();
			$course ->where('research_id='.$id)->delete();
			$money->where('researcher_id='.$id)->delete();
			$user->where('researcher_id='.$id)->delete();
		$this->redirect('Sour/sourList');
	}
}