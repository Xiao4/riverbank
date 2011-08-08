<?php
/*
echo '<pre>';
print_r($_SERVER);
echo '</pre>';
//exit;
*/
require('init.inc.php');
APP::run($request);

if( isset($_COOKIE['debug']) ){
	Debug::dump();
}
