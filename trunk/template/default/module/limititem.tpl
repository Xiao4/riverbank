<{php}>
//print_r($_smarty_tpl->tpl_vars);
//$limit['info'] = unserialize($limit['info']);
<{/php}>
<li>
<div style="border:1px solid #e1e1e1;margin:10px 0 20px 0;padding:20px 0 20px 10px;">
<nobr><{$limit|process:600}></nobr>
<br>
<br>
<{$limit['startdate']}>至<{'Ymd'|date}> 平均每天花费 ￥<{$limit['info']['average_past']}>
<br>
<{'Ymd'|date}>至<{$limit['enddate']}>每天花费 ￥<{$limit['info']['average_left']}> 可完成目标
<br>
</div>
<!--
<pre>
<{$limit|print_r}>
</pre>
-->
<pre>
</pre>
</li>

