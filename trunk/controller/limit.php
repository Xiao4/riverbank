<?php
class controller_limit extends controller_base{
	
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
		$ndate = new rdate(time());
		$week = $ndate->thisweek();
		$month = $ndate->getmonth('',1);
		//print_r($month);
		$args = array(
					'f'	=>'*',
					'l'	=>50,
					'w'	=>'enddate>'.$ndate->findday('',-1).' AND startdate<'.$ndate->findday('',1).'',
					'starttime'	=>0,
					'endtime'	=>0,
					's'	=>0,
					//'w'	=>'thing like \'士力%\'',
				);
				
		if( isset($this->request['s']) && $this->request['s'] ){
			$args['s']=$this->request['s'];
		}
		if( isset($this->request['l']) && $this->request['l'] ){
			$args['l']=$this->request['l'];
		}
		
		//print_r($args);
		
		$_POST['amount_predict'] = is_set($_POST,'amount_predict',0);
		$_POST['startdate'] = is_set($_POST,'startdate',$week['start']);
		$_POST['enddate'] = is_set($_POST,'enddate',$week['end']);
		
		$list = Limit::get($args);
		foreach($list AS &$l){
			//print_r($l);
			$l['info'] = unserialize($l['info']);
		}
		
		view::assign('list',$list);
		view::assign('time',time());
		view::display('limit_index.tpl');
	}
	
	public function action_add(){
		
		$listkeys = 'amount_predict,startdate,enddate';
		if( isset($this->request['amount_predict']) ){
			$feed = array();
			$feed = helper::copyarr($this->request,$listkeys);
			$feed['addtime']=time();
			
			$args = array(
						'w'	=>'',
					);
					
			$r = Limit::update($feed,$args);
			//$this->redirect(BASEURL.'?c=river&a=list');
		}
		$this->redirect(urlto('limit'));
		
	}
}

