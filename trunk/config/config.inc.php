<?php
define('DBUG',1);
define('LANG','zh_cn');
define('SKIN','default/');
/*
if (DBUG) {echo '<br>im in config folder<br>'.__FILE__.':'.__LINE__.'<BR>';}
*/


$config_db = array(
	'driver'=>'mysql',
	'host'=>'localhost',
	'username'	=>'root',
	'userpwd'	=>'coolsou',
	'charset'	=>'utf8',
	'tabhead'	=>'',
	'database'	=>'river'
);

define('BASEURL','http://'.$_SERVER['HTTP_HOST'].'/wallet/');

//user
define('USER_NOT_EXIST','0001');
define('USER_WRONG_PASSWORD','0002');
