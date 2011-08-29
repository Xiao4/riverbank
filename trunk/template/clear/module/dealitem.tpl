
	<li id="item_<{$v.id}>" style="display:<{$show}>;">
		<div class="del"> <a href="javascript:void(0);" title="删除 <{$v.thing}>" onclick="remove('<{$v.id}>');"><font style="text-align:center;background-color:#ff0000;color:#fff;padding:0 3px 0 3px;"> × </font></a> </div>
		<div class="title"></div>
		<div class="disc"><{$v.thing}></div>
		<div class="price">￥<{$v.amount}></div>
		<div class="time"><{$v.addtime|printtime}></div>
	</li>
