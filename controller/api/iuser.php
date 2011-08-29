<?php
class controller_api_iuser extends controller_api_base{
	
	public function init(){
		parent::init();
	}
	
	public function action_login(){
		$r = User::login($_POST['user'],$_POST['password']);
		if( isset($r['error']) && $r['error'] ){
			$this->error($r['error']);
			$this->msg($r['msg']);
		}else{
			$this->error(0);
			$this->data($r['data']);
		}
	}
	
	public function action_list(){
		
		$args = array(
				'f'=>'id,email,nickname,amount,addtime',
				'w'=>'2>1',
				'l'=>5,
			);
		$list = User::get($args);
		$this->error(0);
		$this->data($list);
		
	}
}

