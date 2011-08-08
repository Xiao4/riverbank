<?php defined('CONTROLLER_PATH') or die('No direct script access.');

if (!defined('INIT_NO_SMARTY'))
{  
	//=============================================
	/* 创建 Smarty 对象。*/
	require(MODULE_PATH . 'smarty/smarty/Smarty.class.php');
	
	$smarty = new Smarty;
	
	$smarty->template_dir =ROOT_PATH. 'template/'.$skin.'/';
	$smarty->compile_dir =ROOT_PATH. 'smarty_temp/templates_c/'.$skin.'/';
	$smarty->cache_dir = ROOT_PATH.'smarty_temp/cache/'.$skin.'/';
	
	
	$smarty->compile_check = true;
	$smarty->debugging = false;

	$smarty->force_compile = true;
	$smarty->caching = true;
	$smarty->cache_lifetime = 900;
	
	$smarty->left_delimiter='<{';
	$smarty->right_delimiter='}>';
}

