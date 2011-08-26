
<form action="http://localhost/river/index.php?c=deal&a=cate" method="POST" target="_blank">
	<li id="item_<{$v.id}>" style="display:<{$show}>;">
		<div class="del"> <a href="javascript:void(0);" title="删除 <{$v.thing}>" onclick="remove('<{$v.id}>');"><font style="text-align:center;background-color:#ff0000;color:#fff;padding:0 3px 0 3px;"> × </font></a> </div>
		<div class="title"></div>
		<div class="disc"><input type="text" name="thing" value="<{$v.thing}>"><!--<{$v.thing}>-->
		<div style="">

<input type="text" name="tocate" style="width:20px;"><input type="text" name="fromcate" value="<{$v.category}>" style="width:20px;">
<input type="submit" value="OK">
		</div>
		</div>
		<div class="price">￥<{$v.amount}></div>
		<div class="time"><{$v.addtime|printtime}></div>
	</li>
</form>
