<{include file="header.tpl"}>
<{scriptholder}>
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
<{/scriptholder}>

<div class="main">
	<div class="wrapper">
	<input type="text" name="deal" id="ajax_add" style="width:500px;height:30px;font-weight:bold;font-size:28px;color:#CCCCCC;" value="名称 + 空格 + 价格 + 回车" /> 
	<!--<input type="submit" type="button" value="添加"  style="height:38px;font-weight:bold;font-size:28px;" onclick="add();" />-->
	<div id="deal_list" style="width:800px;margin:0 0 80px 0;">
	<{foreach from=$list item=v}>
		<{include file="module/dealitem.tpl"}>
	<{/foreach}>
	</div>
	</div>
</div>

<{include file="footer.tpl"}>
