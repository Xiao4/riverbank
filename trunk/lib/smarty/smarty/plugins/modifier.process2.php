<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


function smarty_modifier_process2($feed= '', $len=100) {
	$len = intval( $len );
	$pnow = $pgoal = $p3 = 0;
	$ratio = $feed['ratio'];
	
	$ratio_goal = rdate::countday($feed['startdate'],date('Ymd')+1)/(rdate::countday($feed['startdate'],$feed['enddate'])+1)*100;
	/*
	echo '<br>$ratio:'.$ratio.'';
	echo '<br>$ratio_goal:'.$ratio_goal.'';
	*/
	if( $ratio>=100 ){	//超过总额，深红
		//echo '<br><b>ratio>=100</b><br>';
		$pORI = 100/$ratio;
		//$p3 = 1-$pnow;
		$pORI = intval($len*$pORI);
		
		$pgoal = $ratio_goal*(100/$ratio);
		/*
		echo '<br>pORI:'.$pORI.'<br>';
		echo '<br>pnow:'.$pnow.'<br>';
		echo '<br>pgoal:'.$pgoal.'<br>';
		*/
		echo '<div style="width:'.$len.'%;height:15px;background-color:#ff0000;position:relative;BORDER: #000 1px solid;">
			<div style="width:2px;left:'.$pgoal.'%;height:50px;background-color:#00A50A;color:#00A50A;position:absolute;padding:20px 0 0px 0px;"> <br><br>预计花费
			</div>
			<div style="width:2px;left:'.$pORI.'%;height:20px;background-color:#ff0000;color:#ff0000;position:absolute;padding:20px 0 0px 0px;"> 限额
			</div>
			<div style="clear:both;"></div>
		</div>';
		
	}elseif( $ratio_goal>=$ratio ){	//顺利，绿色
		//echo '<br><b>green</b><br>';
		$pnow = $ratio/100;
		//$pgoal = 1-$pnow;
		$pnow = intval($len*$pnow);
		$pgoal = $ratio_goal/100;
		$pgoal = intval($len*$pgoal);
		/*
		echo '<br>pnow:'.$pnow.'<br>';
		echo '<br>pgoal:'.$pgoal.'<br>';
		*/
		echo '<div style="width:'.$len.'%;height:15px;background-color:#F1F1F1;position:relative;BORDER: #000 1px solid;">
			<div style="width:2px;left:'.$pgoal.'%;height:20px;background-color:#000;position:absolute;padding:20px 0 0px 0px;"> 预计花费
			</div>
			<div style="width:'.$pnow.'%;height:15px;background-color:#00A50A;position:absolute;">
			</div>
			<div style="clear:both;"></div>
		</div>';
		
	}else{	//黄色，实际超过实时限额
		//echo '<br><b>yellow</b><br>';
		
		$pnow = $ratio/100;
		//$pgoal = 1-$pnow;
		$pnow = intval($len*$pnow);
		$pgoal = $ratio_goal/100;
		$pgoal = intval($len*$pgoal);
		/*
		echo '<br>pnow:'.$pnow.'<br>';
		echo '<br>pgoal:'.$pgoal.'<br>';
		*/
		
		echo '<div style="width:'.$len.'%;height:15px;background-color:#F1F1F1;position:relative;BORDER: #000 1px solid;">
			<div style="width:'.$pnow.'%;height:15px;background-color:#FF9C01;position:absolute;">
			</div>
			<div style="width:2px;left:'.$pgoal.'%;height:20px;background-color:#000;position:absolute;padding:20px 0 0px 0px;"> 预计花费
			</div>
			<div style="clear:both;"></div>
		</div>';
		
	}
	
}

