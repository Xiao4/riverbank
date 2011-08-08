<?php
class DB{
	private static $instance=NULL;
	
	public static function get($dbconfig){
		if ( self::$instance ) return self::$instance;
		new DB($dbconfig);
		return self::$instance;
	}
	
	private function __construct($dbconfig){
		if('mysql' == $dbconfig['driver'])
		{
			require_once('DB/Dbmysql.php');
			self::$instance = new DB_Dbmysql($dbconfig);
		}elseif('sqlite' == $dbconfig['driver'])
		{
		}
	}
	
	public static function finds($sql){
		$query = self::$instance->query($sql);
		if( isset($query['error']) ){
			return $query;
		}
		$rs = array();
		while($thread = self::$instance->fetch_array($query)){
			$rs[]=$thread;
		}
		return $rs;
	}
	
	public static function find($sql){
		$query = self::$instance->query($sql);
		if( isset($query['error']) ){
			return $query;
		}
		while($thread = self::$instance->fetch_array($query)){
			$rs=$thread;
			break;
		}
		if( isset($rs) && !is_null($rs) && !empty($rs) ){
			return $rs;
		}else{
			return false;
		}
	}
	
	public static function update($sql){
		$query = self::$instance->query($sql);
		if( isset($query['error']) ){
			return $query;
		}
		return TRUE;
	}
	
	public static function insert($sql){
		$query = self::$instance->query($sql);
		if( isset($query['error']) ){
			return $query;
		}
		return array('id'=>self::$instance->insert_id());
	}
	
	public static function getid(){
		return self::$instance->insert_id();
	}
	
	public static function excute($sql){
		$query = self::$instance->query($sql);
		if( isset($query['error']) ){
			return $query;
		}
	}
	
	public static function save($sql){
		if ('INSERT'==substr($sql,0,6)){
			return self::insert($sql);
		}else{
			return self::update($sql);
		}
	}
	
}