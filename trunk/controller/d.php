<?php
class controller_d extends controller_base{
	
	public function init(){
		parent::init();
	}
	
	
	public function action_i(){
		print_r($this->request);
	}
	public function action_index(){
		print_r($this->request);
	}
	
}

