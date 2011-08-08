<?php
class Service{
	
	public static function update($deal){	//deal需要具备id和userid
		Service::update_deal($deal['id']);
		Service::update_user();
	}
	
	
	public static function update_deal($dealid){
		
	}
	
	public static function update_user(){
		global $currentUserId;
		//print_r($currentUserId);
		$sql = 'SELECT sum(amount) AS sum FROM wallet_vary WHERE userid='.$currentUserId;
		//echo '<BR>'.$sql;
		$r = Db::find($sql);
		//print_r($r);
		$sql = 'UPDATE user SET amount='.$r['sum'].' WHERE id='.$currentUserId;
		//echo '<BR>'.$sql;
		Db::excute($sql);
		
	}
	
	public static function simple_changesum($userid,$amount){
		
	}
	
	
}