<?php
//M04
Class DB_Sql{
	var $_table='';
	var $_options=array(
				'f'=>'*',	//find *
				'm'=>0,	//maxid
				'i'=>0,	//maxid
				'n'=>0,	//minid
				'w'=>'',	//where
				'l'=>50,	//len
				's'=>0,	//start
				'o'=>'ID desc',	//orderby
			);
	var $_where='';
	var $_keys='*';
	var $_limit='';
	var $_order='';
	var $_fileds=array();
	
	function __construct($table,$options){
		$this->_table = TABLE_HEAD.$table;
		
		$this->_options = array_merge($this->_options, $options);
		
		return $this;
	}
	
	public static function get($table,$options=array()){
		$obj = new self($table,$options);
		$obj->_equip();
		return $obj;
	}
	
	function _where(){
	}
	
	function select(){
		if( $this->_options['i'] ){
			$sql = 'SELECT '.$this->_options['f'].' FROM '.$this->_table.' '.$this->_where.'';
			return $sql;
		}else{
			$sql = 'SELECT '.$this->_options['f'].' FROM '.$this->_table.' '.$this->_where.'';
			
			$s = $this->_options['s']? ''.$this->_options['s'].',' : '';
			
			if( $this->_options['o'] ){
				$sql .= ' ORDER BY '.$this->_options['o'].'';
			}
			$sql .= ' LIMIT '.$s.$this->_options['l'].'';
		}
		
		return $sql;
	}
	function insert($feed){
		
		$keys = implode('`,`',array_keys($feed));
		$values = implode('\',\'',array_values($feed));
		$r = ' (`'.$keys.'`) VALUES (\''.$values.'\') ';
		
		return 'INSERT INTO '.$this->_table.' '.$r.';';
	}
	function update($feed){
		
		$r = array();
		foreach( $feed AS $k=>$v ){
			$r[]=' `'.$k.'`=\''.addslashes($v).'\'';
		}
		$r = ' '.implode( ',', $r ).' ';
		return 'UPDATE '.$this->_table.' SET '.$r.' '.$this->_where.';';
	}
	function delete(){
		$sql = 'DELETE FROM '.$this->_table.' '.$this->_where.'';
		return $sql;
	}
	
	function __tostring(){
		return $this->select();
	}
	
	public function save($table,$info=array(),$options=array()){
		if( isset($info['id']) ){
			$options['i'] = $info['id'];
			unset($info['id']);
			return self::get($table,$options)->update($info);
		}else{
			return self::get($table,$options)->insert($info);
		}
	}
	
	
	public function dele($table,$info=array(),$options=array()){
		if( is_array($info) && isset($info['id']) ){
			$options['i'] = $info['id'];
			unset($info['id']);
		}
		//print_r($options);
		return self::get($table,$options)->delete();
	}
	
	function to($table,$options=array()){
		$this->_table = $table;
		$this->_options = array_merge($this->_options, $options);
		$this->_equip();
		return $this;
	}
	
	function _equip(){
		//print_r($this->_options);
		if( $this->_options['i'] ){
			$this->_where = ' WHERE id='.$this->_options['i'];
			return;
		}
		
		$this->_where = '';
		if( $this->_options['m'] && $this->_options['n'] ){
			$this->_where.= ' AND (id>'.$this->_options['n'].' AND id<'.$this->_options['m'].')';
		}
		if( $this->_options['w'] ){
			$this->_where.= ' AND '.$this->_options['w'].'';
		}
		if( !trim($this->_where) ){
			$this->_where = '';
		}else{
			$this->_where = ' WHERE '.substr($this->_where,4);
		}
	}
	
	
}
?>
