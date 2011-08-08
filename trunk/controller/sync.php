<?php
class controller_sync extends controller_base{
	
	public function init(){
		parent::init();
	}
	
	public function action_in(){
		//print_r($this->request['vary_list']);
		$get_vary_list = array();
		if( isset($this->request['vary_list']) ){
			$get_vary_list = json_decode(urldecode(stripslashes($this->request['vary_list'])), true);
		}
		
		foreach($get_vary_list AS $v){
			Wallet::update($v);
		}
			$this->assign('vary_json_list',json_encode($get_vary_list));
		$this->assign('time',time());
		$this->display('sync_in.tpl');
	}
	
	public function action_out(){
		
		$listkeys = 'id,userid,addtime,thing,category,amount,sync';
		$args = array(
				'f'=>$listkeys,
				'w'=>'sync=0',
				'l'=>5,
			);
		$sql = DB_Sql::get('wallet_vary',$args);
		$list = DB::finds($sql);
		
		$this->assign('listkeys',explode(',',$listkeys));
		
		$this->assign(array(
			'list'=>$list,
			'vary_json_list'=>json_encode($list),
			'time',time())
		);
		$this->display('sync_out.tpl');
	}
	
	
}