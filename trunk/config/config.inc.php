<?php
define('DBUG',1);
define('LANG','zh_cn');
define('SKIN','default/');
define('BASEURL','http://'.$_SERVER['HTTP_HOST'].'/'.APPNAME.'/');

$config_db = array(
	'driver'=>'mysql',
	'host'=>'localhost',
	'username'	=>'root',
	'userpwd'	=>'coolsou',
	'charset'	=>'utf8',
	'tabhead'	=>'',
	'database'	=>'river'
);

//user
define('USER_NOT_EXIST','0001');
define('USER_WRONG_PASSWORD','0002');
