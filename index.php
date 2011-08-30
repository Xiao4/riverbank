<?php
ini_set('display_errors',1);
/*
echo '<pre>';
print_r($_SERVER);
echo '</pre>';
//exit;
*/
require('init.inc.php');
//echo '<br>1'.__FILE__.'<br>';

APP::run($request);
if( isset($_COOKIE['debug']) && !Register::get('ajax') ){
	Debug::dump();
}
