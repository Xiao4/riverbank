<?php
/**
 * Smarty photo modifier plugin
 *
 * Type:     modifier<br>
 * Name:     photo<br>
 * Date:     Nov 5th, 2008
 * Purpose:  get user photo full path by url
 * Input:    string file info 
 * Input:	 string size need
 * Example:  {$var|ulogo:'48'}
 * @version 1.0
 * @param 	(String)	$filePath 源地址 | 图片info, 例如1_2.jpg
 * @param 	(String)	$size		| 可选,格式(长,宽)
 * @return 	(String)	full path
 */
function smarty_modifier_photo($filePath = '', $size='120')
{
	if (!is_string($filePath)) return $filePath;
	$thumbs = Photo::getPhotoThumbs();
	if (0 == $size) {
		return $filePath;
	}
	$strpos = strrpos($filePath, '.');
	$size = strpos($size, 'x') ? substr($size, 0, strpos($size, 'x')) : (string)$size;
	if (in_array($size, $thumbs)) {
		return substr($filePath , 0 , $strpos).'_'.$size.'.jpg';
	} else {
		foreach ($thumbs as $thumb) {
			if ($size <= intval($thumb)) {
				return substr($filePath , 0 , $strpos).'_'.$thumb.'.jpg';
			}
		}
		return $filePath;
	}
}
