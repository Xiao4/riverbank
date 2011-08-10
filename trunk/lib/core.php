<?php
function myautoload($classname)
{
	if('controller_' == substr($classname,0,1)){
		echo '<br>'.$classname.'<br>';
	}
	$filename = str_replace('_','/',$classname).'.php';
	$filepath = $filename;
	if(file_exists($filepath)) { return require($filepath);}
	elseif($filepath = MODEL_PATH.$filename AND file_exists($filepath)) 
	{
		return require($filepath);
	}
	else
	{
		$filepath = MODULE_PATH.$filename;
		if(file_exists($filepath)) { return require($filepath);}
	}
}
spl_autoload_register('myautoload');

function dump($v){
	if( isset($v) ){
		var_dump($v);
	}
}

//模板调用的输出方法	start
function lang($k,$echo=TRUE){
	global $lang;
	if( isset($lang[$k]) ){
		return $lang[$k];
	}else{
		return $lang[$k];
	}
}

function printtime($time,$echo=TRUE){
	$diff = (time()-$time)/1;
	if( $diff<=60 ){
		return '刚刚';
	}elseif( $diff<=1800 ){
		return '30分钟内';
	}elseif( $diff<=3600 ){
		return '1小时内';
	}elseif( $diff<=3600*24 ){
		return '今天';
	}elseif( $diff<=3600*24*3 ){
		return '3天内';
	}elseif( $diff<=3600*24*7 ){
		return '一周内';
	}elseif( $diff<=3600*24*30 ){
		return '一个月内';
	}else{
		return '一个月前';
	}
}

function urlto($routename='default',$args=NULL,$echo=TRUE){
	$routename = (''==$routename)? 'default':$routename;
	$map = Register::get('routemap');
	if($args){
		eval('$args=array('.$args.');');
	}
	/*
	print_r($args);
	echo '<hr>';
	print_r($map);
	echo '<hr>';
	print_r($controller);
	echo '<hr>';
	print_r($action);
	echo '<hr>';
	*/
	return BASEURL.$map->url_for($routename,$args);
}
//模板调用的输出方法	end

class Register{
	private static $_=array();
	
	public static function set($key,$val){
		self::$_[$key]=$val;
	}
	
	public static function get($key){
		return isset(self::$_[$key])
				? self::$_[$key]
				: NULL ;
	}
	
}

class Request{
	
	private static $injection_find=	array("/insert /i","/update /i","/delete /i","/select /i","/ or /i","/ and /i","/ union /i","/drop /i","/#/i");
	private static $injection_replace=	array("{INSERT} ","{UPDATE} ","{DELETE} ","{SELECT} "," {OR} "," {AND} "," {UNION} ","{DROP} ","{#}");
	
	function safty(&$array){
		foreach($array as $key=>$value){
			if(!is_array($value)){
				$array[$key]=addslashes(urldecode($value));
				$array[$key]=preg_replace(self::$injection_find,self::$injection_replace,$array[$key]);
			}else{
				self::safty($array[$key]);
			}
		}
	}
	
	function getrequest(){
		$request = $_GET;
		foreach( $_POST AS $k=>$v ){
			$request[$k] = $v;
		}
		//Request::safty($request);
		return $request;
	}
}

Class view{
	private static $view=NULL;
	
	public static function set($viewobj){
		if ( self::$view ){
			return self::$view;
		}
		self::$view= $viewobj;
	}
	
	public static function assign($a,$b=NULL){
		if(!$b){
			self::$view->assign($a);
		}else{
			self::$view->assign($a,$b);
		}
	}
	
	public static function display($a){
		
		global $currentUserId;
		//echo $currentUserId;
		self::assign('currentUserId',$currentUserId);
		self::$view->display($a);
	}
	
	public static function fetch($a){
		return self::$view->fetch($a);
	}
	
}

Class APP{
	static $controller = '';
	static $action = '';
	static $view = '';
	function run($request){
		
		$conroller = isset($request['c'])?$request['c']:'d';
		$action = isset($request['a'])?$request['a']:'i';
		
		$map = new routemap( array( 'url_rewriting' => TRUE ) );
		Register::set('routemap',$map);
		
		require_once ROOT_PATH.'/config/route.php';
		$route=$actions=$args=NULL;
		try
		{
			//echo BASEURL;
			/*
			echo '<pre>';
			print_r($_SERVER);
			echo '</pre>';
			*/
			if( $len = strpos( $_SERVER['REQUEST_URI'],'?' ) ){
				$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'],0,$len);
				//echo '<b>cuuuuuuuuut</b>';
			}
			if( substr($_SERVER['REQUEST_URI'],-1,1)=='/' ){
				$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-1);
			}
			//print_r($_GET);
			//echo '<hr>'.$_SERVER['REQUEST_URI'].'<hr>';
			$urltodespath = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$urltodespath = str_replace(BASEURL,'',$urltodespath);
			$urltodespath = substr($urltodespath,0,4)=='http' ? '' : $urltodespath;
			//echo $urltodespath;
			//get baseurl to analysis
			
			list($route, $actions, $args) = $map->match($urltodespath);
		}
		catch(Exception $e)
		{
			die('error when routing');
		}
		if( isset($_COOKIE['route']) ){
			echo '<br>route<br>';
			dump($route);
			echo '<br>actions<br>';
			dump($actions);
			echo '<br>args<br>';
			dump($args);
			echo '<br>request<br>';
			dump($_REQUEST);
		}
		/*
		*/
		if( isset($actions[0]) AND isset($actions[1]) ){
			list($conroller,$action) = $actions;
		}
		$conroller = 'controller_'.$conroller;
		$action = 'action_'.$action;
		
		if(!method_exists($conroller,$action))
		{
			//$conroller = 'controller_d';$action='action_i';
		}
		
		$controller = new $conroller();
		$controller->db = Register::get('db');
		$controller->request = Register::get('request');
		
		if ( defined('SKIN') ){
			$skin = SKIN;
		}else{
			$skin = ( isset($_COOKIE['skin']) && ''!=$_COOKIE['skin'] )? 
					$_COOKIE['skin']: 
					'default';
		}
		require_once MODULE_PATH.'/smarty/init.php';
		$controller->view = $smarty;
		view::set($smarty);
		
		$controller->init();
		$controller->run($action);
		/*
			call_user_func(array($conroller,'init'));
			call_user_func(array($conroller,$action));
		*/
		//print_r($controller->view);
	}
	
}
