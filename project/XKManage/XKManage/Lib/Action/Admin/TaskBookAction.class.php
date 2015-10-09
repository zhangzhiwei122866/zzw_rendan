<?php
class TaskBookAction extends Action
{
	public function taskList()
	{
		$desid=$_GET['desid'];
		$id = $_GET['id'];
		$task_book = M("task_book");
		$task_book_list = $task_book->where('des_id='.$desid)->select();




		$this->assign ('task_book_list', $task_book_list  );
		$this->display();
	}
	
}