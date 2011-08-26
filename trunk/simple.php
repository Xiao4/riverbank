<?php
date_default_timezone_set('Asia/Chongqing');
setlocale(LC_ALL, 'en_US.utf-8');
header("content-type:text/html; charset=utf-8");
require('init.inc.php');
require_once ROOT_PATH.'../simpletest/autorun.php';


class Test extends UnitTestCase {
    function testLogCreatesNewFileOnFirstMessage() {
		$r = Deal::get_deal_info('  a  b  c  d  不好吧   52.63    ');
        $this->assertTrue(
        	$r['thing'] == 'a b c d 不好吧'
        	AND
        	$r['amount'] == '52.63'
        );
    }
}











