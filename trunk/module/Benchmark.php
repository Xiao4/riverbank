<?php
/*  
	Intereactive PHP Benchmark/Timer, version 1.0
	(c) 2009 Intereactive, LLC - Ryan Hargrave
	http://blueprint.intereactive.net/php-benchmark-timer-class

	See the above link for uses and code examples
	
	Compatible with PHP 5+
	
	This code is freely distributable under the terms of an MIT-style license.
*/

	class Lib_Benchmark {
	
		private $marker = array(); //internal marker array
	
		// ---------------------------------------------
		//  Set the first marker
		// ---------------------------------------------
			public function __construct() {
				$this->marker['start'] = microtime(true);
			}
	   
		// ---------------------------------------------
		//  Set a marker
		// ---------------------------------------------
			public function mark($name) {
				$this->marker[$name] = microtime(true);
			}
	  
		// ---------------------------------------------
		//  Calculate elapsed time between two points
		// ---------------------------------------------
			public function elapsed($point1, $point2, $decimals = 4) {							
				return number_format($this->marker[$point2] - $this->marker[$point1], $decimals);
			}
			
		// ---------------------------------------------
		//  Calculate elapsed time between all points
		// ---------------------------------------------
			public function allElapsed($decimals = 4) {
				$tmparray = $this->marker;
				$e = array_pop($tmparray);
				$s = array_shift($tmparray);
				$alltime = $e-$s;
				//echo $alltime;
				echo '<table class="list">';
				$tmp='';
				foreach( $this->marker AS $k=>$v ){
					if( $tmp!='' ){
						$thistime = number_format($this->marker[$k] - $this->marker[$tmp], $decimals);
						$thistimepercent = $thistime/$alltime*100;
						$thistimepercent = sprintf("%01.2f", $thistimepercent);
						echo '<tr><td width=50>'.$tmp.'</td><td width=2>-</td><td width=50>'.$k.'</td><td align="right">'.$thistimepercent.'%</td><td align="right">'.$thistime.'</td>';
					}
					$tmp = $k;
				}
				echo '</table>';
				
			}
			
			
			
	}
?>