<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><{$sitename}></title>
<!--tpl:cssholder-->
<style>
#nav UL{
	background-color:#000;WIDTH:100%;
	DISPLAY: block;
	PADDING: 0px; MARGIN: 0px;
	LIST-STYLE-TYPE: none;
	TEXT-ALIGN:left;
}
#nav LI{
	display:inline;
	LIST-STYLE-TYPE: none;
	PADDING: 0px;
	MARGIN: 5px 15px 30px 0px;
	float:left;
	font-weight:bold;
}

a:link
{
    color: #FF0000;
}
a:visited
{
    color: #FF0000;
}
a:hover
{
    color: #0000FF;
}
a:active
{
    color: #0000FF;
}


#nav a:link
{
    color: #FFFF00;
}
#nav a:visited
{
    color: #FFFF00;
}
#nav a:hover
{
    color: #0000FF;
}
#nav a:active
{
    color: #0000FF;
}

</style>
<script src="<{$smarty.const.BASEURL}>js/jquery.js"></script>
<script src="<{$smarty.const.BASEURL}>js/base.js"></script>
<script>!window.jQuery && document.write('<script src="http://code.jquery.com/jquery-1.4.2.min.js"><\/script>');</script>
<link rel="shortcut icon" href="http://static.jquery.com/favicon.ico" type="image/x-icon"/> 
</head>


<body>
<div style="width:100%;height:;background-color:#ff0000;color:#ffffff;margin-bottom:10px;TEXT-ALIGN:left;position:relative;">
	<h1 style="MARGIN:0 0 0 10px;"> <{$sitename}></h1>
	<div id="nav" style="background-color:#;width:300PX;TEXT-ALIGN:left;position:absolute;TOP:10px;LEFT:125px;">
		<ul>
		<{if $currentUserId}><li><a href="<{'me'|urlto}>">Me</a></li><{/if}>
		<{if $currentUserId}><li><a href="<{'logout'|urlto}>">Out</a></li><{/if}>
		</ul>
	</div>
</div>

<!--
		<li><a href="<{$smarty.const.BASEURL}>">Home</a></li>
		<li><a href="<{$smarty.const.BASEURL}>?c=river&a=index">river::index</a></li>
		<li><a href="?c=river&a=add">river::add</a></li>
		<li><a href="?c=sync&a=in">sync::in</a></li>
		<li><a href="?c=sync&a=out">sync::out</a></li>
		<li><a href="?c=user&a=add">user::add</a></li>
		<li><a href="?c=user&a=list">user::list</a></li>

		<li><a href="<{''|urlto:'i_login'}>">Login</a></li>
-->


<div style="width:100%;clear:both;"></div>
