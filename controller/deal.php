<?php
class controller_deal extends controller_base{
	
	public function init(){
		parent::init();
		/*
		print_r($_GET);
		print_r($_POST);
		*/
	}
	
	public function action_cate(){
		//$r = Deal::save_to_cate($deal['thing'],$_POST['tocate'],$_POST['fromcate']);
		$_POST['fromcate'] = ( (int)$_POST['fromcate']>0 ) ? $_POST['fromcate'] : 0;
		//$r = Deal::save_to_cate($_POST['thing'],$_POST['tocate'],$_POST['fromcate']);
		$r = Deal::save_to_cate($_POST['thing'],$_POST['tocate'],$_POST['fromcate']);
		echo $r;
		return $r;
		//print_r($r);
		//exit;
	}
	
	public function action_test_cate(){
		$deal = Deal::get_deal_info($_POST['thing']);
		Deal::save_to_cate('地铁',3);
		exit;
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

