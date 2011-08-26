<{include file="header.tpl"}>

<table>
<tr>
<{foreach from=$listkeys item=v}>
	<td><{$v}></td>
<{/foreach}>
	<td>DEL</td>
</tr>

<{foreach from=$list item=v}>
	<tr>
	<{foreach from=$listkeys item=v2}>
		<td><{$v.$v2}></td>
	<{/foreach}>
		<td><a href="index.php?c=<{$smarty.get.c}>&a=del&id=<{$v.id}>">DEL</a></td>
	</tr>
	<{*
	<tr>
	<td><{$v.id}></td>
	<td><{$v.sync}></td>
	<td><{$v|print_r}></td>
	</tr>
	*}>
<{/foreach}>
</table>


<{include file="footer.tpl"}>
