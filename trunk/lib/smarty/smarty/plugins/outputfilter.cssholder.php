<?php
function smarty_outputfilter_cssholder($output, &$smarty) {
    return preg_replace('/<!--tpl:cssholder-->/', Template::cssHolder(), $output, 1); 
}
