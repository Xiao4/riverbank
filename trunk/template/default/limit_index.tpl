<{include file="header.tpl"}>

<h1>计划消费</h1>
<form action="index.php?c=limit&a=add" method="POST">
金额<input type="text" name="amount_predict" value="<{$smarty.post.amount_predict+1}>" /><br>
开始时间<input type="text" name="startdate" value="<{$smarty.post.startdate}>" /><br>
结束时间<input type="text" name="enddate" value="<{$smarty.post.enddate}>" /><br>
<input type="submit" type="button" value="添加"  style="height:26px;font-weight:bold;font-size:14px;" onclick="add();" />
<br><br>
</form>

</div>

<div id="deal_list" style="width:100%;margin:0 0 80px 0;">
<{foreach from=$list item=limit}>
	<{include file="module/limititem.tpl"}>
<{/foreach}>

</div>

<div style="clear:both;"></div>


<{include file="footer.tpl"}>




