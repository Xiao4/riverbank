<?php

class Lib_Calendar
{
	function Lib_Calendar(){
	}
	/** 
	* 输入日期，返回该日期之前最近的一个周一和之后最近的一个周日，如果当日就是周一或周日，以当日作为其中的一个返回值 
	* 
	* @param string $date 日期，如2010-01-13或20100113 
	* @return array 
	*/ 
	function get_date_range($date) { 
		// 参数检验 此处略 
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