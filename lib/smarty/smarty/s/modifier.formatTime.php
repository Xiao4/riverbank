<?php
/**
 * Smarty page modifier plugin
 *
 * Type:     modifier<br>
 * Name:     formatTime<br>
 * @version 1.0
 * @param 	string	$time
 * @return 	string	时间格式
 */
function smarty_modifier_formatTime($time , $type=0)
{
	$now = time();
	if (empty($time)) $time = $now;
	$time = is_numeric($time) ? $time : strtotime($time);
	if (strlen($time) == strlen($now) + 3) {
		$time = floor($time/1000);
	}
	if ($type == 1) return date('Y年n月j日 H:i' , $time);
	$timeDiff = $now - $time;
	if ($timeDiff < 60) {
		return '刚刚';
	} elseif ($timeDiff >= 60 && $timeDiff < 3600) {
		return floor($timeDiff/60).'分钟前';
	} elseif($timeDiff >= 3600) {
		$timeFormat = date('Y-m-d' , $time);
		$nowFormat 	= date('Y-m-d' , $now);
		$yesterday 	= date('Y-m-d' , $now - 86400);
		list($timeYear , $timeMonth , $timeDay) = explode('-' , $timeFormat);
		list($nowYear , $nowMonth , $nowDay) = explode('-' , $nowFormat);
		if (strncmp($nowFormat, $timeFormat, 4) > 0) {
			return date('Y-m-d H:i' , $time);
//		} elseif (strncmp($nowFormat, $timeFormat, 7) >= 0) {
//			return ($nowMonth - $timeMonth).'月前';
		} elseif (strncmp($yesterday , $timeFormat, 10) == 0) {
			return date('昨天 H:i', $time);
		} elseif (strncmp($nowFormat, $timeFormat, 10) == 0) {
			return date('今天 H:i', $time);
		} else {
			return date('m月d日 H:i' , $time);
		}
	} else {
		return date('n/j H:i' , $time);
	}
}
