<?php
class Debug{
	static $arr = array();
	
	public static function add($str){
		$backtrace=debug_backtrace();
		$trace = self::getinfo($backtrace);
		
		self::$arr[] = array('info'=>$str,'trace'=>$trace);
	}
	
	public static function getinfo($backtrace){
		$arr = array();
		$last=array('file'=>'','line'=>'');
		foreach($backtrace AS $v){
			//print_r($v);echo '<br>';echo '<br>';
			$tmp = array();
			if( isset($v['file']) ){
				$tmp['file'] = $last['file']; 
				$last['file'] = substr($v['file'],strlen(ROOT_PATH));
			}
			if( isset($v['line']) ){
				$tmp['line'] = $last['line']; 
				$last['line'] = $v['line'];
			}
			if( isset($v['function']) ){ 
				$tmp['function'] = $v['function']; 
			}
			if( isset($v['class']) ){ 
				
				$tmp['class'] = $v['class']; 
			}
			$arr[] = $tmp;
		}
		array_shift($arr);
		array_pop($arr);
		return $arr;
	}
	
	public static function dump(){
		/*
		*/
		echo '
			<style>
			td{ BORDER-BOTTOM: BLUE 1px solid; BORDER-RIGHT: BLUE 1px solid; PADDING:0 5px 0 0; }
			</style>
			<script>
				function tongle(id){
					var stat = document.getElementById(\'debug_\'+id+\'\').style.display;
					if(stat==\'none\'){
						stat = \'\';
					}else{
						stat = \'none\';
					}
					document.getElementById(\'debug_\'+id+\'\').style.display=stat;
				}
			</script>
		';
		echo '<div style="background-color:#ffff99;color:#000;padding:0 0px 0px 0px;margin:40px 0 10px 0;">';
		$i=0;
		foreach(self::$arr AS $v){
			$i++;
			
			$color = 'ffff99';
			if( is_array($v['info']) && isset($v['info']['error']) ){
				if(1==$v['info']['error']){
					$color = 'ff9999';
				}
			}
			
			echo '<div onclick="javascript:tongle(\''.$i.'\');" style="background-color:#'.$color.';BORDER-TOP:#FFF 10px solid;margin:0 0 5px 0;PADDING:5px 0 0px 0;">';
			if( is_array($v['info']) ){
				echo '';print_r($v['info']);
			}else{
				if(''==$v['info']){$v['info']='NULL';}
				echo ''.$v['info'];
			}
			echo '<div id="debug_'.$i.'" style="background-color:#A7CBFF;padding:10px 10px 20px 30px;margin:10px 30px 0 0px;display:none;font-size:13px;"><table>';
			
				//print_r($v['trace']);
				foreach($v['trace'] AS $trace){
					if( !error($trace,'class') ){
						$trace['class']='';
					}
					echo '<tr>
					<td>'.$trace['class'].'</td>
					<td>'.$trace['function'].'</td>
					<td>'.$trace['line'].'</td>
					<td>'.$trace['file'].'</td>
					</tr>';
				}
			echo '</table></div>';
			echo '</div>';
		}
		echo '</div>';
	}
}

function error($arr,$k){
	return isset($arr[$k]) && $arr[$k];
}