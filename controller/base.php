<?php
class controller_base{
	public $view = NULL;
	
	public function init(){
		view::assign('sitename','RIVER');
	}
	public function run($action){
		$this->$action();
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