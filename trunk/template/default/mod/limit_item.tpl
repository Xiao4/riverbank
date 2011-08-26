

<div style="position:relative;border:0px solid #e1e1e1;margin:10px 0 20px 0;padding:20px 10px 20px 10px;height:60px;">

	<font style="font-size:24px;font-weight:bold;"><{$limit['amount_predict']}></font>  <i><{$limit['startdate']}>-<{$limit['enddate']}></i>

	<table class="list" border=1>
	<tr>
	<td class="title">speed</td>
	<td class="title"><nobr>prev</nobr></td>
	<td class="title"><nobr>next</nobr></td>
	<td rowspan=2 width=500 valign=top><nobr><{$limit|process2:'100%'}></nobr></td>
	</tr>
	<td><nobr>￥/day</nobr></td>
	<td><{$limit['info']['average_past']}></td>
	<td><{if $limit['info']['average_left']<0}><nobr>失败</nobr><{else}><{$limit['info']['average_left']}><{/if}></td>
	</tr>
	</table>

	<div class="del"> <a href="javascript:void(0);" title="删除" onclick="remove_limit('<{$limit.id}>');"><font style="text-align:center;color:#fff;padding:0 3px 0 3px;">×</font></a> </div>
	
	<div style="clear:both;"></div>
</div>

