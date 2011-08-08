<?php
class controller_api_ideal extends controller_api_base{
	
	public function init(){
		parent::init();
		if(!User::logined()){
			//exit('no user logined');
			$this->redirect(BASEURL.'');
			exit;
		}
	}
	
	public function action_remove(){
		$r = Wallet::delete( $_POST['id'] );
		if( isset($r['error']) && $r['error'] ){
			$this->error($r['error']);
			$this->msg($r['msg']);
		}else{
			Service::update_user();
			$this->error(0);
			$this->data('success');
		}
	}
	
	public function action_add(){
		
		if( isset($this->request['deal']) && ''!=$this->request['deal'] ){
			$deal = $this->request['deal'];
			//print_r($deal);
			
			preg_match("|([^0-9]+)[\s](-?\d+(\.\d+)?)|i",
			    $deal, $matches);
			//print_r($matches);
			$deal = array();
			if( count($matches)>2 ){
				$deal['thing'] = trim($matches[1]);
				$deal['amount'] = $matches[2];
				//print_r($deal);
				$r = Deal::update($deal);
				
				if( isset($r['error']) && $r['error'] ){
					$this->error($r['error']);
					$this->msg($r['msg']);
				}else{
					Service::update_user();
					$deal['id'] = $r['id'];
					$deal['addtime'] = time();
					
					view::assign('show','none');
					view::assign('v',$deal);
					$data = view::fetch('module/dealitem.tpl');
					$this->error(0);
					$this->data($data);
					//$this->data('success');
				}
			}
			//print_r($deal);

			/*
			$tmp = explode(' ',$deal);
			$deal = array();
			
			$deal['thing'] = $tmp[0];
			$deal['amount'] = $tmp[1];
			*/
		}else{
			$this->error('1');
			$this->msg('请填写正确信息 格式：东西 价格');
			
		}
		
	}
}

