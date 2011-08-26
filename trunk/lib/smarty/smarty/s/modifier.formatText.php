<?php
/**
 * Smarty page modifier plugin
 *
 * Type:     modifier<br>
 * Name:     formatText<br>
 * @version 1.0
 * @param 	string	$text
 * @return 	string	text
 */
function smarty_modifier_formatText($text , $type = 0)
{
    $text = trim(str_replace("&nbsp;" , " " , $text));
	$text = keywordAddLink($text);
	$text = TinyurlAddLink($text);
	$text = faceReplace($text);
//	$text = nl2br($text);
	if ($type) {
		$ops = strpos($text , "||");
		if ($ops !== false) return substr($text , 0 , $ops);
		else return $text;
	} else {
		return $text;
	}
}
	

/** 
 * TinyurlAddLink 给139url加上链接
 * 
 * @param mixed $content 
 * @return void
 */
function TinyurlAddLink($content) {
	$start   = "http(?:s)?://";
	$body   = ".*?";
	$end    = "(?![\x21-\x3b\x3d\x3f-\x7e])";//ASCII中可显示字符去掉<>
	$link_pattern1 = $start . $body . $end;
	$pattern = "@(?<!['\"])($link_pattern1)@i"; 
	$content = preg_replace_callback($pattern, '_addLink', $content);
	return $content;
}
/**
 * 添加链接
 * @param unknown_type $matches
 * @return unknown
 */
function _addLink($matches) {
	$url = $matches[0];
	if (!preg_match('@^http(s)?://@', $url)) {
		$url = "http://" . $url;
	}   
	$meta = array();
	$url2 = _tidyLinks($url);
	$end = strlen($url) > strlen($url2) ? $url{strlen($url)-1} : ""; 
	return "<a target=\"_blank\" href=\"$url2\">$url2</a>" . $end;
}  
/** 
* TidyLink 清理链接
* @param mixed $urls 
* @return void
*/
function _tidyLinks($urls) {
	if (is_array($urls)) {
		foreach($urls as &$url) {
			$url = _tidyLinks($url);
		}   
	}   
	else {
		$urls = rtrim($urls, ",.!;?()|[]@<>{}");
	}   
	return $urls;
}

/**
 * KeywordAddLink 话题关键字标上链接
 * @param string $content
 * @return string
 */
function keywordAddLink($content){
	$content = str_replace('&#39;' , "'" , $content);
	// 全角#号的处理
	if( substr_count($content, '＃') == 2){
		$content = str_replace('＃', '#', $content);
	}
	return preg_replace_callback('/#([^#@]*?)#/','topicLinkReplace',$content);
}
/**
 * 处理话题词
 * @param unknown_type $matches
 * @return unknown
 */
function topicLinkReplace($matches) {
	$host = defined('HOSTNAME') ? HOSTNAME : '';
	$topic = str_replace('　' , ' ' , $matches[1]);
	if (trim($topic)) {
		$return = "#<a target=\"blank\" href=\"http://$host/?c=f&m=topic&k=".urlencode(strip_tags($topic))."\">$topic</a>#";
	} else {
		$return = $matches[0];
	}
	return $return;
}

function faceReplace($text) {
	$faceArray = Emoticon::getList();
	$search = $replace = array();
	foreach ($faceArray as $key => $facelist) {
		foreach ($facelist as $face) {
			$search[] = $face['srv'];
			$imgurl = Asset::getUrl( $face['img'] , true , 1) ;
			$replace[] = '<img title="'.$face['title'].'" src="'.$imgurl.'"/>';
			$search[] = str_replace(array('[' , ']') , array('【','】') , $face['srv']);
			$replace[] = '<img title="'.$face['title'].'" src="'.$imgurl.'"/>';
		}
	}
	$text = str_replace($search , $replace , $text);
	return $text;
}
