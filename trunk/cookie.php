<?php
session_start();
print_r($_COOKIE);

$ks = explode(',',$_GET['k']);
if( $_GET['do']=='set' ){
	foreach( $ks AS $k ){
		setcookie($k,$_GET['v'], time()+3600*24);
	}
}else{
	foreach( $ks AS $k ){
		setcookie($k,'', time()-3600*24);
	}
}









