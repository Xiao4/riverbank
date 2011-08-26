<?php
class Skin{
	
	public static function simple(){
		$skin = Register::get('skin');
		if( in_array(substr($skin,0,5), array('phone',) ) ){
			//echo 'simple';
			return TRUE;
		}else{
			//echo 'ajax';
			return FALSE;
		}
	}
	
	
}