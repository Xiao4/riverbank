<?php
session_start();

if( $_GET['do']=='set' ){
	$ks = explode(',',$_GET['k']);
	foreach( $ks AS $k ){
		setcookie($k,$_GET['v'], time()+3600*24);
	}
}else{
	$ks = explode(',',$_GET['k']);
	foreach( $ks AS $k ){
		setcookie($k,'', time()-3600*24);
	}
}

print_r($_COOKIE);










