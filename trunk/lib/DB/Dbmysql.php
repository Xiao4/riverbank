<?php
//echo '<br>'.__FILE__;
Class DB_Dbmysql {
	var $query_num = 0;
	var $num = 0;
	var $charset='utf8';
	var $dbTablePrefix='spd_';
	var $db_lp;
	var $tab;


	function DB_Dbmysql($db) {
		$this->dbTablePrefix=$db['tabhead'];
		$this->tab=$db['tabhead'];
		$this->charset=$db['charset'];
		$this->connect($db['host'], $db['username'], $db['userpwd'], $db['database'], 0);
	}

	function connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect = 0) {
		$pconnect==0 ? @mysql_connect($dbhost, $dbuser, $dbpw) : @mysql_pconnect($dbhost, $dbuser, $dbpw);
		mysql_errno()!=0 && $this->halt("Connect($pconnect) to MySQL failed");
		if($this->server_info() > '4.1' && $this->charset){
			mysql_query("SET character_set_connection=".$this->charset.", character_set_results=".$this->charset.", character_set_client=binary");
		}
		if($this->server_info() > '5.0'){
			mysql_query("SET sql_mode=''");
		}
		if($dbname) {
			if (!@mysql_select_db($dbname)){
				$this->halt('Cannot use database');
			}
		}
		//echo 'connected';
	}
	function close() {
		return mysql_close();
	}
	function select_db($dbname){
		if (!@mysql_select_db($dbname)){
			$this->halt('Cannot use database');
		}
	}
	function server_info(){
		return mysql_get_server_info();
	}
	function query($SQL,$method='') {
		if( DBUG ){Debug::add($SQL);}
		$this->dbTablePrefix=='tp_' or $SQL=str_replace('tp_',$this->dbTablePrefix,$SQL);
		$SQL=str_replace('plt',$this->tab,$SQL);
		if($method=='U_B' && function_exists('mysql_unbuffered_query')){
			$query = mysql_unbuffered_query($SQL);
		}else{
			$query = mysql_query($SQL);
		}
		$this->query_num++;
		
		//echo $SQL.'<br>'.$this->query_num.'<br>';
		if (!$query)  return array('error'=>1);
		if (!$query)  $this->halt('Query Error: ' . $SQL);
		return $query;
	}

	function get_one($SQL){
		$this->dbTablePrefix=='tp_' or $SQL=str_replace('tp_',$this->dbTablePrefix,$SQL);
		$SQL=str_replace('plt',$this->tab,$SQL);

		$query=$this->query($SQL,'U_B');
		
		$rs =& mysql_fetch_array($query, MYSQL_ASSOC);

		return $rs;
	}

	function fetch_array($query, $result_type = MYSQL_ASSOC) {
		return mysql_fetch_array($query, $result_type);
	}

	function affected_rows() {
		return mysql_affected_rows();
	}

	function num_rows($query) {
		$rows = mysql_num_rows($query);
		return $rows;
	}

	function free_result($query) {
		return mysql_free_result($query);
	}

	function insert_id() {
		$id = mysql_insert_id();
		return $id;
	}

	function halt($msg='') {
		//require_once( dirname(__FILE__).'/Dbmysqlerror.php');
		new Class_Dbmysqlerror($msg);
	}
}

Class Class_Dbmysqlerror {
	function Class_Dbmysqlerror($msg) {
		global $db_bbsname,$db_obstart,$REQUEST_URI,$dbhost;
		$sqlerror = mysql_error();
		$sqlerrno = mysql_errno();
		$sqlerror = str_replace($dbhost,'dbhost',$sqlerror);
		ob_end_clean();
		$db_obstart == 1 && function_exists('ob_gzhandler') ? ob_start('ob_gzhandler') : ob_start();
		echo"<html><head><title>$db_bbsname</title><style type='text/css'>P,BODY{FONT-FAMILY:tahoma,arial,sans-serif;FONT-SIZE:11px;}A { TEXT-DECORATION: none;}a:hover{ text-decoration: underline;}TD { BORDER-RIGHT: 1px; BORDER-TOP: 0px; FONT-SIZE: 16pt; COLOR: #000000;}</style><body>\n\n";
		echo"<table style='TABLE-LAYOUT:fixed;WORD-WRAP: break-word'><tr><td>$msg";
		echo"<br><br><b>The URL Is</b>:<br>http://$_SERVER[HTTP_HOST]$REQUEST_URI";
		echo"<br><br><b>MySQL Server Error</b>:<br>$sqlerror  ( $sqlerrno )";
		echo"</td></tr></table>";
		exit;
	}
}
?>
