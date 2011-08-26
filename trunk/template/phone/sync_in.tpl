<{include file="header.tpl"}>



<form action="?c=sync&a=in" method="post">
<textarea name="vary_list" style="width:80%;height:150px;"><{$vary_json_list}></textarea>
<br>
<input type="submit">
</form>

<{include file="footer.tpl"}>