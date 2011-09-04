<?php
class Service{
	
	public static function update(){	//deal需要具备id和userid
		//Service::update_deal();
		Service::update_user();
		Service::update_limit(User::getCurrentId());
		
	}
	
	public static function updateUserKeyWord(){
		$currentUserId = User::getCurrentId();
		print_r($_REQUEST);
		$feed=array();
		$deal = trim($_REQUEST['deal']);
		$feed['input']=$deal;
		$feed['userid']=$currentUserId;


		
		$args = array(
					'f'	=>'id,info',
					'l'	=>1,
					'w'	=>'input=\''.$deal.'\'',
					//'w'	=>'thing like \'士力%\'',
				);
		//print_r($args);
		
		$sql = DB_Sql::get('wallet_input_history',$args);
		echo '<br>'.$sql.'<br>';
		$f = DB::find($sql);
		print_r($f);


		if( false===$f ){
			echo 'new';
		}else{
			$feed = array('id'=>$f['id']);
			$feed['info']=unserialize($f['info']);

			echo 'update';

		}

		if( !is_array($feed['info']) ){
			$feed['info']=array(''.time()=>1);
		}

		echo '<pre>';
		print_r($feed['info']);
		echo '</pre>';

		$feed['info']=serialize($feed['info']);
		$sql = DB_Sql::save('wallet_input_history',$feed);
		echo '<br>'.$sql.'<br>';
		$r = DB::save($sql);

		if( isset($r['error']) ){
			//echo 'w';
		}
		exit;

	}
	
	public static function update_limit($userid){
		$currentUserId = User::getCurrentId();
		//echo '<br>';
		//echo '<br>in limit<br>';
		
		$ndate = new rdate(time());
		
		$_bigdate = $ndate->findday('',1);
		$_smalldate = $ndate->findday('',-1);
		
		$args = array(
					'f'	=>'*',
					'l'	=>100,
					'w'	=>'enddate>'.$_smalldate.' AND startdate<'.$_bigdate.'',
					//'w'	=>'thing like \'士力%\'',
				);
		//print_r($args);
		
		$list = Limit::get($args);
		
		//print_r($list);
		
		foreach( $list AS $lmt ){
			//print_r($lmt);
			/*
			echo '<hr>';
			*/
			$sql = 'SELECT sum(amount) AS sum FROM '.TABLE_HEAD.'wallet_vary WHERE userid='.$currentUserId.' AND ( thedate>'.$ndate->findday($lmt['startdate'],-1).' AND thedate<'.$ndate->findday($lmt['enddate'],1).' ) ';
			//echo '<BR>'.$sql;
			$r = Db::find($sql);
			$sum = $r['sum'];
			//echo '<br>sum:';
			//print_r($sum);
			
			$feed=array();
			$feed['id'] = $lmt['id'];
			$feed['amount_now'] = $sum;
			$feed['ratio'] = $feed['amount_now']/$lmt['amount_predict']*100;
			
			$limitdays = (rdate::countday($lmt['startdate'],$lmt['enddate']))+1;
			//echo '<br>$limitdays:'.$limitdays.'<br>';
			$average_goal = intval($lmt['amount_predict']/$limitdays*100)/100;
			//echo '<br>$a:'.$lmt['amount_predict'].'<br>';
			//echo '<br>$average_goal:'.$average_goal.'<br>';
			
			$pastdays = (rdate::countday($lmt['startdate'],date('Ymd')));
			
			if( 0==$pastdays ){
				$pastdays=1;
				$average_past = $feed['amount_now'];
			}else{
				//echo '<b>p:'.$pastdays.'</b>';
				//echo '<br>';
				$average_past = $feed['amount_now']/ $pastdays ;
			}
			
			$restdays = (rdate::countday(date('Ymd'),$lmt['enddate']))+1;
			if(0==$restdays){
				$restdays = 1;
				$average_left = ($lmt['amount_predict'] - $feed['amount_now']);
			}else{
				//echo '<b>r:'.$restdays.'</b><br>';
				$average_left = ($lmt['amount_predict'] - $feed['amount_now'])/ $restdays;
			}
			//echo '<br>';
			
			$feed['info']=array(
						'average_past'=>intval($average_past*100)/100,
						'average_left'=>intval($average_left*100)/100,
						'average_goal'=>intval($average_goal*100)/100,
					);
			//print_r($feed['info']);
			$feed['info']=serialize($feed['info']);
			Limit::save($feed);
		}
		
		//echo '<hr>';
	}
	
	public static function update_deal(){
		
	}
	
	public static function update_user(){
		$currentUserId = User::getCurrentId();
		//print_r($currentUserId);
		//计算总量
		$sql = 'SELECT sum(amount) AS sum FROM '.TABLE_HEAD.'wallet_vary WHERE userid='.$currentUserId;
		//echo '<BR>'.$sql;
		$r = Db::find($sql);
		$sum = $r['sum'];
		//print_r($r);
		
		$sql = 'SELECT sum(amount) AS sum FROM '.TABLE_HEAD.'wallet_vary WHERE userid='.$currentUserId.' AND thedate='.date('Ymd').' ';
		//echo '<BR>'.$sql;
		$r = Db::find($sql);
		$sumtoday = $r['sum'];
		//print_r($r);
		
		$info = array();
		$info['today']=$sumtoday;
		
		$sql = 'UPDATE user SET amount='.$sum.',info=\''.serialize($info).'\' WHERE id='.$currentUserId;
		//echo '<BR>'.$sql;
		Db::excute($sql);
		
	}
	
	public static function simple_changesum($userid,$amount){
		
	}
	
	
}
