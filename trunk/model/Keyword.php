<?php
class Keyword
{
	private static $_keywords=array();
	
	public function set_keywords($dealName){
		if( is_string($dealName) ){
			$dealName = explode(' ',$dealName);
		}
		foreach( $dealName AS $kword ){
			self::$_kwordInfo[] = Cate::get_kword_info($kword);
		}
	}
	
	public function get_cate(){
		
		foreach( self::$_kwordInfo AS $v ){
			
		}
		return $cate;
	}
	
	
}
?>
