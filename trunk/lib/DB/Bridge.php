<?php
//M04
Class DB_Bridge{
	var $_table='';
	var $_type='SELECT';
	var $_where='';
	var $_keys='*';
	var $_limit='';
	var $_order='';
	var $_fileds=array();
	
	function set($str,$type='select',$feed=array()){
		return new DB_Bridge($str,$type,$feed);
	}
	
	function __construct($str,$type='select',$feed){
		$this->_table = $str;
		$this->_type = $type;
		$this->_fileds = $feed;
		return $this;
	}
	
	function find($keys){
		$this->_keys = $keys;
		return $this;
	}
	
	function feed($feed){
		$this->_fileds = $feed;
		return $this;
	}
	
	function table($str){
		$this->_table = $str;
		return $this;
	}
	
	function where($str){
		if(trim($str)){
			$this->_where = ' WHERE '.$str;
		}
		return $this;
	}
	
	function order($str){
		if(trim($str)){
			$this->_order = ' ORDER BY '.$str.' ';
		}
		return $this;
	}
	
	function limit($limit,$start=0){
		if($start)
		{
			$this->_limit = ' LIMIT '.$start.','.$limit;
		}
		else
		{
			$this->_limit = ' LIMIT '.$limit;
		}
		return $this;
	}
	
	function insert_feed(){
		$keys = implode('`,`',array_keys($this->_fileds));
		$values = implode('\',\'',array_values($this->_fileds));
		$r = ' (`'.$keys.'`) VALUES (\''.$values.'\') ';
		return $r;
	}
	
	function update_feed(){
		$r = array();
		foreach( $this->_fileds AS $k=>$v ){
			$r[]=' `'.$k.'`=\''.addslashes($v).'\'';
		}
		$r = ' '.implode( ',', $r ).' ';
		
		return $r;
	}
	
	function sql(){
		switch ( $this->_type )
		{
			case 'select':
				$sql = 'SELECT '.$this->_keys.' FROM '.$this->_table.' '.$this->_where.' '.$this->_order.' '.$this->_limit.';';
			break;
			case 'insert':
				$sql = 'INSERT INTO '.$this->_table.' '.$this->insert_feed().';';
			break;
			case 'update':
				$sql = 'UPDATE '.$this->_table.' SET '.$this->update_feed().' '.$this->_where.';';
			break;
			case 'delete':
				$sql = 'DELETE FROM '.$this->_table.' '.$this->_where.';';
			break;
			default:
				$sql = '';
			break;
		}
		return $sql;
	}
	
}
?>
