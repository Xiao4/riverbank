<{include file="header.tpl"}>

<script>
function login($user,$password){
	$.post('<{'i_login'|urlto}>',
	{user:$user, password:$password},
	function(data) {
	  //alert(data);//$('.result').html(data);
	  if(data.error>0){
		alert(data.msg);
	  }else{
		//alert(data.data);
		//跳转到用户页面
		window.location="<{'me'|urlto}>";
	  }
	},"json");
}
</script>

<form action="" onsubmit="return false;">
<input id="user" name="user" type="text" value=""><br>
<input id="password" name="password" type="text" value=""><br><br>
<input type="button" onclick="login( $('#user').val(), $('#password').val() );" value="Log in"><br><br>

<a href="javascript:return false;" onclick="login( $('#user').val(), $('#password').val() );">Log in</a><br>

</form>

<{include file="footer.tpl"}>




