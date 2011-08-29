<?php
class controller_test_tdeal extends controller_test_base{
	
	public function init(){
		parent::init();
		if(!User::logined()){
			//exit('no user logined');
			$this->redirect(BASEURL.'');
			exit;
		}
	}
	
	function test__() {
		$r = Deal::get_deal_info('  a  b  c  d  不好吧   52.63    ');
        $this->assertTrue(
        	$r['thing'] == 'a b c d 不好吧'
        	AND
        	$r['amount'] == '52.63'
        );
    }
    
	function test_save_to_cate() {
		$r = Deal::get_deal_info('  a  b  c  d  不好吧   52.63    ');
		//($dealName,$toCate,$fromCate=0)
		$r = Deal::save_to_cate($r['thing'],1,2);
		
    }
    
	function action_add() {
		$deal = '公交 1.2';
		$deal = Deal::get_deal_info($deal);
		$r = Deal::save($deal);
		
		print_r($r);
    }
    
    
}

