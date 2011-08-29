<?php
class controller_default extends controller_base{
	
	public function init(){
		parent::init();
	}
	
	
	public function action_index(){
		if(User::logined()){
			//exit('no user logined');
			$this->redirect(BASEURL.'me');
		}
		view::display('login.tpl');
	}
	
}

