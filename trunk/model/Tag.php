<?php
class Tag
{
	
	public static function get($options){
		
		$_options=array(
					'f'=>'*',	//find *
					'm'=>0,	//maxid
					'n'=>0,	//minid
					'w'=>'',	//where
					'l'=>2000,	//len
					's'=>0,	//start
					'o'=>'ID desc',	//orderby
				);
		$_options = array_merge($_options, $options);
		$sql = DB_Sql::get('wallet_tag',$_options);
		
		$list = DB::finds($sql);
		Debug::add($list);
		return $list;
	}
	
	public function add($tag,$dealid){
		
		global $currentUserId;
		$feed['uid']=$currentUserId;
		$feed['addtime']=time();
		$feed['thedate']=date('Ymd',time());
		$feed['wid']=$dealid;
		$feed['tag']=$tag;
		
		$sql = DB_Sql::save('wallet_tag',$feed);
		$r = DB::save($sql);
		if( isset($r['error']) ){
			//echo 'w';
		}
		
		Debug::add($r);
		return $r;
	}
	
	public function delete($dealid){
		$_options=array(
					'w'=>'wid=\''.$dealid.'\'',	//where
				);
		$sql = DB_Sql::dele('wallet_tag','',$_options);
		//echo $sql;
		$r = DB::excute($sql);
		
	}
}
?>
