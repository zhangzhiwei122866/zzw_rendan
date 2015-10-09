<?php
//一些增删改查例子
class ExampleAction extends Action
{
	public function labList(){
		$lab = M('Lab');
	    //F('lab_id', 'null');//清除数据缓存
		if (isset($_SESSION['labid'])){
			$lab_id = Session::get("labid");
			Session::set('labid',NULL);
			$list = $lab->where( 'lab_id=' .$lab_id)->select();
			$this->assign('list',$list);
			$this->display();
		}else{
		$list = $lab->order('lab_id asc')->select();
		$this->assign('list',$list);
		$this->display();
		}
	}

public function query(){
		$lab = M('Lab');
		$lab_id = $_GET['option'];
		if ($lab_id!=NULL)
		{
			Session::set('labid',$lab_id);
		}
	   // F('lab_id', $lab_id);//保存数据到缓存
		$this->redirect('/LabList/labList');
	}
	
	public function add(){
		F('data', $_GET['lab_id']);//保存数据到缓存
		$this->display();
	}

	public function insert(){
	 //判断是更新操作还是添加操作
        if (F('data')!=null) {
        	$lab_id = F('data');
        	F('data', null);//清除数据缓存
        	$lab = M('Lab');
        	$data['lab_name'] = trim($_POST['lab_name']);
            $data['lab_link'] = trim($_POST['lab_link']);
            $data['lab_intro'] = trim($_POST['lab_intro']);
            $data['status'] = trim($_POST['status']);
            //$this->assign('data',$data);
            if ($data['lab_name']==null | $data['lab_link'] ==null |  $data['lab_intro']==null ) {
                $this->error('信息填写不完善，更新失败');
            } else {
            	$lab->where( 'lab_id=' .$lab_id )->save($data);
            	$this->success('更新成功');                
            }
        } else {
        		$lab = M('Lab');
            	$data['lab_name'] = trim($_POST['lab_name']);
            	$data['lab_link'] = trim($_POST['lab_link']);
            	$data['lab_intro'] = trim($_POST['lab_intro']);
            	$data['status'] = trim($_POST['status']);
        	if ($data['lab_name']!=null && $data['lab_link'] !=null && $data['lab_intro']!=null ) {
               $lab->add($data);
                $this->success('添加成功');                
            } else {
            	$this->error('添加失败');
            }
        }
	}
	
public function delete(){
		$lab = M('Lab');
		$lab_id=$_GET['lab_id'];
	    $lab-> where( 'lab_id='.$lab_id)->delete();
	    $this->success('删除成功');	    
	}
}