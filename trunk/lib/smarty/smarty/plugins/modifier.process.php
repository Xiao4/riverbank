<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 * @author wqsemc@gmail.com
 */


function smarty_modifier_process($feed= '', $len=100) {
	$pnow = $pgoal = $p3 = 0;
	$ratio = $feed['ratio'];
	$ratio_goal = rdate::countday($feed['startdate'],date('Ymd'))/(rdate::countday($feed['startdate'],$feed['enddate'])+1)*100;
	//echo $ratio_goal.'<br>';
	if( $ratio>=100 ){	//超过总额，深红
		//echo '<br><b>ratio>=100</b><br>';
		$pORI = 100/$ratio;
		//$p3 = 1-$pnow;
		$pORI = intval($len*$pORI);
		
		$pgoal = $ratio_goal*(100/$ratio);
		
		echo '<div style="width:'.$len.'px;height:15px;background-color:#ff0000;position:relative;">
			<div style="width:2px;left:'.$pORI.'px;height:20px;background-color:#000;position:absolute;padding:20px 0 0px 0px;"> 限额
			</div>
			<div style="width:2px;left:'.$pgoal.'px;height:20px;background-color:#000;position:absolute;padding:20px 0 0px 0px;"> 预计花费
			</div>
		</div>';
		
	}elseif( $ratio_goal>=$ratio ){	//顺利，绿色
		//echo '<br><b>green</b><br>';
		$pnow = $ratio/100;
		//$pgoal = 1-$pnow;
		$pnow = intval($len*$pnow);
		$pgoal = $ratio_goal/100;
		$pgoal = intval($len*$pgoal);
		
		//echo '<br>pnow:'.$pnow.'<br>';
		//echo '<br>pgoal:'.$pgoal.'<br>';
		echo '<div style="width:'.$len.'px;height:15px;background-color:#F1F1F1;position:relative;">
			<div style="width:2px;left:'.$pgoal.'px;height:20px;background-color:#000;position:absolute;padding:20px 0 0px 0px;"> 预计花费
			</div>
			<div style="width:'.$pnow.'px;height:15px;background-color:#00CD0A;position:absolute;">
			</div>
		</div>';
		
	}else{	//黄色，实际超过实时限额
		//echo '<br><b>yellow</b><br>';
		
		$pnow = $ratio/100;
		//$pgoal = 1-$pnow;
		$pnow = intval($len*$pnow);
		$pgoal = $ratio_goal/100;
		$pgoal = intval($len*$pgoal);
		//echo '<br>pnow:'.$pnow.'<br>';
		//echo '<br>pgoal:'.$pgoal.'<br>';
		echo '<div style="width:'.$len.'px;height:15px;background-color:#F1F1F1;position:relative;">
			<div style="width:'.$pnow.'px;height:15px;background-color:#FF9C01;position:absolute;">
			</div>
			<div style="width:2px;left:'.$pgoal.'px;height:20px;background-color:#000;position:absolute;padding:20px 0 0px 0px;"> 预计花费
			</div>
		</div>';
		
	}
	
}




function smarty_modifier_process_BACK($feed= '', $len=100) {
	$pnow = $pgoal = $p3 = 0;
	$ratio = $feed['ratio'];
	$ratio_goal = rdate::countday($feed['startdate'],date('Ymd'))/(rdate::countday($feed['startdate'],$feed['enddate'])+1)*100;
	echo $ratio_goal.'<br>';
	if( $ratio>=100 ){	//超过总额，深红
		echo '<br><b>ratio>=100</b><br>';
		$pORI = 100/$ratio;
		//$p3 = 1-$pnow;
		$pORI = intval($len*$pORI);
		
		$pgoal = $ratio_goal*(100/$ratio);
		
		echo '<div style="width:'.$len.'px;height:15px;background-color:#ff0000;position:relative;">
			<div style="width:'.$pORI.'px;height:15px;background-color:#F1F1F1;position:absolute;">
			</div>
			<div style="width:'.$pgoal.'px;height:15px;background-color:#FF6901;position:absolute;">
			</div>
		</div>';
		
	}elseif( $ratio_goal>=$ratio ){	//顺利，绿色
		echo '<br><b>green</b><br>';
		$pnow = $ratio/100;
		//$pgoal = 1-$pnow;
		$pnow = intval($len*$pnow);
		$pgoal = $ratio_goal/100;
		$pgoal = intval($len*$pgoal);
		
		echo '<br>pnow:'.$pnow.'<br>';
		echo '<br>pgoal:'.$pgoal.'<br>';
		echo '<div style="width:'.$len.'px;height:15px;background-color:#F1F1F1;position:relative;">
			<div style="width:'.$pgoal.'px;height:15px;background-color:#01FF0D;position:absolute;">
			</div>
			<div style="width:'.$pnow.'px;height:15px;background-color:#00CD0A;position:absolute;">
			</div>
		</div>';
		
	}else{	//黄色，实际超过实时限额
		echo '<br><b>yellow</b><br>';
		
		$pnow = $ratio/100;
		//$pgoal = 1-$pnow;
		$pnow = intval($len*$pnow);
		$pgoal = $ratio_goal/100;
		$pgoal = intval($len*$pgoal);
		echo '<br>pnow:'.$pnow.'<br>';
		echo '<br>pgoal:'.$pgoal.'<br>';
		echo '<div style="width:'.$len.'px;height:15px;background-color:#F1F1F1;position:relative;">
			<div style="width:'.$pnow.'px;height:15px;background-color:#FF9C01;position:absolute;">
			</div>
			<div style="width:'.$pgoal.'px;height:15px;background-color:#01FF0D;position:absolute;">
			</div>
		</div>';
		
	}
	
}
