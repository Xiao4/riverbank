<?php

class Lib_Calendar
{
	function Lib_Calendar(){
	}
	/** 
	* �������ڣ����ظ�����֮ǰ�����һ����һ��֮�������һ�����գ�������վ�����һ�����գ��Ե�����Ϊ���е�һ������ֵ 
	* 
	* @param string $date ���ڣ���2010-01-13��20100113 
	* @return array 
	*/ 
	function get_date_range($date) { 
		// �������� �˴��� 
		$time_this = strtotime($date); 
		$time_week_start = strtotime(date('Ymd', $time_this)) - (date('N', $time_this) - 1) * 86400; 
		$date_week_start = date('Ymd', $time_week_start); 
		$date_week_end = date('Ymd', $time_week_start + 6 * 86400); 
		return array($date_week_start, $date_week_end); 
	}
	
	function findday($fromday,$daydiff){
		$stime = mktime (0,0,0,substr($fromday,4,2),substr($fromday,6,2),substr($fromday,0,4));
		$target0time=$stime+3600*($daydiff*24);
		$targetday=date("Ymd",$target0time);
	//	echo $targetday;
		return $targetday;
	}
	
	function test($date) { 
		$array = array( 
			'2010-01-10', 
			'2010-01-14', 
			'2010-01-17', 
			'2009-12-31', 
			'2010-02-01', 
		); 

		foreach ($array as $date) { 
			$ret = get_date_range($date); 
			echo "Date: {$date}, week from {$ret[0]} to {$ret[1]} <br />\n"; 
		} 
	}
}
?>