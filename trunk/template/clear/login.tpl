<{include file="header.tpl"}>
<{scriptholder}>
<script>
$('#form_login').ajaxForm({
	success:function(data) {
		console.log(this);
	  if(data.error>0){
		alert(data.msg);
	  }else{
		//跳转到用户页面
		window.location='#';
	  }
	},
	dataType:"json"
});
</script>
<{/scriptholder}>
<div id="index_page" class="main">
	<div id="welcome" class="wrapper">
		<div id="counting">
			<h1>已记录: ￥ 25,689,465.28</h1>
			<button class="btnL btn_reg" id="btn_reg_index"><span>加入!</span></button>
			<form id="form_reg_index" class="form_reg" action="reg.php" method="post">
				<fieldset>
					<legend>注册</legend>
					<label class="labelM"><span>Email：</span><input type="email" class="txtM" required="true"/></label>
					<label class="labelM"><span>密码：</span><input type="password" class="txtM" required="true"/></label>
					<button class="btnM btn_default" type="submit"><span>确定</span></button>
					<button class="btnM btn_gray" type="reset"><span>取消</span></button>
				</fieldset>
			</form>
		</div>
		<div id="login_index">
			<form id="form_login" action="<{'i_login'|urlto}>" redirct="<{'me'|urlto}>" method="post">
				<fieldset>
					<legend>登陆</legend>
					<label class="labelM"><span>Email：</span><input id="user" type="email" class="txtM" autofocus="autofocus" required="true"/></label>
					<label class="labelM"><span>密码：</span><input id="password" type="password" class="txtM" required="true"/></label>
					<button class="btnM btn_default" type="submit" ><span>确定</span></button>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<{include file="footer.tpl"}>




