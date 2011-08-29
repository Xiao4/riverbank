<{include file="header.tpl"}>

<style>
#deal_list{
}
#deal_list li{
	display:block;
	LIST-STYLE-TYPE: none;
	PADDING: 10px;
	LINE-HEIGHT: 120%;
	MARGIN: 10px 0px 10px 0px;
	float:both;
	clear:both;
	border:1px solid #95C646;
	position:relative;
	BACKGROUND-COLOR:#FAFAFA;
	/*background:url(/river/assets/wap/10a.jpg) repeat-x 0px -0px;*/
}
#deal_list li div.disc{
	display:inline;
	LIST-STYLE-TYPE: none;
	PADDING: 10px;
	LINE-HEIGHT: 100%;
	MARGIN: -11px -4px 15px -11px;
	float:both;

	COLOR:#6A9B1C;
	TOP:5px;LEFT:2px;
	FONT-SIZE:25px;FONT-WEIGHT:bold;
}
#deal_list li div.price{
	display:inline;
	LIST-STYLE-TYPE: none;
	PADDING: 10px;
	LINE-HEIGHT: 100%;
	TOP:0PX;right:25PX;
	position:absolute;
	FONT-SIZE:25px;FONT-WEIGHT:bold;
	COLOR:#FF9900;
}
#deal_list li div.del{
	display:inline;
	LIST-STYLE-TYPE: none;
	PADDING: 0px 0 20px 10px;
	LINE-HEIGHT: 100%;
	TOP:-0PX;right:-0PX;
	position:absolute;
	FONT-SIZE:20px;
	background:url(/river/assets/wap/nav_bg.png) no-repeat 0px -23px;
}
</style>
<script>
$(document).ready(function(){
$('#ajax_add').bind('keyup', function(event){
   if (event.keyCode=="13" && ''!=$('#ajax_add').val().trim() ){
    	add();
   }
});
$('#ajax_add').bind('click', function(event){
   if ( '名称 + 空格 + 价格 + 回车'==$('#ajax_add').val().trim() ){
    	$('#ajax_add').val('');
	$('#ajax_add').css('color','#000000');
   }
});
$('#ajax_add').bind('blur', function(event){
   if ( ''==$('#ajax_add').val().trim() ){
    	$('#ajax_add').val('名称 + 空格 + 价格 + 回车');
	$('#ajax_add').css('color','#CCCCCC');
   }
});
});

function add(){
	$.post('<{'i_dealadd'|urlto}>',
	{deal:$('#ajax_add').val()},
	function(data) {
	  //alert(data);//$('.result').html(data);
	  if(data.error>0){
		alert(data.msg);
	  }else{
		$('#ajax_add').val('').select();
		//alert(data.data);
		//$('#item_'+$id).hide(1000);
		$('#deal_list').prepend(data.data);
		//alert($('#deal_list li:first').html());
		$('#deal_list li:first').show(100);
	  }
	},"json");
}
function search_keyword(){
	$('#search_key').val($('#ajax_add').val());
	$('#search_form').submit();
}
function remove($id){
	$.post('<{'i_remove'|urlto}>',
	{id:$id},
	function(data) {
	  //alert(data);//$('.result').html(data);
	  if(data.error>0){
		alert(data.msg);
	  }else{
		//alert(data.data);
		$('#item_'+$id).hide(500);
	  }
	},"json");
}
</script>

<div id="deal_list0" style="margin:0;background-color:#;PADDING:0 20px 0 15px;">
	<div style="margin:15px 0 15px 0px;">
	<input type="text" name="deal" id="ajax_add" style="width:100%;height:26px;font-weight:bold;font-size:16px;color:#CCCCCC;" value="<{$keyword}>" /> 
	<!--<input type="submit" type="button" value="添加"  style="height:38px;font-weight:bold;font-size:28px;" onclick="add();" />-->
	</div>

	

	<div id="search_button" style="display:-none;z-index:100;position:absolute;top:110px;107px;right:20px;float:right;clear:right;backgound-color:#ccc;width:25px;height:22px;">
	<a href="javascript:void(0);" onclick="search_keyword();">
	<img src="<{$smarty.const.BASEURL}>assets/wap/quickdown.png" width="15" border="0" />
	</a>
	</div>
	
	<div style="clear:both;"></div>
</div>

<form id="search_form" method="GET" action="<{'search'|urlto}>">
<input type="hidden" id="search_key" name="k">
</form>

<div id="deal_list" style="margin:0;background-color:#;PADDING:0 20px 0 15px;">
	<{foreach from=$list item=v}>
		<{$v.addtime|print_head_date}>
		<{include file="mod/deal_item.tpl"}>
	<{/foreach}>
	<div style="clear:both;"></div>
</div>

<div style="clear:both;"></div>


<{include file="footer.tpl"}>




