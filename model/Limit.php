<?php
class Limit{
	
	
	//$feed 接收id 或者对象
	public static function delete($feed){
		
		if( is_numeric($feed) ){
			$feed=array('id'=>$feed);
		}
		
		$sql = DB_Sql::dele('wallet_limit',$feed);
		//echo $sql;
		//exit;
		$r = DB::excute($sql);
		Debug::add($r);
	}
	
	public static function update($feed,$options){
		//$feed['xyz']='aa';
		$now = time();
		$feed['userid'] = User::getCurrentId();
		$_options=array(
					'w'=>'userid='.$feed['userid'].' AND startdate='.$feed['startdate'].' AND enddate='.$feed['enddate'].'',	//where
				);
		if( isset($options['w']) && ''!=$options['w'] ){
			$options['w'] = $_options['w'].' AND '.$options['w'];
		}else{
			$options['w'] = $_options['w'].'';
		}
		
		$_options = array_merge($_options, $options);
		
		/*
			获取已经处理过的数据，分析比率，传给后面的存储方法
			
		*/
		
		$sql = DB_Sql::get('wallet_limit',$_options)->update($feed);
		$r = DB::update($sql);
		if( isset($r['error']) ){
			//echo 'w';
		}elseif( !$r ){
			echo 'need add';
			self::save($feed);
		}
		
		Service::update();
		Debug::add($r);
		return $r;
	}
	
	public static function save($feed){
		//$feed['xyz']='aa';
		$sql = DB_Sql::save('wallet_limit',$feed);
		$r = DB::update($sql);
		if( isset($r['error']) ){
			//echo 'w';
		}
		return $r;
	}
	
	public static function get($options){
		$now = time();
		$_options=array(
					'f'=>'*',	//find *
					'm'=>0,	//maxid
					'n'=>0,	//minid
					'w'=>'userid='.User::getCurrentId().' ',	//where
					'l'=>1,	//len
					's'=>0,	//start
					'o'=>'ID desc',	//orderby
				);
		if( isset($options['w']) ){
			$options['w'] = $_options['w'].' AND '.$options['w'];
		}
		$_options = array_merge($_options, $options);
		$sql = DB_Sql::get('wallet_limit',$_options);
		//echo $sql;
		$list = DB::finds($sql);
		Debug::add($list);
		return $list;
	}
	
	
	
	
	
	
	
	
	
	
}