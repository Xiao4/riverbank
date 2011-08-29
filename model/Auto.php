<?php
class Auto{
	
	public static function cate(){
		if( Skin::simple() ){
			return  FALSE;
		}
		return TRUE;
	}
	
	
}