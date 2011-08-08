<?php
class Wallet{
	
	public static function maxid(){
		$_options=array(
					'f'=>'id',	//find *
					'l'=>1,	//len
				);
		$sql = DB_Sql::get('wallet_vary',$_options);
		
		$id = DB::finds($sql);
		Debug::add($list);
		return $id;
	}
	
	//$feed 接收id 或者对象
	public static function delete($feed){
		
		if( is_numeric($feed) ){
			$feed=array('id'=>$feed);
		}
		
		$sql = DB_Sql::dele('wallet_vary',$feed);
		//echo $sql;
		//exit;
		$r = DB::excute($sql);
		Debug::add($r);
	}
	
	public static function update($feed){
		//$feed['xyz']='aa';
		$sql = DB_Sql::save('wallet_vary',$feed);
		$r = DB::save($sql);
		if( isset($r['error']) ){
			//echo 'w';
		}
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
		$sql = DB_Sql::get('wallet_vary',$_options);
		
		$list = DB::finds($sql);
		Debug::add($list);
		return $list;
	}
	
	
	
	
	
	
	
	
	
	
}