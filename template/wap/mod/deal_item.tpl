<form action="http://localhost/river/index.php?c=deal&a=cate" method="POST" target="_blank">
	<li id="item_<{$v.id}>" style="display:<{$show}>;">
		<div class="del"> <a href="javascript:void(0);" title="删除 <{$v.thing}>" onclick="remove('<{$v.id}>');"><font style="text-align:center;color:#fff;padding:0 3px 0 3px;">×</font></a> </div>
		<div class="disc"><{$v.thing}>
		</div>
		<div class="price">￥<{$v.amount|printprice}></div>
	</li>
</form>
