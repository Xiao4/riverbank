<?php
class helper{
	
	public static function copyarr($fromarr,$ks=''){
		$_re=array();
		$karr=explode(',',$ks);
		foreach($karr AS $ks){
			$k=explode(' as ',$ks);
			if(count($k)==1){
				$_re[$k[0]]=$fromarr[$k[0]];
			}else{
				$_re[$k[1]]=$fromarr[$k[0]];
			}
		}
		return $_re;
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
		$rs = array();
		while($thread = self::$instance->fetch_array($query)){
			$rs[]=$thread;
		}
		return $rs;
	}
	
	public static function find($sql){
		$query = self::$instance->query($sql);
		while($thread = self::$instance->fetch_array($query)){
			$rs=$thread;
			break;
		}
		if( !is_null($rs) && !empty($rs) ){
			return $rs;
		}else{
			return false;
		}
	}
	
	public static function update($sql){
		self::$instance->query($sql);
	}
	
	public static function insert($sql){
		self::$instance->query($sql);
		return self::$instance->insert_id();
	}
	
	public static function excute($sql){
		self::$instance->query($sql);
	}
	
}