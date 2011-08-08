<?php
date_default_timezone_set('Asia/Chongqing');
setlocale(LC_ALL, 'en_US.utf-8');
header("content-type:text/html; charset=utf-8");

define('ROOT_PATH',realpath(dirname(__FILE__)).'/');
define('CONTROLLER_PATH',ROOT_PATH.'controller/');
define('MODEL_PATH',ROOT_PATH.'model/');
define('MODULE_PATH',ROOT_PATH.'module/');

require_once ROOT_PATH.'/config/config.inc.php';

//i18n
$appstr = require_once ROOT_PATH.'/i18n/'.LANG.'/lang.php';
$appstr = require_once MODULE_PATH.'/core.php';

//数据库初始化
$db = DB::get($config_db);
Register::set('db',$db);	//Register
$db = Register::get('db');

/*
			$deal = '  你好     25.65     ';
			
			$tmp = explode(' ',$deal);
			$deal = array();
			for( $tmp AS $v ){
				if (''==$v){
					
				}else{
					
				}
			}
			$deal['thing'] = $tmp[0];
			$deal['amount'] = $tmp[1];
exit;
*/
preg_match("|([^0-9]+)[\s](-?\d+(\.\d+)?)|i",
    "  你 好 0.2   ", $matches);
print_r($matches);
$deal = array();
if( count($matches)>2 ){
	$deal['thing'] = trim($matches[1]);
	$deal['amount'] = $matches[2];
}
print_r($deal);



preg_match_all ("|([^0-9]+)[\s](-?\d+(\.\d+)?)|U",
    "你好 10.2 不好 36.5",
    $out, PREG_PATTERN_ORDER);
print_r($out);


preg_match_all ("|([^\s0-9]+)[\s]+(-?\d+(\.\d+)?)|i",
    "你好 -10.2 不好 36.5
    不好2    56.87 
    ",
    $out, PREG_PATTERN_ORDER);
print_r($out);

preg_match_all ("|([^\s0-9]+)[\s]+(-?\d+(\.\d+)?)|i",
    "你好 -10.2 不好 36.5
    不好2    56.87 
    ",
    $out, PREG_PATTERN_ORDER);
print_r($out);



//Service::update_user(13);
exit;
		$options=array(
					'f'=>'w.*,u.*,u.amount AS sum,w.amount AS amount',	//find *
					'w'=>'w.id>1',	//where
					'l'=>10,	//len
					//'s'=>0,	//start
					'o'=>'w.ID desc',	//orderby
				);
		$sql = DB_Sqllink::get('w,u',$options);
		echo $sql.'<br>';
		
		$rs = DB::finds($sql);
		print_r($rs);
		
		echo '<hr>';
		$rs = DB::finds( DB_Sqllink::get('w,u',$options) );
		print_r($rs);


/*
$query = $db->query('select * from user ;');
while($thread = $db->fetch_array($query)){
	$rs[]=$thread;
}
print_r($rs);
*/
//请求过滤


/*test------------------------------

$request = Request::getrequest();

Register::set('request',$request);	//Register
$request = Register::get('request');

//print_r($request);


Controller::run($request);




*/

/*


$sql = DB_Bridge::set('user')->find('id,userid,addtime')->where(" 2>1 ")->limit(5)->sql();
echo $sql;
$rs = DB::finds($sql);
print_r($rs);



$db = Register::get('db');
$query = $db->query('select * from user ;');
while($thread = $db->fetch_array($query)){
	$rs[]=$thread;
}


print_r($rs);
*/


/*
$a=new A;
Rigister::set('a',$a);
$ga = Rigister::get('a');
var_dump($ga);

$a='ccccc<br>';
$g2 = Rigister::get('a');
var_dump($g2);

echo ($ga === $g2)?'TRUE':'FALSE';


Register::set('request',$request);	//Register
$request = Register::get('request');



///DB_Bridge///////////////////////////////////////////////////////////////
echo DB_Bridge::set('user')->find('id,addtime')->where("1>2 and 2>3")->limit(5,1)->sql();

echo '<hr>';

echo DB_Bridge::set('user','insert',array('a'=>'b','c'=>'d',))->where("1>2 and 2>3")->sql();

echo '<hr color=red>';

echo DB_Bridge::set('user','update',array('a'=>'b','c'=>'d',))->where("1>2 and 2>3")->sql();

echo '<hr color=green>';

echo DB_Bridge::set('user','delete')->where("1>2 and 2>3")->sql();
//////////////////////////////////////////////////////////////////

*/



/*


		$sql = DB_Bridge::set('wallet_vary')->find('*')->order('ID DESC')->limit(1)->sql();
		$list = DB::find($sql);
		Debug::add($list);
		
		$sql = DB_Bridge::set('wallet_vary')->find('*')->order('ID DESC')->sql();
		$list = DB::finds($sql);
		Debug::add($list);

*/



/*
		$options=array(
					'f'=>'*',	//find *
					'm'=>50,	//maxid
					'n'=>3,	//minid
					'w'=>'2>1',	//where
					'l'=>50,	//len
					's'=>2,	//start
					'o'=>'ID desc',	//orderby
				);
		echo DB_Sql::get('wallet_vary',$options)->select();
		echo '<hr>';
		echo DB_Sql::get('wallet_vary',array('f'=>'*','i'=>3))->select();
		echo '<hr>';
		echo DB_Sql::get('wallet_vary',array('f'=>'*','i'=>5))->delete();
		echo '<hr>';
		
		$feed=array(
				'a'=>'b',
				'c'=>'d',
			);
		echo DB_Sql::get('wallet_vary')->insert($feed);
		echo '<hr>';
		
		echo DB_Sql::get('wallet_vary',$options)->update($feed);
		echo '<hr>';
*/
		
		
		
		
		
		
		
		
		
