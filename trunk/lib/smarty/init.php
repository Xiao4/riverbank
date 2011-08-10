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

	$smarty->loadFilter('output','cssholder'); 
}
class Template {
	private $_cssholder = array(); 
	 //{{{ cssToString($css)
    /** 
     * cssToString 
     * 
     * 由css文件列表返回html页面引用的字符串
     *
     * @param   array   $css    css文件一维数组
     * @static
     * @access  public
     * @return  string  html页面引用的字符串
     */		
	static public function cssToString($css) {
		if(empty($css)) return ''; 
		$cnt = count($css);
		$str = ''; 
		for($i = 0; $i < $cnt; ++$i) {
			$str .= '<link href="' .BASEURL . $css[$i] . "\" rel=\"stylesheet\" type=\"text/css\" />\n";
		}   
		return $str;
	}//}}}
    //{{{ cssHolder($cssUrl = "") 
    /** 
     * cssHolder  
     *  
     * 为cssholder插件做的封装函数 
     * 
     * @param string $cssUrl  
     * @static 
     * @access public 
     * @return void 
     */ 
    static public function cssHolder($cssUrl = "") { 
        if(empty($cssUrl))  
            return empty(self::$_cssholder) ? '' : self::cssToString(array_keys(self::$_cssholder)); 
        
        self::$_cssholder[$cssUrl] = 1; 
    }//}}} 


}
