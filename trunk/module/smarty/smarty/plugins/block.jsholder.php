<?php
define('SMARTY_JSHOLDER_FILE_PER_URL', 30);
function smarty_block_jsholder($params, $content, &$smarty, &$repeat) {
	if($repeat)
		return;

	static $cont = array();

	$output = (isset($params['output']) and $params['output']);
	if($output) {
		if(empty($cont))
			return '""';

		foreach ($cont as $key => $value) {
			if($key)
			$url .= '<script type="text/javascript" src="' .BASEURL . $key. '"></script>';
		}   

		return $url;
	}   

	if(empty($content))
		return ''; 

	foreach(explode("\n", $content) as $v) {
		if(empty($v))
			continue;

		$v = trim($v);
		$v = ltrim($v, '/');
		$cont[$v] = 1;
	}   
}

