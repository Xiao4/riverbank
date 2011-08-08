<?php
class controller_api_base{
	private $error = 0;
	private $data = '';
	private $msg = '';
	
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
	
	function assign($a,$b=NULL){
		if(!$b){
			$this->view->assign($a);
		}else{
			$this->view->assign($a,$b);
		}
	}
	
	function display($a){
		$this->view->display($a);
	}
	
	function redirect($url){
		header("Location: $url");
	}
}