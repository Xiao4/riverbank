<?php
class rdate
{
	private $_time = 0;
	private $_today = 0;
	private $_month = 0;
	private $_today_s_time = 0;
	private $_today_e_time = 0;
	
	public function __construct($time=NULL){
		if( $time ){
			$this->_time=$time;
		}else{
			$this->_time=time();
		}
		$this->_today=date("Ymd",$this->_time);
		
		$this->_today_s_time = $this->_get_start_time_of_day($this->_today);
		$this->_today_e_time = $this->_today_s_time + 60*60*24;
		$this->_month=date("Ym",$this->_time);
		
		/*
		*/
	}
	
	function _get_start_time_of_day($date){
		return mktime (0,0,0,substr($date,4,2),substr($date,6,2),substr($date,0,4));
	}
	
	function getday($datestr=NULL, $diff=1){
		if( !$datestr){
			$datestr = $this->_today;
		}
		$r = array();
		$r['start'] = mktime (0,0,0,substr($datestr,4,2),substr($datestr,6,2),substr($datestr,0,4))+ 60*60*24*($diff);
		$r['end'] = $r['start'] + 60*60*24*1;
		$r['name'] = 'day:'.date("Ymd",$r['start']);
		
		/*
		echo '<br>';
		echo '<br>';
		echo date("Ymd H:i:s",$r['start']);
		echo '<br>';
		echo date("Ymd H:i:s",$r['end']);
		echo '<br>';
		echo '<br>';
		/*
		*/
		return $r;
	}
	
	function getmonth($monthstr=NULL, $diff=1){
		if( !$monthstr){
			$monthstr = $this->_month;
		}
		$nextmonth = $this->_getmonth($monthstr,$diff);
		$r = array();
		$r['start'] = mktime (0,0,0,substr($monthstr,4,2),1,substr($monthstr,0,4));
		$r['end'] = mktime (0,0,0,substr($nextmonth,4,2),1,substr($nextmonth,0,4));
		$r['name'] = 'month:'.date("Ym",$r['start']);
		//echo '<br>'.date("Ymd",$r['end']).'<br>';
		//print_r($r);
		/*
		echo '<br>';
		echo '<br>';
		echo date("Ymd H:i:s",$r['start']);
		echo '<br>';
		echo date("Ymd H:i:s",$r['end']);
		echo '<br>';
		echo '<br>';
		*/
		return $r;
	}
	
	function today(){
		return array(
				'name' => 'day:'.$this->_today,
				'start' => $this->_today_s_time,
				'end' => $this->_today_e_time,
			);
	}
	
	function thisweek($fromday=NULL){
		$fromday = ($fromday) ? $fromday:$this->_today;
		//echo '<br><b>'.$fromday.'</b><br>';
		$time = $this->_get_start_time_of_day($fromday);
		$whichday = date("w",$time);
		//echo '<br>'.$whichday.'<br>';
		$firstday = $this->findday($fromday,(-1*$whichday)+1);
		//echo '<br>'.$firstday.'<br>';
		$lastday = $this->findday($firstday,7);
		$endday = $this->findday($lastday,-1);
		//echo '<br>'.$lastday.'<br>';
		
		return array(
				'start' => $this->_get_start_time_of_day($firstday),
				'end' => $this->_get_start_time_of_day($lastday),
				'name' => 'week:'.$firstday.'-'.$endday,
			);
	}
	
	function _getmonth($monthstr, $num=1){
		$_list = array(1,2,3,4,5,6,7,8,9,10,11,12);
		$year = (int)substr($monthstr,0,4);
		$month = (int)substr($monthstr,4,2);
		for( $i=0;$i<$num;$i++ ){
			$month++;
			if( $month==13 ){
				$month=1;
				$year+=1;
			}
		}
		//echo '<b>'.date("Ym",mktime(0,0,0,$month,1,$year)).'</b>';
		return date("Ym",mktime(0,0,0,$month,1,$year));
	}
	
	function displacement($range,$rangediff){
	}
	
	function getrange($head,$day,$date=NULL){
		if (!$date){
			$tmp = $this->_today_s_time;
		}else{
			$tmp = $this->_get_start_time_of_day($date);
		}
		$start = $tmp + 60*60*24*$head;
		$end = $start + 60*60*24*($day);
		return array(
				'name' => 'range:'.date("Ymd",$start).'-'.date("Ymd",$end),
				'start' => $start,
				'end' => $end,
			);
	}
	
	
	function findday($fromday=NULL,$daydiff=0){
		$fromday = ($fromday) ? $fromday:$this->_today;
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

/*
$rdate = new rdate(time());
$today = date('Ymd',time());
		echo '<br>';
		echo $rdate->findday($today,1);
		echo '<br>';
		echo $rdate->findday($today,-1);
		
		echo '<br>';
		//print_r($timerange = $rdate->getrange(-7,6));
		echo '<br>';
		print_r( $rdate->getmonth('',1) );
		echo '<br>';
		print_r( $rdate->getday('',0) );
		echo '<br>';
		print_r( $rdate->thisweek() );
		echo '<br>';
		print_r( $rdate->thisweek( $rdate->findday($today,1) ) );
		
echo '<hr color=red>';
$rdate = new rdate( mktime(0,0,0,12,1,2011) );

$today = '20111221';
		echo '<br>';
		echo $rdate->findday($today,1);
		echo '<br>';
		echo $rdate->findday($today,-1);
		
		echo '<br>';
		//print_r($timerange = $rdate->getrange(-7,6));
		echo '<br>';
		print_r( $rdate->getmonth('',1) );
		echo '<br>';
		print_r( $rdate->getday('',0) );
		echo '<br>';
		print_r( $rdate->thisweek() );
		echo '<br>';
		print_r( $rdate->thisweek( $rdate->findday($today,1) ) );
*/

?>
