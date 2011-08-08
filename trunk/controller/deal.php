<?php
class controller_deal extends controller_base{
	
	public function init(){
		parent::init();
		if(!User::logined()){
			//exit('no user logined');
			$this->redirect(BASEURL.'');
			exit;
		}
	}
	
	public function action_add(){
		
		if( isset($this->request['deal']) ){
			$deal = $this->request['deal'];
			//print_r($deal);
			$tmp = explode(' ',$deal);
			$deal = array();
			$deal['thing'] = $tmp[0];
			$deal['amount'] = $tmp[1];
			//print_r($deal);
			Deal::update($deal);
			
			$this->redirect(BASEURL.'me');
			
		}
		
	}
	
}

