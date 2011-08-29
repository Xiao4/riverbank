<{include file="header.tpl"}>

<style>
TABLE.list {
	BORDER: #365A12 1px solid; MARGIN-TOP: 10px; BACKGROUND: white;  WIDTH: 100%;  BORDER-COLLAPSE: collapse; TEXT-ALIGN: left
}
TABLE.list TR {
	BORDER-BOTTOM: #365A12 1px solid;
}
TABLE.list TD {
	PADDING: 5px 8px 5px 5px;
	BORDER-BOTTOM: #365A12 1px solid;
	background-color:#FFFFFF;BORDER-left: #365A12 1px solid;
}
TABLE.list TD.title {
	BACKGROUND-COLOR:#ADDE5A; BORDER-BOTTOM: #365A12 1px solid;font-weight:bold;color:#436C00;
}TABLE.list TH {
	PADDING-RIGHT: 2px; PADDING-LEFT: 3px; PADDING-BOTTOM: 2px; COLOR: #436C00; PADDING-TOP: 2px; BORDER-BOTTOM: #365A12 1px solid; BACKGROUND-COLOR: #8080ff; TEXT-ALIGN: center
}
div.del{
	width:20px;position:absolute;top:40px;right:10px;background-color:#ff0000;
	BORDER: #365A12 1px solid;
	BORDER-BOTTOM: #FF0000 1px solid;
}
</style>



<div id="deal_list" style="margin:0 5px 80px 5px;">
<{foreach from=$list item=limit}>
	<{include file="mod/limit_item.tpl"}>
<{/foreach}>


<div style="margin:55px 10px 10px 10px;">
<!--<a href="javascript:void(0);" onclick="$('#add_limit').show();">添加消费计划</a>-->

	<div id="add_limit" name="add_limit" style="display:-none;BORDER: #365A12 1px solid;background-color:#B9E076;margin:10px 0 10px 0;">
		<font style="font-size:24px;font-weight:bold;">计划消费</font>
		<form action="index.php?c=limit&a=add" method="POST">
		金额 <input type="text" name="amount_predict" value="<{$smarty.post.amount_predict}>" style="width:50px;" /> 
		开始时间 <input type="text" name="startdate" value="<{$smarty.post.startdate}>" style="width:80px;" /> 
		结束时间 <input type="text" name="enddate" value="<{$smarty.post.enddate}>" style="width:80px;" /> 
		<input type="submit" type="button" value="添加"  style="height:26px;font-weight:bold;font-size:14px;" onclick="add();" />
		<br><br>
		</form>
	</div>
</div>

<div style="clear:both;"></div>



<{include file="footer.tpl"}>




