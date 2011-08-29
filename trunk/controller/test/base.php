<?php
//require_once ROOT_PATH.'../simpletest/autorun.php';
class controller_test_base { //extends UnitTestCase
	
	public function init(){
		//view::assign('sitename','RIVER');
	}
	
	public function error($errorcode){
		$this->error = $errorcode;
	}
	
	public function msg($msg){
		$this->msg = $msg;
	}
	
	public function data($data){
		$this->data = $data;
	}
	
	public function run($action){
		$this->$action();
		$r = array(
				'error' => $this->error,
				'data' 	=> $this->data,
				'msg' 	=> $this->msg,
			);
		echo json_encode($r);
		if( !DBUG ){
			exit;
		}
	}
	
}