<?php
class WenzhangAction extends Action
{
	public function  wen(){
		$this->display();
	}
	public function wguan(){
		$nei = M('nei');
		$resu = $nei -> select();
		$this->assign(resu,$resu);
		$this->display();
	}
	public function tianjia(){
		$nei = M("nei");
		$huoqu = array_merge($_GET ,$_POST);
		$shuju = array();
		$date = Date('Y-m-d');
		$shuju['biaoti'] = $huoqu['title'];
		$shuju['leibie'] = $huoqu['leibie'];
		$post = str_replace(chr(13),'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$huoqu['nei']);
		//$shuju['neirong'] = preg_replace("/[\s]{2,}/","",$post).'<br>';
		$shuju['neirong'] = preg_replace("/\s+/","",$post).'<br>';
		$shuju['date'] = $date;
		$shuju['auto'] = $_SESSION['name'];
		$result = $nei -> add($shuju);
		if($result){
			$this->ajaxReturn('',$result,1);
		}else{
			$this->ajaxReturn('',$result,0);
		}
	}
	function hetmtocode($content){
		$content=str_replace("\n","<br>",str_replace(" ","&nbsp",$content));
		return $content;
	}
	function strip_whitespace($content) {
	    $stripStr   = '';
	    $tokens     = token_get_all($content);
	    $last_space = false;
	    for ($i = 0, $j = count($tokens); $i < $j; $i++) {
	        if (is_string($tokens[$i])) {
	            $last_space = false;
	            $stripStr  .= $tokens[$i];
	        } else {
	            switch ($tokens[$i][0]) {
	                case T_COMMENT:
	                case T_DOC_COMMENT:
	                    break;
	                case T_WHITESPACE:
	                    if (!$last_space) {
	                        $stripStr  .= ' ';
	                        $last_space = true;
	                    }
	                    break;
	                case T_START_HEREDOC:
	                    $stripStr .= "<<<THINK\n";
	                    break;
	                case T_END_HEREDOC:
	                    $stripStr .= "THINK;\n";
	                    for($k = $i+1; $k < $j; $k++) {
	                        if(is_string($tokens[$k]) && $tokens[$k] == ';') {
	                            $i = $k;
	                            break;
	                        } else if($tokens[$k][0] == T_CLOSE_TAG) {
	                            break;
	                        }
	                    }
	                    break;
	                default:
	                    $last_space = false;
	                    $stripStr  .= $tokens[$i][1];
	            }
	        }
	    }
	    return $stripStr;
	}
}