<?php
define('DBUG',1);
define('LANG','zh_cn');
define('SKIN','wap');
define('TABLE_HEAD','rv_');

define('BASEURL','http://'.$_SERVER['HTTP_HOST'].'/'.APPNAME.'');

$config_db = array(
	'driver'=>'mysql',
	'host'=>'localhost',
	'username'	=>'river',
	'userpwd'	=>'river',
	'charset'	=>'utf8',
	'tabhead'	=>'',
	'database'	=>'river'
);

//user
define('USER_NOT_EXIST','0001');
define('USER_WRONG_PASSWORD','0002');
