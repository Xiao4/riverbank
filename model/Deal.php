<?php
class Deal{
	
	public static function save($feed){
		global $currentUserId;
		$feed['userid']=$currentUserId;
		$feed['addtime']=time();
		$feed['thedate']=date('Ymd',time());
		
		if( Auto::cate() ){
			$feed['category'] = Deal::save_to_cate($feed['thing']);
		}else{
			//echo 'no cate';
			$feed['category'] = 0;
		}
		$sql = DB_Sql::save('wallet_vary',$feed);
		$r = DB::save($sql);
		if( isset($r['error']) ){
			//echo 'w';
		}
		Deal::save_tags($feed['thing'],$r['id']);
		
		$r['userid'] = $currentUserId;
		$r['category'] = $feed['category'];
		
		
		//更新用户记录
		Service::update();
		
		//更新添加频率
		Service::updateUserKeyWord();
		
		
		Debug::add($r);
		return $r;
	}
	
	//$分析出deal名称和价格
	public static function get_deal_info($dealStr){
			$tmp = explode(' ',$dealStr);
			$len = count($tmp);
			for($i=$len-1; $i>-1; $i--){
				if( ''!= $tmp[$i] ){
					$price = $tmp[$i];
					$position = $i;
					break;
				}
			}
			$dealname = array();
			for($i=0; $i<$position; $i++){
				if( ''!= $tmp[$i] ){
					$dealname[]= $tmp[$i];
				}
			}
			if( !is_float($price) && !is_numeric($price) ){
				return array('error'=>TRUE,'msg'=>'请输入价格');
			}
			
			return array( 
					'thing' => implode(' ',$dealname),
					'amount' => $price,
				);
	}
	
	//$feed 接收id 或者对象
	public static function delete($feed){
		
		if( is_numeric($feed) ){
			$feed=array('id'=>$feed);
		}
		
		$sql = DB_Sql::dele('wallet_vary',$feed);
		Tag::delete($feed['id']);
		//echo $sql;
		//exit;
		$r = DB::excute($sql);
		Service::update();
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
	
	//自动存储namekeys
	/*
	public static function save_cate_auto($dealName){
		$cateid = Cate::get_cateid($dealName);
		Cate::add_kword($dealName, $cateid);
		return $cateid;
	}
	*/
	
	//存储namekeys
	public static function save_to_cate($dealName,$addCate=0,$removeCate=0){
		if( $removeCate ){
			Cate::remove_kword($dealName, $removeCate);
		}
		if( (int)$addCate>0 ){
			$cateid = $addCate;
			Cate::add_kword($dealName, $addCate);
		}else{
			$cateid = Cate::get_cateid($dealName);
			Cate::add_kword($dealName, $cateid);
		}
		
		return $cateid;
	}
	
	//存储namekeys
	public static function save_tags($dealName,$dealid){
		
		if( is_string($dealName) ){
			$dealName = explode(' ',$dealName);
		}
		foreach( $dealName AS $kword ){
			if( ''!=trim($kword) ){
				if(DBUG){Debug::add( 'get '.$kword.' ' );}
				Tag::add($kword,$dealid);
			}
			
		}
	}
	
	
}
