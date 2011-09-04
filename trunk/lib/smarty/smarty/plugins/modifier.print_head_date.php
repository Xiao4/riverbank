<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_modifier_print_head_date($time= '') {
	static $_DATE;
	$tmpdate = date('d/m',$time);
	if( $_DATE!=$tmpdate ){
		$_DATE=$tmpdate;
		return '
		<div id="datatag_'.date('Ymd',$time).'" style="position:relative;">
				<div style="float:left;width:120px;height:45px;text-align:left;font-size:28px;background-color:#94C545;padding:0 0px 0 0px;background:url(assets/wap/deal_date_bg.png) no-repeat 0px -0px;"><div style="padding:14px 0 0 24px;color:#7E7E7E;">'.date('d',$time).'<font style="font-size:20px;">/08</font></div>
			<div style="position:absolute;top:-1px;left:-2px;padding:13px 0 0 24px;color:#FFF;">'.date('d',$time).'<font style="font-size:20px;">/08</font></div>
				</div>
		</div>';
	}else{
		return '';
	}
}

