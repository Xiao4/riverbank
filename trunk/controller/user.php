<?php
class controller_user extends controller_base{
	
	public function init(){
		session_start();
		parent::init();
		if(!User::logined()){
			//exit('no user logined');
			$this->redirect(BASEURL);
		}
	}
	
	public function action_iflogin(){
		$r = User::logined();
	}
	
	public function action_index(){
		global $currentUserId;
		$listkeys = 'id,thing,amount,addtime';
		$args = array(
				'f'=>$listkeys,
				'w'=>'userid='.$currentUserId,
				'l'=>50,
			);
		$sql = DB_Sql::get('wallet_vary',$args);
		$list = DB::finds($sql);
		print_r($list);
		exit;
		view::assign('listkeys',explode(',',$listkeys));
		
		view::assign(array(
			'list'=>$list,
			'vary_json_list'=>json_encode($list),
			'time',time())
		);
		view::display('user_index.tpl');
	}
	
	
	public function action_login(){
		$r = User::login($_POST['user'],$_POST['password']);
		echo json_encode($r);
		//print_r($_COOKIE);
		if( isset($r['error']) && $r['error'] ){
			//echo '错误';
		}else{
			//echo '<br>'.$r.'已经登录';
		}
	}
	
	public function action_logout(){
		setcookie('user','', time()-3600*24);
		$this->redirect(BASEURL);
	}
	
	public function action_del(){
		
		if( isset($this->request['id']) ){
			$feed['addtime']=time();
			User::delete( $this->request['id'] );
		}
		$this->redirect(BASEURL.'?c=user&a=list');
		
	}
	
	public function action_add(){
		if( isset($this->request['email']) ){
			$feed = array();
			$feed = helper::copyarr($this->request,'userid,nickname,email,amount');
			$feed['addtime']=time();
			$r = User::update($feed);
			//$this->redirect(BASEURL.'?c=user&a=list');
			
			Debug::add($r);
		}
		
		
		$this->assign(array(
			'listkeys'=>explode(',','userid,nickname,email,amount'),
			'time',time())
		);
		
		view::display('_db_add.tpl');
	}
	
	public function action_list(){
		
		$listkeys = 'id,userid,email,nickname,amount,addtime';
		$args = array(
				'f'=>$listkeys,
				'w'=>'2>1',
				'l'=>5,
			);
		$sql = DB_Sql::get('user',$args);
		$list = DB::finds($sql);
		
		view::assign('listkeys',explode(',',$listkeys));
		
		view::assign(
			array(
				'list'=>$list,
				'vary_json_list'=>json_encode($list),
				'time',time(),
			)
		);
		
		view::display('_db_index.tpl');
	}
}

