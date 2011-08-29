<?php
/*
*待改进成单次读取数据库，
*自动更新新加个待更新数组
*/
class Cate
{
	const CATE_EAT = 1;
	const CATE_CLOTH = 2;
	const CATE_FUN = 3;
	const CATE_INVEST = 4;
	const CATE_OTHER = 5;
	private static $_kwordsInfo=array();
	private static $_kwordInfo=NULL;
	private static $_dbid=NULL;
	
	public function get_kword_info($kword){
		if( isset(self::$_kwordInfo[$kword]) && self::$_kwordInfo[$kword] ){
			return self::$_kwordInfo[$kword];
		}else{
			$_options=array(
						'f'=>'id,info',	//find *
						'm'=>0,	//maxid
						'n'=>0,	//minid
						'w'=>'word=\''.$kword.'\'',	//where
						'l'=>1,	//len
						'o'=>'ID desc',	//orderby
					);
			$sql = DB_Sql::get('wallet_keyword',$_options);
			
			$f = DB::find($sql);
			if( $f ){
				self::$_dbid=$f['id'];
				self::$_kwordInfo[$kword] = unserialize($f['info']);
				self::$_kwordInfo[$kword]['id'] = $f['id'];
				/*
				self::$_kwordInfo[$kword] = array(
												'aigo'=>array(
													'1'=>20,
													'2'=>20,
													'3'=>20,
													'4'=>20,
													'5'=>20,
												),
												'count'=>array(
													'1'=>1,
													'2'=>1,
													'3'=>2,
													'4'=>1,
													'5'=>1,
												),
										);
										*/
			}else{
				self::$_kwordInfo[$kword]['id']=NULL;
				self::$_kwordInfo[$kword] = array(
												'name'=>$kword,
												'aigo'=>array(
													'1'=>0,
													'2'=>0,
													'3'=>0,
													'4'=>0,
													'5'=>0,
												),
												'count'=>array(
													'1'=>0,
													'2'=>0,
													'3'=>0,
													'4'=>0,
													'5'=>0,
												),
										);
			}
			if(DBUG){Debug::add( 'find: '.print_r(self::$_kwordInfo[$kword],true) );}
		}
		return self::$_kwordInfo[$kword];
	}
	
	public function add_kword($dealName,$cate){
		if( $cate ){
			if( is_string($dealName) ){
				$dealName = explode(' ',$dealName);
			}
			foreach( $dealName AS $kword ){
				//echo '<hr color=red>';
				//echo '<br>'.$kword.'<br>';
				if(DBUG){Debug::add( 'add '.$kword.' to '.' cate '.$cate );}
				self::get_kword_info($kword);
				//print_r(self::$_kwordInfo[$kword]); 
				//echo '<br>';
				self::$_kwordInfo[$kword]['count'][''.$cate]+=1;
				//print_r(self::$_kwordInfo[$kword]); 
				self::recount_kword($kword);
			}
		}
	}
	
	public function remove_kword($dealName,$cate){
		if( $cate ){
			if( is_string($dealName) ){
				$dealName = explode(' ',$dealName);
			}
			foreach( $dealName AS $kword ){
				if(DBUG){Debug::add( 'remove '.$kword.' from '.' cate '.$cate );}
				self::get_kword_info($kword);
				if( self::$_kwordInfo[$kword]['count'][''.$cate]>0 ){
					self::$_kwordInfo[$kword]['count'][''.$cate]-=1;
				}
				self::recount_kword($kword);
			}
		}
	}
	
	public function recount_kword($kword){
		//print_r( self::$_kwordInfo[$kword] );
		$sum = array_sum(self::$_kwordInfo[$kword]['count']);
		if( $sum==0  ){
			$sum = 1;
		}
		foreach(self::$_kwordInfo[$kword]['aigo'] AS $k=>$v){
			self::$_kwordInfo[$kword]['aigo'][''.$k] = (int)(self::$_kwordInfo[$kword]['count'][''.$k]/$sum*100);
		}
		/*
		echo '<br>';
		print_r( self::$_kwordInfo[$kword] );
		echo '<hr>';
		*/
		/*
		$_options=array(
					'f'=>'id,info',	//find *
					'm'=>0,	//maxid
					'n'=>0,	//minid
					'w'=>'word=\''.$kword.'\'',	//where
					'l'=>1,	//len
					'o'=>'ID desc',	//orderby
				);
		$sql = DB_Sql::get('wallet_keyword',$_options);
		$f = DB::find($sql);
		*/
		$feed=array('word'=>$kword,'addtime'=>time(),'info'=>serialize(self::$_kwordInfo[$kword]) );
		if( isset(self::$_kwordInfo[$kword]['id']) && self::$_kwordInfo[$kword]['id']>0){
			$feed['id'] = self::$_kwordInfo[$kword]['id'];
		}
		
		//echo '<br>'.$feed['id'].'<br>';
		$sql = DB_Sql::save('wallet_keyword',$feed);
		//echo '<br>'.$sql.'<br>';
		$r = DB::save($sql);
	}
	
	/*算法待改进（研究比率和数量分布）*/
	public function get_cateid($dealName){
		if( is_string($dealName) ){
			$dealName = explode(' ',$dealName);
		}
		foreach( $dealName AS $kword ){
			self::$_kwordsInfo[] = Cate::get_kword_info($kword);
		}
		
		$tmp = array();
		
		
		foreach( self::$_kwordsInfo AS $v ){
			//print_r($v);
			//echo '<hr>';
			foreach( $v['count'] AS $cateid=>$catecount ){
				//print_r($v);
				//echo '<br>'.$cateid.':'.$catecount.'<br>';
				if( !isset($tmp[''.$cateid]) ){
					$tmp[''.$cateid]=0;
				}
				$tmp[''.$cateid]+=$catecount;
			}
		}
		/*
		$tmp['1']=2;
		$tmp['2']=20;
		*/
		if( array_sum($tmp)==0 ){
			return 0;
			exit;
		}
		
		arsort($tmp);
		//print_r($tmp);
		
		foreach( $tmp AS $k=>$v ){
			$cateid = $k;
			break;
		}
		//echo $cateid;
		return $cateid;
	}
	
}
?>
