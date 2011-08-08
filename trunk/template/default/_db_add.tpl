<{include file="header.tpl"}>

<form action="index.php?c=<{$smarty.get.c}>&a=add" method="post">
<{foreach from=$listkeys item=v2}>
<input name="<{$v2}>" type="text" value="<{$v2}> "><br>
<{/foreach}>


<input type="submit">

</form>

<{include file="footer.tpl"}>