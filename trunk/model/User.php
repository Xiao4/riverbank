<?php
class User{
	public static function maxid(){
		$_options=array(
					'f'=>'id',	//find *
					'l'=>1,	//len
				);
		$sql = DB_Sql::get('user',$_options);
		
		$id = DB::finds($sql);
		Debug::add($list);
		return $id;
	}
	
	public static function logined(){
		global $currentUserId;
		if( isset($_COOKIE['user']) && $_COOKIE['user']>0 ){
			$currentUserId = $_COOKIE['user'];
			return $currentUserId;
		}
		return FALSE;
	}
	
	public static function login($user,$password){
		session_start();
		$options=array(
				'f'=>'id,password',
				'w'=>'email=\''.$user.'\' ',
				'l'=>1,
			);
		$sql = DB_Sql::get('user',$options);
		$r = DB::find($sql);
		
		if( isset($r['id']) && $r['id']>0 ){
			if(  $r['password'] == $password ){
				setcookie("user",$r['id'], time()+3600*24,'/'.APPNAME);
				//return $r['id'];
				return array('data'=>$r['id'],'msg'=>'登录成功');
			}else{
				return array('error'=>USER_WRONG_PASSWORD,'msg'=>lang('USER_WRONG_PASSWORD'));
			}
		}else{
			return array('error'=>USER_NOT_EXIST,'msg'=>lang('USER_NOT_EXIST'));
		}
		//print_r($r);
		Debug::add($r);
	}
	
	//$feed 接收id 或者对象
	public static function delete($feed){
		
		if( is_numeric($feed) ){
			$feed=array('id'=>$feed);
		}
		
		$sql = DB_Sql::dele('user',$feed);
		//echo $sql;
		//exit;
		$r = DB::excute($sql);
		Debug::add($r);
	}
	
	public static function update($feed){
		$sql = DB_Sql::save('user',$feed);
		$r = DB::save($sql);
		return $r;
		Debug::add($r);
	}
	
	public static function get($options){
		
		$_options=array(
					'f'=>'*',	//find *
					'm'=>0,	//maxid
					'n'=>0,	//minid
					'w'=>'',	//where
					'l'=>1,	//len
					's'=>0,	//start
					'o'=>'ID desc',	//orderby
				);
		$_options = array_merge($_options, $options);
		$sql = DB_Sql::get('user',$_options);
		
		$list = DB::finds($sql);
		Debug::add($list);
		return $list;
	}
	
	
	
	
	
	
	
	
	
	
}