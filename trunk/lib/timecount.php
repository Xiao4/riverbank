<?php
class timecount
{
	function findday($stime,$daydiff){
		$target0time=$stime+3600*($daydiff*24);
		$targetday=date("Ymd",$target0time);
	//	echo $targetday;
		return $targetday;
	}

	function finddayfromday($fromday,$daydiff){
		$stime = mktime (0,0,0,substr($fromday,4,2),substr($fromday,6,2),substr($fromday,0,4));
		$target0time=$stime+3600*($daydiff*24);
		$targetday=date("Ymd",$target0time);
	//	echo $targetday;
		return $targetday;
	}
	
	function tostamp($arr){
		$thetime = mktime ($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5]);
		//$thetime = mktime ($arr['hour'],$arr['nimute'],$arr['second'],$arr['month'],$arr['day'],$arr['year']);
		return $thetime;
	}
	
	function todate($f,$thetime){
		$thedate = explode('-',date($f,$thetime));
		return $thedate;
	}
}
?>
