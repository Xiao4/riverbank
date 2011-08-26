<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 * @author wqsemc@gmail.com
 */


/**
 * Smarty ulogo modifier plugin
 *
 * Type:     modifier<br>
 * Name:     ulogo<br>
 * Date:     Nov 5th, 2008
 * Purpose:  get user avatar full path by id
 * Input:    array $userInfo
 * Input:	 string size need
 * Example:  {$var|ulogo:'48'}
 * @version 1.0
 * @param 	(Array)		$userInfo	| 用户信息, 至少包含id和icon 
 * @param 	(String)	$size		| 可选,格式(长,宽)
 * @return 	(String)	full path
 */
function smarty_modifier_ulogo($userInfo= '', $size='48') {
		$key = 'icon'.$size;
		if(is_array($userInfo['icon']))
				$ret = (array_key_exists($key, $userInfo['icon']))?$userInfo['icon'][$key]:$userInfo['icon']['icon48'];              else $ret = $userInfo['icon'];
		return $ret?$ret:'http://i0.139js.com/core/img/avatar/48x48.gif__1.gif';
}
