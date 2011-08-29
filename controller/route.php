<?php
class controller_route extends controller_base{
	
	public function init(){
		parent::init();
	}
	
	
	public function action_index(){
		print_r($this->request);
	}
	
}

