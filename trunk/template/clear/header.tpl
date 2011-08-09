<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
	<meta charset="UTF-8"/>
	<!--[if lt IE 9]>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9" /> 
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<title><{$sitename}></title>
<!--tpl:cssholder-->
	<meta name="Author" content="" />
	<meta name="viewport" content="width=1024" />
	<link rel="stylesheet" href="<{$smarty.const.ASSETS}>/style.css" type="text/css" /> 
<{jsholder}>
/js/jquery.js
/js/jquery.form.js
/js/jquery.pubsub.js
/js/eventrouter.js
/js/base.js
<{/jsholder}>
	<link rel="shortcut icon" href="<{$smarty.const.BASEURL}>assets/favicon.ico" type="image/x-icon"/> 
</head>
<body>
<header id="globalheader">
	<div class="wrapper">
		<{if $currentUserId}>
		<p>Xiao4: 年度花销 ￥12,345.66 <button class="icon iconM icon_add btn_add ac_show_add_dialog" title="记账">+</button></p>
		<nav id="nav" class="nav_h">
			<ul>
				<li><a href="<{'me'|urlto}>" title="设置"><span class="icon iconM icon_setting"></span></a></li>
				<li><a href="<{'logout'|urlto}>" title="登出"><span class="icon iconM icon_logout"></span></a></li>
			</ul>
		</nav>
		<{else}>
		<p><{$sitename}></p>
		<{/if}>
	</div>
</header>
<{*
<div style="width:100%;height:;background-color:#ff0000;color:#ffffff;margin-bottom:10px;TEXT-ALIGN:left;position:relative;">
	<h1 style="MARGIN:0 0 0 10px;"> <{$sitename}></h1>
	<div id="nav" style="background-color:#;width:300PX;TEXT-ALIGN:left;position:absolute;TOP:10px;LEFT:125px;">
		<ul>
		<{if $currentUserId}><li><a href="<{'me'|urlto}>">Me</a></li><{/if}>
		<{if $currentUserId}><li><a href="<{'logout'|urlto}>">Out</a></li><{/if}>
		</ul>
	</div>
</div>

		<li><a href="<{$smarty.const.BASEURL}>">Home</a></li>
		<li><a href="<{$smarty.const.BASEURL}>?c=river&a=index">river::index</a></li>
		<li><a href="?c=river&a=add">river::add</a></li>
		<li><a href="?c=sync&a=in">sync::in</a></li>
		<li><a href="?c=sync&a=out">sync::out</a></li>
		<li><a href="?c=user&a=add">user::add</a></li>
		<li><a href="?c=user&a=list">user::list</a></li>

		<li><a href="<{''|urlto:'i_login'}>">Login</a></li>
*}>
