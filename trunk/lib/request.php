<?php
class request{
	private static $instance=NULL;
	
	public static function instance($dbconfig){
		if ( self::$instance ) return self::$instance;
		new DB($dbconfig);
		return self::$instance;
	}
	
	private function __construct($dbconfig){
		if('mysql' == $dbconfig['driver'])
		{
			// realpath(dirname(__FILE__)).'/DB/Dbmysql.php'
			require_once('DB/Dbmysql.php');
			self::$instance = new DB_Dbmysql($dbconfig);
		}else
		{
		}
	}
	
	private function safety(){
		if('mysql' == $dbconfig['driver'])
		{
			require_once('DB/Dbmysql.php');
			self::$instance = new DB_Dbmysql($dbconfig);
		}elseif('sqlite' == $dbconfig['driver'])
		{
		}
	}
	
	
}