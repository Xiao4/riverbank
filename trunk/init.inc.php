<?php
date_default_timezone_set('Asia/Chongqing');
setlocale(LC_ALL, 'en_US.utf-8');
header("content-type:text/html; charset=utf-8");

define('ROOT_PATH',realpath(dirname(__FILE__)).'/');
define('CONTROLLER_PATH',ROOT_PATH.'controller/');
define('MODEL_PATH',ROOT_PATH.'model/');
define('MODULE_PATH',ROOT_PATH.'lib/');
define('APPNAME', substr(dirname(__FILE__) ,strrpos(dirname(__FILE__),DIRECTORY_SEPARATOR)+1) );
//echo APPNAME;

require_once ROOT_PATH.'config/config.inc.php';

global $currentUserId;
//i18n
$lang = ( isset($_COOKIE['lang']) && ''!=$_COOKIE['lang'] )? $_COOKIE['lang']:'zh_cn';
global $lang;
$lang = require_once ROOT_PATH.'i18n/'.$lang.'/lang.php';
//Register::set('lang',$lang);

require_once MODULE_PATH.'core.php';

//数据库初始化
$db = DB::get($config_db);//Register::set('db',$db);

//请求过滤
$request = Request::getrequest();
Register::set('request',$request);

//print_r(  );