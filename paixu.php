<?php

$a = array(19,array(1,8,3,18,89),array(5,6,8,12,90));//,18,array(1,20,7),array(19,4,6));
echo getMaxValueInArray($a);

function getMaxValueInArray($a){
	foreach($a as $key => $value){
		if(is_array($value)){
           $value=getMaxValueInArray($value);
	  }

        $max=max($max,$value);
	}
	
	return $max;
}


/*
$count = count($a);
foreach($a as $key=>$val){
	$count1 = count($val);
	if($count1==1){
		$v = $val;
	}else {
		$b = array();
		for($i=0;$i<$count1-1;$i++){
			if($val[$i]>$val[$i+1]){
				$b[]=$val[$i];
			}  
		}
		//echo "<pre>";
		//var_dump($b);
		for($j=0;$j<count($b[0]);$j++){
			//if($b[0][$j]>$b[0][$j+1]) {
				$res= $b[0][$j];	
			}
			if($v> $b[0][$j]){
				$res =$v;
			}
			//echo $res;
		}

	}

}*/
?>
