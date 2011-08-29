<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><{$sitename}></title>
<!--tpl:cssholder-->
<style>
*{

}
BODY {
	PADDING: 0px; FONT-SIZE: 100%; BACKGROUND: #ffffff; MARGIN: 0px; FONT-FAMILY: Verdana, Helvetica, Arial, 微软雅黑;
}
#nav UL{
	background-color:#000;WIDTH:100%;
	DISPLAY: block;
	PADDING: 0px; MARGIN: 0px;
	LIST-STYLE-TYPE: none;
	TEXT-ALIGN:left;
}
#nav UL a li.normal{
	display:inline;
	LIST-STYLE-TYPE: none;
	padding:21px 0 0 0px;
	text-align:center;
	MARGIN: 5px 2px 0px 0px;
	float:left;
	font-weight:bold;
	width:77px;height:41px;
	background:url(/river/assets/wap/nav_bg.png) no-repeat 0px -0px;
}
#nav UL a li.search{
	display:inline;
	LIST-STYLE-TYPE: none;
	padding:0px 0 0 0px;
	text-align:center;
	MARGIN: 25px 2px 0px 5px;
	float:left;
	font-weight:bold;
	width:22px;height:22px;
	background:url(/river/assets/wap/search_hide.png) no-repeat 0px -0px;
}
A{
    TEXT-DECORATION: none;
}
a:link
{
    color: #4F6EA6;
}
a:visited
{
    color: #4F6EA6;
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
    color: #FFFFFF;
    TEXT-DECORATION: none;
}
#nav a:visited
{
    color: #FFFFFF;
    TEXT-DECORATION: none;
}
#nav a:hover
{
    color: #436C00;
    TEXT-DECORATION: none;
}
#nav a:active
{
    color: #436C00;
    TEXT-DECORATION: none;
}
/*
*/
</style>
<script src="<{$smarty.const.BASEURL}>js/jquery.js"></script>
<script src="<{$smarty.const.BASEURL}>js/base.js"></script>
<script>!window.jQuery && document.write('<script src="http://code.jquery.com/jquery-1.4.2.min.js"><\/script>');</script>
<link rel="shortcut icon" href="<{$smarty.const.BASEURL}>assets/favicon.ico" type="image/x-icon"/> 
</head>


<body style="padding:0;margin:0;">
<div style="width:100%;height:;background-color:#F2F2F3;color:#ffffff;margin-bottom:10px;TEXT-ALIGN:left;position:relative;">
	<h1 style="MARGIN:0 0 0 10px;"><a href="<{'me'|urlto}>"><img src="<{$smarty.const.BASEURL}>assets/wap/logo.png" border="0" /></a></h1>
	<div id="nav" style="background-color:#;TEXT-ALIGN:left;position:absolute;TOP:7px;LEFT:140px;">
		<ul>
		<{if $currentUserId}><a href="<{'limit'|urlto}>"><li class="normal">Limit</li></a><{/if}>
		<{if $currentUserId}><a href="<{'logout'|urlto}>"><li class="normal">Out</li></a><{/if}>
		<!--
		<{if $currentUserId}><a href="javascript:void(0);" onclick="$('#search_button').slideDown('fast');"><li id="search" class="search"></li></a><{/if}>-->
		</ul>
	</div>
</div>



<div style="width:100%;clear:both;"></div>

	<div id="search_button" style="display:-none;z-index:100;position:absolute;top:57px;107px;right:14px;float:right;clear:right;backgound-color:#ccc;width:25px;height:22px;">
<a href="javascript:void(0);" onclick="search_keyword();"><img src="<{$smarty.const.BASEURL}>assets/wap/search.png" border="0" /></a>
	</div>
<!--
	<div id="logout_button" style="display:-none;z-index:100;position:absolute;top:27px;107px;right:20px;float:right;clear:right;backgound-color:#ccc;width:25px;height:22px;">
<a href="javascript:void(0);" onclick="search_keyword();"><img src="<{$smarty.const.BASEURL}>assets/wap/logout.png" border="0" /></a>
	</div>
-->

