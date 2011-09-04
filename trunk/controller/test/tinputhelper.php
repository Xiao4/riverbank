<?php
class controller_test_tinputhelper extends controller_test_base{
	
	public function init(){
		parent::init();
		if(!User::logined()){
			//exit('no user logined');
			$this->redirect(BASEURL.'');
			exit;
		}
	}
	
	function action_i(){
		echo '<pre>';
		print_r($_REQUEST);
		echo '</pre>';
	}
    
	function action_save(){
		$r = Service::updateUserKeyWord();
		print_r($r);
    }
    
    
}

