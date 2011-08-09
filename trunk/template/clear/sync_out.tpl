<{include file="header.tpl"}>

<table>
<tr>
<{foreach from=$listkeys item=v}>
	<td><{$v}></td>
<{/foreach}>
</tr>

<{foreach from=$list item=v}>
	<tr>
	<{foreach from=$listkeys item=v2}>
		<td><{$v.$v2}></td>
	<{/foreach}>
	</tr>
<{/foreach}>

</table>
<form action="?c=sync&a=in" method="post">
<textarea name="vary_list" style="width:80%;height:150px;"><{$vary_json_list}></textarea>
<br>
<input type="submit">
</form>


<{include file="footer.tpl"}>