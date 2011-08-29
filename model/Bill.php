<?php
class Bill{
	
	public static function update($deal){
		$_options=array(
					'f'=>'id',	//find *
					'l'=>1,	//len
				);
		$sql = DB_Sql::get('wallet_vary',$_options);
		
		$id = DB::finds($sql);
		Debug::add($list);
		return $id;
	}
	
	
	
	
}