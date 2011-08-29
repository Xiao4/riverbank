<?php
//M04
Class DB_Sqllink{
	var $_table='';
	var $_options=array(
				'f'=>'*',	//find *
				'm'=>0,	//maxid
				'i'=>0,	//maxid
				'n'=>0,	//minid
				'w'=>'',	//where
				'l'=>50,	//len
				's'=>0,	//start
				'o'=>'',	//orderby
			);
	var $_where='';
	var $_keys='*';
	var $_limit='';
	var $_order='';
	var $_shortcut=array(
			'w,u' => 'wallet_vary AS w,user AS u',
			'u' => 'user',
		);
	var $_dict=array(
			'w,u' => 'w.userid = u.id',
			'w,u' => 'w.userid = u.id',
		);
	
	function select(){
		$sql = 'SELECT '.$this->_options['f'].' FROM '.$this->_shortcut[$this->_table].' '.$this->_where.'';
		
		$s = $this->_options['s']? ''.$this->_options['s'].',' : '';
		
		if( $this->_options['o'] ){
			$sql .= ' ORDER BY '.$this->_options['o'].'';
		}
		$sql .= ' LIMIT '.$s.$this->_options['l'].'';
		
		return $sql;
	}
	
	public static function get($table,$options=array()){
		$obj = new self($table,$options);
		$obj->_equip();
		return $obj;
	}
	
	function __tostring(){
		return $this->select();
	}
	
	function __construct($table,$options){
		$this->_table = $table;
		
		$this->_options = array_merge($this->_options, $options);
		
		return $this;
	}
	
	function _equip(){
		//print_r($this->_options);
		
		$this->_where = '';
		if( $this->_options['w'] ){
			$this->_where.= ' AND '.$this->_options['w'].'';
		}
		
		$this->_where = ' WHERE '.$this->_dict[$this->_table].$this->_where;
		
	}
	
	
}
?>
