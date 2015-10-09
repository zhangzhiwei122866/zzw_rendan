<?php
class PerformancegatherAction extends Action
{
	public function index()
	{
/************* performance_gather2012表的查询  ***********************/
		
		$gather_id = $_GET['desid'];
		//var_dump($gather2012_id);
		$performance_gather=D("performance_gather");
		$list=$performance_gather->where('des_id='.$gather_id)->select();
		//print_r($list);
		$this->assign ( "list", $list );
		$this->display();
	}
	public function gather()
	{
		$performance_gather=D("performance_gather");
		$gather_id=$_POST['des_id'];
	/*************2012年的绩效汇总*****************************/	
		$gather_id2012['des_id']=$_POST['des_id'];
		$gather_id2012['time'] = 201212;
		$gather2012['des_id'] = $_POST['des_id'];
		$gather2012['describe'] = $_POST['describe'];
		$gather2012['guojiaji_jingfei'] = $_POST['guojiaji_jingfei12'];
		$gather2012['shengji_jingfei'] = $_POST['shengji_jingfei12'];
		$gather2012['hangye_jingfei'] = $_POST['hangye_jingfei12'];	
		$gather2012['gaige_jingfei'] = $_POST['gaige_jingfei12'];
		$gather2012['hetong_jingfei'] = $_POST['hetong_jingfei12'];
		$gather2012['guojihezuo_jingfei'] = $_POST['guojihezuo_jingfei12'];
		$gather2012['guoneihezuo_jingfei'] = $_POST['guoneihezuo_jingfei12'];
		$gather2012['aboveanmount_jingfei'] = $_POST['aboveanmount_jingfei12'];
		$gather2012['kanwufabiao_amount'] = $_POST['kanwufabiao_amount12'];
		$gather2012['beishoulu_amount'] = $_POST['beishoulu_amount12'];
		$gather2012['chuban_amount'] = $_POST['chuban_amount12'];
		$gather2012['zhuanli_amount'] = $_POST['zhuanli_amount12'];
		$gather2012['jiaoxueprise_amount'] = $_POST['jiaoxueprise_amount12'];
		$gather2012['keyanprise_amount'] = $_POST['keyanprise_amount12'];
		$gather2012['beyondshengji_amount'] = $_POST['beyondshengji_amount12'];
		$gather2012['beicaiyong_amount'] = $_POST['beicaiyong_amount12'];
		$gather2012['zhuangrang_fieyong'] = $_POST['zhuangrang_fieyong12'];
		$gather2012['zengzhi_profit'] = $_POST['zengzhi_profit12'];
		$gather2012['beused_amount'] = $_POST['beused_amount12'];
		$gather2012['hezuo_amount'] = $_POST['hezuo_amount12'];
		$gather2012['boshi_amount'] = $_POST['boshi_amount12'];
		$gather2012['yanjiusheng_amount'] = $_POST['yanjiusheng_amount12'];
		$gather2012['gaoceng_amount'] = $_POST['gaoceng_amount12'];
		$gather2012['tepin_amount'] = $_POST['tepin_amount12'];
		$gather2012['gugan_amount'] = $_POST['gugan_amount12'];
		$gather2012['peixun_amount'] = $_POST['peixun_amount'];
		$gather2012['zhongdianshiyanshi_amount'] = $_POST['zhongdianshiyanshi_amount12'];
		$gather2012['gongcheng_amount'] = $_POST['gongcheng_amount12'];
		$gather2012['boshidian_amount'] = $_POST['boshidian_amount12'];
		$gather2012['openshiyanshi_amount'] = $_POST['openshiyanshi_amount12'];
		$gather2012['shebei_price'] = $_POST['shebei_price12'];
		$gather2012['chinesebook_amount'] = $_POST['chinesebook_amount12'];
		$gather2012['foreignbook_amount'] = $_POST['foreignbook_amount12'];
		$gather2012['foreignqikan_amount'] = $_POST['foreignqikan_amount12'];
		$gather2012['yongfangmianji'] = $_POST['yongfangmianji12'];
		$gather2012['shiyanjidi_amount'] = $_POST['shiyanjidi_amount12'];
		$gather2012['jinxiu_amount'] = $_POST['jinxiu_amount12'];
		$gather2012['chuguospeech_amount'] = $_POST['chuguospeech_amount12'];
		$gather2012['guoneispeech_amount'] = $_POST['guoneispeech_amount12'];
		$gather2012['guojihuiyi_amount'] = $_POST['guojihuiyi_amount12'];
		$gather2012['guoneihuiyi_amount'] = $_POST['guoneihuiyi_amount12'];
		$gather2012['guoneijigou_amount'] = $_POST['guoneijigou_amount12'];
		$gather2012['guowaijigou_amount'] = $_POST['guowaijigou_amount12'];
		$gather2012['guoneijiang_amount'] = $_POST['guoneijiang_amount12'];
		$gather2012['guowaijiang_amount'] = $_POST['guowaijiang_amount12'];
		$gather2012['guojihuiyi'] = $_POST['guojihuiyi12'];
		$gather2012['guoneihuiyi'] = $_POST['guoneihuiyi12'];
		$gather2012['xuexiaotouru'] = $_POST['xuexiaotouru12'];
		$gather2012['xuekediantouru'] = $_POST['xuekediantouru12'];
		$gather2012['describe_canzhaoxi'] = $_POST['describe_canzhaoxi'];
		$gather2012['describe_function'] = $_POST['describe_function'];
		$gather2012['time'] = $_POST['time2012'];
		
		/*********************2015年的绩效汇总**********************/
		$gather2015['des_id'] = $_POST['des_id'];
		$gather2015['time'] = $_POST['time2015'];
		$gather_id2015['des_id']=$_POST['des_id'];
		$gather_id2015['time'] = 201512;
		$gather2015['describe'] = $_POST['describe'];
		$gather2015['guojiaji_jingfei'] = $_POST['guojiaji_jingfei15'];
		$gather2015['shengji_jingfei'] = $_POST['shengji_jingfei15'];
		$gather2015['hangye_jingfei'] = $_POST['hangye_jingfei15'];
		$gather2015['gaige_jingfei'] = $_POST['gaige_jingfei15'];
		$gather2015['hetong_jingfei'] = $_POST['hetong_jingfei15'];
		$gather2015['guojihezuo_jingfei'] = $_POST['guojihezuo_jingfei15'];
		$gather2015['guoneihezuo_jingfei'] = $_POST['guoneihezuo_jingfei15'];
		$gather2015['aboveanmount_jingfei'] = $_POST['aboveanmount_jingfei15'];
		$gather2015['kanwufabiao_amount'] = $_POST['kanwufabiao_amount15'];
		$gather2015['beishoulu_amount'] = $_POST['beishoulu_amount15'];
		$gather2015['chuban_amount'] = $_POST['chuban_amount15'];
		$gather2015['zhuanli_amount'] = $_POST['zhuanli_amount15'];
		$gather2015['jiaoxueprise_amount'] = $_POST['jiaoxueprise_amount15'];
		$gather2015['keyanprise_amount'] = $_POST['keyanprise_amount15'];
		$gather2015['beyondshengji_amount'] = $_POST['beyondshengji_amount15'];
		$gather2015['beicaiyong_amount'] = $_POST['beicaiyong_amount15'];
		$gather2015['zhuangrang_fieyong'] = $_POST['zhuangrang_fieyong15'];
		$gather2015['zengzhi_profit'] = $_POST['zengzhi_profit15'];
		$gather2015['beused_amount'] = $_POST['beused_amount15'];
		$gather2015['hezuo_amount'] = $_POST['hezuo_amount15'];
		$gather2015['boshi_amount'] = $_POST['boshi_amount15'];
		$gather2015['yanjiusheng_amount'] = $_POST['yanjiusheng_amount15'];
		$gather2015['gaoceng_amount'] = $_POST['gaoceng_amount15'];
		$gather2015['tepin_amount'] = $_POST['tepin_amount15'];
		$gather2015['gugan_amount'] = $_POST['gugan_amount15'];
		$gather2015['peixun_amount'] = $_POST['peixun_amount15'];
		$gather2015['zhongdianshiyanshi_amount'] = $_POST['zhongdianshiyanshi_amount15'];
		$gather2015['gongcheng_amount'] = $_POST['gongcheng_amount15'];
		$gather2015['boshidian_amount'] = $_POST['boshidian_amount15'];
		$gather2015['openshiyanshi_amount'] = $_POST['openshiyanshi_amount15'];
		$gather2015['shebei_price'] = $_POST['shebei_price15'];
		$gather2015['chinesebook_amount'] = $_POST['chinesebook_amount15'];
		$gather2015['foreignbook_amount'] = $_POST['foreignbook_amount15'];
		$gather2015['foreignqikan_amount'] = $_POST['foreignqikan_amount15'];
		$gather2015['yongfangmianji'] = $_POST['yongfangmianji15'];
		$gather2015['shiyanjidi_amount'] = $_POST['shiyanjidi_amount15'];
		$gather2015['jinxiu_amount'] = $_POST['jinxiu_amount15'];
		$gather2015['chuguospeech_amount'] = $_POST['chuguospeech_amount15'];
		$gather2015['guoneispeech_amount'] = $_POST['guoneispeech_amount15'];
		$gather2015['guojihuiyi_amount'] = $_POST['guojihuiyi_amount15'];
		$gather2015['guoneihuiyi_amount'] = $_POST['guoneihuiyi_amount15'];
		$gather2015['guoneijigou_amount'] = $_POST['guoneijigou_amount15'];
		$gather2015['guowaijigou_amount'] = $_POST['guowaijigou_amount15'];
		$gather2015['guoneijiang_amount'] = $_POST['guoneijiang_amount15'];
		$gather2015['guowaijiang_amount'] = $_POST['guowaijiang_amount15'];
		$gather2015['guojihuiyi'] = $_POST['guojihuiyi15'];
		$gather2015['guoneihuiyi'] = $_POST['guoneihuiyi15'];
		$gather2015['xuexiaotouru'] = $_POST['xuexiaotouru15'];
		$gather2015['xuekediantouru'] = $_POST['xuekediantouru15'];
		$gather2015['describe_canzhaoxi'] = $_POST['describe_canzhaoxi'];
		$gather2015['describe_function'] = $_POST['describe_function'];
		
		
		$list2012=$performance_gather->where($gather_id2012)->data($gather2012)->save();
		$list2015=$performance_gather->where($gather_id2015)->data($gather2015)->save();
		//var_dump($gather2012);
		//var_dump($gather2015['guojiaji_jingfei']);
		//$this->display();
		$this->redirect('/performanceGather/index/', array('desid'=>$gather_id), 1,'修改成功，页面跳转中');
	}
	
}