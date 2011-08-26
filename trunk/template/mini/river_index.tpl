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
	<{*
	<tr>
	<td><{$v.id}></td>
	<td><{$v.userid}></td>
	<td><{$v.addtime}></td>
	<td><{$v.thing}></td>
	<td><{$v.category}></td>
	<td><{$v.amount}></td>
	<td><{$v.sync}></td>
	<td><{$v|print_r}></td>
	</tr>
	*}>
<{/foreach}>
</table>


<{include file="footer.tpl"}>
