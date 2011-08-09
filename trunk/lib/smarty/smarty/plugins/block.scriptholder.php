<?php
function smarty_block_scriptholder($params, $content, &$smarty, &$repeat) {
	if($repeat)
		return;

	static $scriptinline = array();

	$output = (isset($params['output']) and $params['output']);
	if($output) {
		if(empty($scriptinline))
			return '""';
		$jsinline = implode("\n",$scriptinline); 
		return	preg_replace('/((<|\<\/)script.*?>)|(<script.*)|(.*><\\/script.*)/', '', $jsinline); 
	}   

	if(empty($content))
		return ''; 

	$scriptinline[] = rtrim(ltrim($content));
}

