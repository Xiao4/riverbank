<?php
class cutword
{
	function cut($str)
	{
		$tmp = explode(' ', $str);
		echo '<pre>';
		print_r($tmp);
		echo '</pre>';
		echo '<hr>';
		
	}
}

cutword::cut('  中文   中文2   street time  不错  截得可以       0.3   ');

?>
