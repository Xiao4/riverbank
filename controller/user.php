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
		$currentUserId = User::getCurrentId();
		$keyword = '名称 + 空格 + 价格 + 回车';
		
		$w = 'userid='.$currentUserId;
		if( is_set($_GET,'k') && $keyword!=$_GET['k'] ){
			$keyword = $_GET['k'];
			$ks = explode(' ',$_GET['k']);
			$ksarr = array();
			foreach( $ks AS $v ){
				if(''!=trim($v)){
					$ksarr[] = $v;
				}
			}
			if( count($ksarr)>1 ){
				//print_r($ksarr);
				$_t = '(tag LIKE \''.implode('%\' OR tag LIKE \'',$ksarr).'%\')';
				//echo '<br>'.$_t.'<br>';
				$_w = ' uid='.$currentUserId.' AND '.$_t.'';
				//echo $_w;
			}else{
				$_w = ' uid='.$currentUserId.' AND tag LIKE(\''.implode("','",$ksarr).'%\')';
				//echo $_w;
			}
				
			$listkeys = 'wid';
			$args = array(
					'f'=>$listkeys,
					'w'=>$_w,
					'l'=>2000,
				);
			$list = Tag::get($args);
			//print_r($list);
			if( $list ){
				$ids = array();
				foreach( $list AS $id ){
					$ids[$id['wid']] = $id['wid'];
				}
				//print_r($ids);
			}
			
			if( isset($ids) && count($ids) ){
				//echo count($ids);
				$w = ' userid='.$currentUserId.' AND id IN('.implode(",",$ids).')';
			}else{
				$w = ' userid='.$currentUserId.' AND id IN(0)';
			}
			
		}
		//echo $w;
		
		
		$listkeys = 'id,thing,amount,category,addtime';
		$args = array(
				'f'=>$listkeys,
				'w'=>$w,
				'l'=>20,
			);
		$list = Wallet::get($args);
		//print_r($list);
		
		view::assign(array(
			'keyword'=>$keyword,
			'listkeys'=>explode(',',$listkeys),
			'targetdate'=>date('Ymd'),
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
		User::logout();
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

