<?php
class controller_river extends controller_base{
	
	public function init(){
		parent::init();
	}
	
	public function action_del(){
		if( isset($this->request['id']) ){
			$feed['addtime']=time();
			Wallet::delete( $this->request['id'] );
		}
		$this->redirect(BASEURL.'?c=river&a=list');
	}
	
	public function action_list(){
		$args = array(
					'f'	=>'*',
					//'maxid'	=>10,
					'l'	=>5,
					's'	=>0,
					//'w'	=>'thing like \'士力%\'',
				);
				
		if( isset($this->request['s']) && $this->request['s'] ){
			$args['s']=$this->request['s'];
		}
		if( isset($this->request['l']) && $this->request['l'] ){
			$args['l']=$this->request['l'];
		}
		$list = Wallet::get($args);
		view::assign('listkeys',array('id','userid','addtime','thing','category','amount','sync'));
		view::assign('list',$list);
		view::assign('time',time());
		view::display('_db_index.tpl');
	}
	
	public function action_index(){
		
		$args = array(
					'f'	=>'*',
					//'maxid'	=>10,
					'l'	=>5,
					's'	=>0,
					//'w'	=>'thing like \'士力%\'',
				);
				
		if( isset($this->request['s']) && $this->request['s'] ){
			$args['s']=$this->request['s'];
		}
		if( isset($this->request['l']) && $this->request['l'] ){
			$args['l']=$this->request['l'];
		}
		$list = Wallet::get($args);
		view::assign('listkeys',array('id','userid','addtime','thing','category','amount','sync'));
		view::assign('list',$list);
		view::assign('time',time());
		view::display('_db_index.tpl');
	}
	
	public function action_add(){
		
		$listkeys = 'userid,addtime,thing,category,amount';
		if( isset($this->request['amount']) ){
			$feed = array();
			$feed = helper::copyarr($this->request,$listkeys);
			$feed['addtime']=time();
			$r = Wallet::update($feed);
			//$this->redirect(BASEURL.'?c=river&a=list');
			Debug::add($r);
		}
		
		
		view::assign(array(
			'listkeys'=>explode(',',$listkeys),
			'time',time())
		);
		
		view::display('_db_add.tpl');
		
	}
}

