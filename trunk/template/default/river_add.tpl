<{include file="header.tpl"}>

<form action="?c=river&a=add" method="post">
<input name="userid" type="text" value="1"><br>
<input name="thing" type="text" value="thing 1"><br>
<input name="category" type="text" value="cate 1"><br>
<input name="amount" type="text" value="0.02"><br>
<input name="tags" type="text" value="tag 1"><br>
<input name="comment" type="text" value="comment 1"><br>
<input name="addtime" type="text" value="<{$time}>"><br>

<input type="submit">

</form>

<{include file="footer.tpl"}>