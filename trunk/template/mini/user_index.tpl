<{include file="header.tpl"}>

<style>
#deal_list{
	width:100%;
}
#deal_list li{
	display:inline;
	width:200px;HEIGHT:80px;
	LIST-STYLE-TYPE: none;
	PADDING: 10px;
	LINE-HEIGHT: 120%;
	MARGIN: 5px 15px 15px 0px;
	float:left;
	border:1px solid #e1e1e1;
	BACKGROUND-COLOR:#;
	position:relative;
}
#deal_list li div.title{
	display:inline;
	width:200px;HEIGHT:16px;
	LIST-STYLE-TYPE: none;
	PADDING: 10px;
	LINE-HEIGHT: 100%;
	MARGIN: -11px -4px 15px -11px;
	float:left;
	border:1px solid #999999;
	BACKGROUND-COLOR:#FFFFFF;
}
#deal_list li div.disc{
	position:absolute;
	HEIGHT:30px;
	COLOR:#4F6EA6;
	TOP:38px;LEFT:-2px;
	FONT-SIZE:25px;FONT-WEIGHT:bold;
}
#deal_list li div.time{
	FONT-SIZE:12px;
	position:absolute;
	HEIGHT:30px;
	COLOR:#BBB;
	BOTTOM:-10px;LEFT:2px;
}
#deal_list li div.price{
	display:inline;
	LIST-STYLE-TYPE: none;
	PADDING: 10px;
	LINE-HEIGHT: 100%;
	TOP:-5PX;LEFT:-5PX;
	position:absolute;
	FONT-SIZE:25px;FONT-WEIGHT:bold;
}
#deal_list li div.del{
	display:inline;
	LIST-STYLE-TYPE: none;
	PADDING: 10px;
	LINE-HEIGHT: 100%;
	TOP:0PX;right:0PX;
	position:absolute;
	FONT-SIZE:12px;
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

<!--
<div style="margin:0 0 80px 0;">
<form action="<{$smarty.const.BASEURL}>index.php?c=deal&a=add" method="POST">
<input type="text" name="deal" id="something" style="width:500px;height:30px;font-weight:bold;font-size:28px;" value="" /> 
<input type="submit" type="button" value="添加"  style="height:38px;font-weight:bold;font-size:28px;" />
</form>
-->

<input type="text" name="deal" id="ajax_add" style="width:500px;height:30px;font-weight:bold;font-size:28px;color:#CCCCCC;" value="名称 + 空格 + 价格 + 回车" /> 
<!--<input type="submit" type="button" value="添加"  style="height:38px;font-weight:bold;font-size:28px;" onclick="add();" />-->
<br><br>

</div>

<div id="deal_list" style="width:800px;margin:0 0 80px 0;">
<{foreach from=$list item=v}>
	<{include file="module/dealitem.tpl"}>
<{/foreach}>

</div>

<div style="clear:both;"></div>


<{include file="footer.tpl"}>




