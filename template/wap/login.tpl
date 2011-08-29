<{include file="header.tpl"}>

<style>
input.login {
	width:100px;
	height:20px;
	margin:5px 0 5px 0;
	padding:2px 2px 2px 100px;
}
div.label{
	position:absolute;clear:none;float:left;width:80px;text-align:right;padding:0 10px 0 10px;
	height:20px;
	margin:10px 0 5px 0;
	color:#A0A0A0;
}

</style>

<script>
function login($user,$password){
	$.post('<{'i_login'|urlto}>',
	{user:$user, password:$password},
	function(data) {
	  if(data.error>0){
		//alert(data.msg);
		$('#error_msg').html(data.msg).slideDown('fast');
		$a = setInterval(function(){
					$('#error_msg').slideUp('fast');
					clearInterval($a);
				},2000
			);
	  }else{
		//alert(data.data);
		//跳转到用户页面
		window.location="<{'me'|urlto}>";
	  }
	},"json");
}
</script>

<DIV style="margin:0 0 50px 10px;">
<form action="<{'i_login'|urlto}>" method="POST" onsubmit="return false;">


<div ID="error_msg" style="DISPLAY:NONE;clear:both;background-color:#FF0000;COLOR:#FFF;TEXT-ALIGN:LEFT;padding:5px 0 5px 10px;margin:10px 10px 10px 0;"></div>

<div style="clear:both;"></div>

<div style="position:relative;">

	<div style="clear:none;float:left;width:;"><input id="user" name="user" class="login" type="text" value=""></div>
	<div class="label" style="left:13px;">Account:</div>

	<div style="clear:both;"></div>

	<div style="clear:none;float:left;width:;"><input id="password" name="password" class="login" type="text" value=""></div>
	<div class="label" style="left:9px;">Password:</div>


	<div style="clear:both;"></div>

	<div style="clear:none;float:left;width:;margin:10px 0 10px 18px;">
	<input type="submit" onclick="login( $('#user').val(), $('#password').val() );" value="Sign in" style="height:35px;font-size:16px;">
	</div>

	<div style="clear:both;"></div>
</div>

<!--
<a href="javascript:return false;" onclick="login( $('#user').val(), $('#password').val() );">Log in</a><br>
-->
</form>
</DIV>
<{include file="footer.tpl"}>




